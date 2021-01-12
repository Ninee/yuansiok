<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YcOrder extends Model
{
    protected $fillable = [
        'order_id', 'money', 'status', 'sid', 'uid', 'create_time', 'pay_time', 'book_name', 'regsiter_time', 'ip', 'ua',
        'open_id', 'nickname'
    ];
}
