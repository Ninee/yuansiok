<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    const PLATFORM_BAIDU = 1;
    const PLATFORM_TOUTIAO = 2;

    protected $fillable = [
      'url', 'ua', 'ip', 'appid', 'bd_vid', 'page_id', 'domain', 'platform'
    ];
}
