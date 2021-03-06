<?php

namespace App\Models;

use Encore\Admin\Auth\Database\Administrator;
use Illuminate\Database\Eloquent\Model;

class RandWord extends Model
{
    protected $fillable = [
      'word', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(Administrator::class, 'user_id', 'id');
    }
}
