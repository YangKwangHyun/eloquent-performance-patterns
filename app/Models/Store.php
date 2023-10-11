<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function scopeSelectDistanceTo($query, array $coordinates)
    {
        if(is_null($query->getQuery()->columns)) {
            $query->select('*');
        }

        $query->selectRaw('
               ST_Distance(
               ST_SRID(Point(longitude, latitude), 4326),
               ST_SRID(Point(?,?), 4326)
               ) as distance', $coordinates);
    }
}
