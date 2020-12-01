<?php

namespace App\Http\Controllers;

use App\Http\Third\BaiduOcpc;
use App\Models\HsOrder;
use App\Models\HuaSheng;
use App\Models\Visitor;
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
