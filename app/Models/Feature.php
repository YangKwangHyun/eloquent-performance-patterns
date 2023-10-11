<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Feature extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function scopeOrderByStatus($query, $direction)
    {
        $query->orderBy(DB::raw('
            case
                when status = "Requested" then 1
                when status = "Approved" then 2
                when status = "Completed" then 3
            end
        '), $direction);
    }

    public function scopeOrderByActivity($query, $direction)
    {
        $query->orderBy(DB::raw('-(votes_count + (comments_count * 2))'),
            $direction);
    }
}
