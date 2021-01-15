<?php


namespace App\Admin\Controllers;


use App\Admin\Extension\PostBack;
use App\Http\Controllers\Controller;
use App\Http\Third\BaiduOcpc;
use App\Imports\PostBackImport;
use App\Models\VirtualBackRecord;
use App\Models\Visitor;
use App\Models\WyOrder;
use App\Models\WyUser;
use App\TouTiao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

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
        VirtualBackRecord::create([
            'platform' => '百度',
            'page_remark' => $page->remark,
            'page_url' => $visitor->url
        ]);
        return response()->json([
            "code" => 0,
            "message" => ''
        ]);
    }

    public function toutiao(Request $request)
    {
        $plan_id = $request->plan_id;
        //查找最新10条最新访客记录，随机一条，预防取到无效回传链接
        $visitors = Visitor::where('adid', $plan_id)->where('platform', Visitor::PLATFORM_TOUTIAO)->take(10)->get();
        if (!$visitors) {
            return response()->json([
                "code" => 500,
                "message" => '还没有对应的真实访问记录'
            ]);
        }
        $counter = $visitors->count();
        $visitor = $visitors[rand(0, $counter - 1)];
        $ocpc = new \App\Http\Third\Toutiao();
        $ocpc->sendConvertData($visitor->url, 2);
        $page =  TouTiao::find($visitor->page_id);
        VirtualBackRecord::create([
            'platform' => '头条',
            'adid' => $plan_id,
            'page_remark' => $page->remark,
            'page_url' => $visitor->url
        ]);
        return response()->json([
            "code" => 0,
            "message" => ''
        ]);
    }

    public function getSupplyList(Request $request)
    {
        $plan_id = $request->plan_id;
        $book_platform = $request->book_platform;
        $type = $request->type;
        $sql = '';
        switch ($book_platform) {
            case PostBack::BOOK_PLATFORM_HS:

                break;
            case PostBack::BOOK_PLATFORM_WY:
                if ($type == 1) {
                    $sql = "SELECT * FROM `visitors`, `wy_orders`, `wy_users` WHERE wy_orders.open_id = wy_users.open_id AND wy_users.ip = visitors.ip AND wy_users.is_back = 0 AND visitors.adid='$plan_id'";
                } else {
                    $sql = "SELECT * FROM `visitors`, `wy_orders`, `wy_users` WHERE wy_orders.open_id = wy_users.open_id AND wy_users.ip = visitors.ip AND `wy_orders`.order_id='$plan_id' GROUP BY `visitors`.adid";
                }
                break;
            case PostBack::BOOK_PLATFORM_YC:
                if ($type == 1) {
                    $sql = "SELECT * FROM `visitors`, `yc_orders` WHERE yc_orders.ip = visitors.ip AND wy_users.is_back = 0 AND visitors.adid='$plan_id'";
                } else {
                    $sql = "SELECT * FROM `visitors`, `yc_orders` WHERE yc_orders.ip = visitors.ip AND `yc_orders`.order_id='$plan_id' GROUP BY `visitors`.adid";
                }
                break;
        }
        $result = DB::select($sql);
        return response()->json([
            'data' => $result,
            'code' => 0,
            'message' => ''
        ]);
    }

    public function supply(Request $request)
    {
        $order_sn = $request->order;
        $order = WyOrder::where('order_id', $order_sn)->first()->toArray();
        $logger = new Logger('budan');
        $logger->pushHandler(new StreamHandler(storage_path('logs/budan-' . date('Y-m-d') . '.log')));
        $logger->info('order:', $order);
//        $new = WyUser::where('open_id', $order['open_id'])->where('is_back', 0)->first();
        $new = WyUser::where('open_id', $order['open_id'])->first();
        if (!$new) {
            return response()->json([
                'code' => 500,
                'message' => '订单已回传过'
            ]);
        }
        //如果是新用户，付费回传
        if ($new) {
            $visitor = Visitor::where('ip', $new['ip'])->where('adid', $request->adid)->first();
            if (!$visitor) {
                return response()->json([
                    'code' => 500,
                    'message' => '未找到对应IP的访客记录'
                ]);
            }

            $page = TouTiao::find($visitor->page_id);

            if ($visitor) {
                switch ($visitor->platform) {
                    //回传百度
                    case Visitor::PLATFORM_BAIDU:
                        $token = $page->baidu_clue;
                        $cv = array(
                            'logidUrl' => $visitor->url, // 您的落地页url
                            'newType' => 19 // 转化类型请按实际情况填写
                        );
                        $conversionTypes = array($cv);
                        $ocpc = new BaiduOcpc();
                        $res = $ocpc->sendConvertData($token, $conversionTypes);
                        break;
                    //回传头条
                    case Visitor::PLATFORM_TOUTIAO:
//                        if ($order['amount'] >= (30 * 100) ) {
//                            $toutiao = new \App\Http\Third\Toutiao();
//                            $res = $toutiao->sendConvertData($visitor->url, 2);
//                        } else {
//                            $res = false;
//                        }
                        $toutiao = new \App\Http\Third\Toutiao();
                        $res = $toutiao->sendConvertData($visitor->url, 2);
                        break;
                    default:
                        $res = false;
                        break;
                }
                //回传成功，更新订单回传状态
                if ($res) {
                    $new->is_back = 1;
                    $new->save();
                }
            }
        }
        return response()->json([
            'code' => 0,
            'message' => ''
        ]);
    }

    public function upload(Request $request)
    {
        $file = $request->file('orders');
        $excel = Excel::toArray(new PostBackImport(), $file);
        $orders = $excel[0];
        $ids = [];
        foreach ($orders as $order) {
            array_push($ids, $order[0]);
        }
        $in = implode(',', $ids);
        $sql = "SELECT * FROM `visitors`, `wy_orders`, `wy_users` WHERE wy_orders.open_id = wy_users.open_id AND wy_users.ip = visitors.ip AND wy_users.is_back = 0 AND wy_orders.order_id in({$in}) GROUP BY visitors.ip";
        $result = DB::select($sql);
        return response()->json([
            'data' => $result,
            'code' => 0,
            'message' => ''
        ]);
    }

}