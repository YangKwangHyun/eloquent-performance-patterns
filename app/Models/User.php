<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable
        = [
            'name',
            'email',
            'password',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts
        = [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    // public function scopeWithLastLoginAt($query)
    // {
    //     $query->addSelect([
    //         'last_login_at' => Login::select('created_at')
    //             ->whereColumn('user_id', 'users.id')
    //             ->latest()
    //             ->take(1)
    //     ])
    //         ->withCasts(['last_login_at' => 'datetime']);
    // }
    //
    // public function scopeWithLastLoginIpAddress($query)
    // {
    //     $query->addSelect([
    //         'last_login_ip_address' => Login::select('ip_address')
    //             ->whereColumn('user_id', 'users.id')
    //             ->latest()
    //             ->take(1)
    //     ]);
    // }

    public function lastLogin()
    {
        // last_login_id
        return $this->belongsTo(Login::class);
    }

    public function scopeWithLastLogin($query)
    {
        $query->addSelect([
            'last_login_id' => Login::select('id')
                ->whereColumn('user_id', 'users.id')
                ->latest()
                ->take(1)
        ])->with('lastLogin');
    }

    public function scopeSearch($query, string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term
        ) use (
            $query
        ) {
            // term을 정규식으로 검사하여 알파벳과 숫자만 남기고, 나머지는 제거
            $term = preg_replace('/[^a-zA-Z0-9]/', '', $term).'%';
            $query->whereIn('id', function ($query) use ($term) {
                $query->select('id')
                    ->from(function ($query) use ($term) {
                        $query->select('id')
                            ->from('users')
                            ->where('first_name_normalized', 'like', $term)
                            ->orWhere('last_name_normalized', 'like', $term)
                            ->union(
                                $query->newQuery()
                                    ->select('users.id')
                                    ->from('users')
                                    ->join('companies', 'companies.id', '=', 'users.company_id')
                                    ->where('companies.name_normalized', 'like', $term)
                            );
                    }, 'matches');
            });
        });

    }

    public function customer()
    {
        return $this->hasMany(Customer::class, 'sales_rep_id');
    }
}
