<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YwUser extends Model
{
    protected $fillable = [
        'platform', 'time', 'open_id', 'ua', 'ip', 'appflag'
    ];
}
