<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    // cast created_at to datetime
    protected $casts = [
        'created_at' => 'datetime',
    ];

    public $timestamps = false;
}
