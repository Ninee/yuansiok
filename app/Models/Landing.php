<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }
}
