<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class PcLanding extends Model
{
    public function setQrcodeAttribute($qrcode)
    {
        if (is_array($qrcode)) {
            foreach ($qrcode as $index => $item) {
                if (URL::isValidUrl($item)) {
//                    $qrcode[$index] = $item;
                } else {
                    $qrcode[$index] =  Storage::disk(config('admin.upload.disk'))->url($item);
                }
            }
            $this->attributes['qrcode'] = json_encode($qrcode);
        }
    }

    public function getQrcodeAttribute($qrcode)
    {
        return json_decode($qrcode, true);
    }
}
