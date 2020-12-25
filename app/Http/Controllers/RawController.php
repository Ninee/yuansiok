<?php

namespace App\Http\Controllers;

use App\Models\Raw;
use Illuminate\Http\Request;

class RawController extends Controller
{
    public function upload(Request $request)
    {
        $has = Raw::where('imgs', json_encode($request->imgs))->where('title', $request->title)->first();
        if ($has) {
            return response()->json([
                'code' => 10086,
                'message' => '该素材已经存在，无须重复采集'
            ]);
        }
        Raw::create($request->all());

        return response()->json([
            'code' => 0,
            'message' => 'ok'
        ]);
    }
}
