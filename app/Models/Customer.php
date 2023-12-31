<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    public function salesRep()
    {
        return $this->belongsTo(User::class);
    }
}
