<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZdUser extends Model
{
    protected $fillable = [
        'isfollow', 'openid', 'regtime', 'ip', 'ua'
    ];
}
