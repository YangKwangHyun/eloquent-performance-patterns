<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model as Eloquent;

class model extends Eloquent
{
    public function getRelationshipFromMethod($name)
    {
        $class = get_class($this);
        throw new Exception("Lazy-loading relationships is not allowed ($class::$name)");
    }
}
