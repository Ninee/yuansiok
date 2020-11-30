<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HsOrder extends Model
{
    protected $fillable = [
      'user_id', 'merchant_id', 'user_name', 'openid', 'subscribe_at', 'join_at', 'amount', 'charge_count', 'book_name',
        'spread_id', 'spread_name', 'spread_link', 'order_num', 'trans_id', 'pay_at', 'request_at', 'order_status', 'ip', 'ua'
    ];
}
