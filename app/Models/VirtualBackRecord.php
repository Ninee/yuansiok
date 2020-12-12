<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VirtualBackRecord extends Model
{
    protected $fillable = [
      'platform', 'adid', 'page_remark', 'page_url'
    ];
}
