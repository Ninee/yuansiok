<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
      'url', 'ua', 'ip', 'appid', 'bd_vid', 'page_id', 'domain', 'platform'
    ];
}
