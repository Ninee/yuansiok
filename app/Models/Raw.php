<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class Raw extends Model
{
    protected $fillable = [
        'imgs', 'title', 'name', 'source'
    ];

    public function setImgsAttribute($imgs)
    {
        if (is_array($imgs)) {
            foreach ($imgs as $index => $item) {
                if (URL::isValidUrl($item)) {
//                    $imgs[$index] = $item;
                } else {
                    $imgs[$index] =  Storage::disk(config('admin.upload.disk'))->url($item);
                }
            }
            $this->attributes['imgs'] = json_encode($imgs);
        }
    }

    public function getImgsAttribute($imgs)
    {
        return json_decode($imgs, true);
    }
}
