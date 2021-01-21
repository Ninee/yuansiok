<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ZdOrder extends Model
{
    protected $fillable = [
        'orderno', 'amount', 'status', 'openid', 'regtime', 'ip', 'ua',
    ];
}
