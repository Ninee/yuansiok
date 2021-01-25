<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YwOrder extends Model
{
    protected $fillable = [
        'app_name', 'amount', 'order_id', 'order_time', 'pay_time', 'openid', 'user_name', 'reg_time'
    ];
}
