<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Checkout extends Pivot
{
    use HasFactory;

    protected $table = 'checkouts';

    protected $casts = [
        'borrowed_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
