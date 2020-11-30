<?php

namespace App;

use App\Models\Template;
use Illuminate\Database\Eloquent\Model;

class TouTiao extends Model
{
    public function template()
    {
        return $this->belongsTo(Template::class);
    }
}
