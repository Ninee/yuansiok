<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WyUser extends Model
{
    protected $fillable = [
      'platform', 'appflag', 'open_id', 'reg_time', 'ua', 'ip', 'wx_openid'
    ];
}