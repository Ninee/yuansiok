<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RandomMp extends Model
{
    public function mp()
    {
        return $this->belongsTo(OfficialAccount::class, 'official_account_id');
    }
}
