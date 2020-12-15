<?php

namespace App\Http\Controllers;

use App\Models\Raw;
use Illuminate\Http\Request;

class RawController extends Controller
{
    public function upload(Request $request)
    {
        Raw::create($request->all());

        return response()->json([
            'code' => 0,
            'message' => 'ok'
        ]);
    }
}
