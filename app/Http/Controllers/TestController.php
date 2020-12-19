<?php

namespace App\Http\Controllers;

use App\Http\Third\BaiduOcpc;
use App\Models\HsOrder;
use App\Models\HuaSheng;
use App\Models\Visitor;
use App\Models\WyOrder;
use App\Models\WyUser;
use App\TouTiao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class TestController extends Controller
{
    public function index()
    {
//                $this->testHs2Baidu();
//        $visitor = Visitor::where('ip', '127.0.0.1')->orderBy('id', 'desc')->first();
//        dd($visitor);
    }

    public function budan(Request $request)
    {
        $order_sn = $request->order;
        $order = WyOrder::where('order_id', $order_sn)->first();
        if (!$order) {
            return response('订单未找到');
        }
        $order = $order->toArray();
        print_r($order);
        $logger = new Logger('budan');
        $logger->pushHandler(new StreamHandler(storage_path('logs/budan-' . date('Y-m-d') . '.log')));
        $logger->info('order:', $order);
        $new = WyUser::where('open_id', $order['open_id'])->where('is_back', 0)->first();
        if (!$new) {
            return response('订单已经回传过了');
        }
        //如果是新用户，付费回传
        if ($new) {
            //只上传当天注册用户的订单数据
//                if ($new->reg_time != date('Y-m-d')) {
//                    $logger->warn('warn:', ['message' => '非当天注册用户']);
//                    return response('ok-not valid reg date');
//                }

            $visitor = Visitor::where('ip', $new['ip'])->orderBy('id', 'asc')->first();
            if (!$visitor) {
                return response('未找到对应IP的访客记录');
            }

            //判定回传概率
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
                        if ($order['amount'] >= (30 * 100) ) {
                            $toutiao = new \App\Http\Third\Toutiao();
                            $res = $toutiao->sendConvertData($visitor->url, 2);
                        } else {
                            $res = false;
                        }
                        break;
                    default:
                        $res = false;
                        break;
                }
                //回传成功，更新订单回传状态
                if ($res) {
                    $new->is_back = 1;
                    $new->save();
                    print_r($res);
                }
            }
        }
    }

    public function testHs2Baidu()
    {
        $url = 'https://vip.rlcps.cn/api/orderList';
        $merchant_id = '2071';
        $data = [
            "apiKey" => '184184912',
//            "date" => date('Y-m-d', time()),
            "date" => '2020-11-28',
            "merchant_id" => $merchant_id,
            "timestamp" => time(),
        ];
        ksort($data, SORT_REGULAR);
        $splicedString = '';
        foreach ($data as $paramKey => $paramValue) {
            $splicedString .= trim($paramValue);
        }
        $apiSecurity = "68c64e4795ec97295cb1f4bbd1493ea5";
        if($splicedString){
            $splicedString = strtoupper(md5($splicedString . $apiSecurity));
        }
        $data['sign'] = $splicedString;
        $reqData = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, 'https://vip.rlcps.cn/api/orderList');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $reqData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($reqData)
            )
        );
        //执行请求
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode === 200) {
            $result = json_decode($response, true);
            //同步订单
            $orders = $result['data'];
            print_r($orders);

            foreach ($orders as $index => $order) {
                //检查是否已入库
                $exist = HsOrder::where('order_num', $order['order_num'])->first();
                //写入日志
                $logger = new Logger('hsorders');
                $logger->pushHandler(new StreamHandler(storage_path('logs/hs_orders-' . date('Y-m-d') . '.log')));
                $logger->info('order:', $order);
                if (!$exist) {
                    //如果是首冲，付费回传
                    if ($order['charge_count'] == 1 && $order['order_status'] == 1) {
                        $order['merchant_id'] = $merchant_id;
                        $hsOrder = HsOrder::create($order);
                        //百度付费回传
                        $visitor = Visitor::where('ua', $order['ua'])->where('ip', $order['ip'])->first();
                        if ($visitor) {
                            $page = TouTiao::find($visitor->page_id);
                            $token = $page->baidu_clue;
                            $cv = array(
                                'logidUrl' => $visitor->url, // 您的落地页url
                                'newType' => 19 // 转化类型请按实际情况填写
                            );
                            $conversionTypes = array($cv);
                            $ocpc = new BaiduOcpc();
                            $res = $ocpc->sendConvertData($token, $conversionTypes);
                            print_r($res);
                            //回传成功，更新订单回传状态
                            if ($res) {
                                $hsOrder->is_back = 1;
                                $hsOrder->save();
                            }
                        }
                    }
                }
            }
        }
        curl_close($ch);
    }
}
