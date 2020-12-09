<?php


namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Third\BaiduOcpc;
use App\Models\Visitor;
use App\TouTiao;
use Illuminate\Http\Request;

class PostBackController extends Controller
{
    public function baidu(Request $request)
    {
        $page = TouTiao::find($request->page_id);
        $token = $page->baidu_clue;
        //查找最新一条有效访问数据
        $visitor = Visitor::where('page_id', $request->page_id)->whereNotNull('bd_vid')->orderBy('id', 'desc')->first();
        $cv = array(
            'logidUrl' => $visitor->url, // 您的落地页url
            'newType' => 19 // 转化类型请按实际情况填写
        );
        $conversionTypes = array($cv);
        $ocpc = new BaiduOcpc();
        $ocpc->sendConvertData($token, $conversionTypes);
        return response()->json([
            "code" => 0,
            "message" => ''
        ]);
    }

    public function toutiao(Request $request)
    {
        $plan_id = $request->plan_id;
        //查找最新一条有效访问数据
        $visitor = Visitor::where('adid', $plan_id)->where('platform', Visitor::PLATFORM_TOUTIAO)->orderBy('id', 'desc')->first();
        if (!$visitor) {
            return response()->json([
                "code" => 500,
                "message" => '还没有对应的真实访问记录'
            ]);
        }
        $ocpc = new \App\Http\Third\Toutiao();
        $ocpc->sendConvertData($visitor->url, 2);
        return response()->json([
            "code" => 0,
            "message" => ''
        ]);
    }

}