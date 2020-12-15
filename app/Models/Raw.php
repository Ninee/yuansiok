<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raw extends Model
{
    protected $fillable = [
        'img', 'title', 'name'
    ];
}
