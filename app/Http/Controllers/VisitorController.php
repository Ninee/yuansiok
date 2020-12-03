<?php

namespace App\Http\Controllers;

use App\Http\Third\BaiduOcpc;
use App\Http\Third\Toutiao;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    const PLATFORM_BAIDU = 1;
    const PLATFORM_TOUTIAO = 2;
    public function save(Request $request)
    {
        //首次访问, 区分平台是否需要联调
        switch ($request->platform) {
            case self::PLATFORM_BAIDU:
                $actived = Visitor::where('platform', self::PLATFORM_BAIDU)->where('page_id', $request->page_id)->first();
                if (!$actived) {
                    $page = \App\TouTiao::find($request->page_id);
                    $token = $page->baidu_clue;
                    $cv = array(
                        'logidUrl' => $request->url, // 您的落地页url
                        'newType' => 19 // 转化类型请按实际情况填写
                    );
                    $conversionTypes = array($cv);
                    $ocpc = new BaiduOcpc();
                    $ocpc->sendConvertData($token, $conversionTypes);
                }
                break;
            case self::PLATFORM_TOUTIAO:
                $actived = Visitor::where('domain', $request->domain)->where('platform', self::PLATFORM_TOUTIAO)->first();
                if (!$actived) {
                    $toutiao = new Toutiao();
                    $toutiao->sendConvertData($request->url, 2);
                }
                break;
        }
        Visitor::create($request->all());
        return 'ok';
    }
}
