<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WyOrder extends Model
{
    protected $fillable = [
      'platform', 'appflag', 'open_id', 'order_id', 'order_time', 'amount', 'wx_openid'
    ];
}
