<?php

namespace App\Http\Controllers;

use App\Http\Third\BaiduOcpc;
use App\TouTiao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BaiduController extends Controller
{
    public function debug(Request $request)
    {
        $page = TouTiao::find($request->page_id);
        $token = $page->baidu_clue;
        $cv = array(
            'logidUrl' => $request->url, // 您的落地页url
            'newType' => 19 // 转化类型请按实际情况填写
        );
        $conversionTypes = array($cv);
        $ocpc = new BaiduOcpc();
        $ocpc->sendConvertData($token, $conversionTypes);
    }
}
