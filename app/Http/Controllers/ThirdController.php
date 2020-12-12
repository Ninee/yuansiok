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
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class ThirdController extends Controller
{
    const RETRY_TIMES = 3;

    /**
     * 花生回传
     */
    public function back4Hs()
    {
        $merchats = HuaSheng::all();
        foreach ($merchats as $merchat) {
            $this->hs2Back($merchat->merchant_id);
        }

    }

    public function hs2Back($merchant_id)
    {
        $url = 'https://vip.rlcps.cn/api/orderList';
//        $merchant_id = '2071';
        $data = [
            "apiKey" => '184184912',
            "date" => date('Y-m-d', time()),
//            "date" => '2020-12-11',
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
                if (!$exist) {
                    //如果是首冲，付费回传
                    if ($order['charge_count'] == 1 && $order['order_status'] == 1) {
                        //写入日志
                        $logger = new Logger('hsorders');
                        $logger->pushHandler(new StreamHandler(storage_path('logs/hs_orders-' . date('Y-m-d') . '.log')));
                        $logger->info('order:', $order);

                        $order['merchant_id'] = $merchant_id;
                        $hsOrder = HsOrder::create($order);

                        //只上传当天注册用户的订单数据
//                        $subscribe = date('Y-m-d', strtotime($order['subscribe_at']));
//                        if ($subscribe != date('Y-m-d')) {
//                            $logger->warn('warn:', ['message' => '非当天注册用户']);
//                            continue;
//                        }

                        //查询落地页访问记录
                        $visitor = Visitor::where('ip', $order['ip'])->orderBy('id', 'desc')->first();
                        if (!$visitor) {
                            $logger->warn('warn:', ['message' => '无对应访问记录']);
                            continue;
                        }
                        //判定回传概率
                        $rand = random_int(1, 100);
                        $page = TouTiao::find($visitor->page_id);
                        $back_rate = $page->back_rate;
                        if ($visitor && ($rand <= $back_rate)) {
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
                                    if ($order['amount'] >= 30 ) {
                                        $toutiao = new \App\Http\Third\Toutiao();
                                        $res = $toutiao->sendConvertData($visitor->url, 2);
                                    }
                                    break;
                            }
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

    /**
     * 网易上报新用户
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function wyNewUser(Request $request)
    {
        $user = $request->all();
        $exist = WyUser::where('open_id', $user['open_id'])->first();
        $logger = new Logger('wyUser');
        $logger->pushHandler(new StreamHandler(storage_path('logs/wy_user-' . date('Y-m-d') . '.log')));
        $logger->info('order:', $user);
        if (!$exist) {
            WyUser::create($user);
        }
        return response('ok');
    }

    /**
     *
     * 网易上报订单
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function wyOrder(Request $request)
    {
        $order = $request->all();
        $exist = WyOrder::where('order_id', $order['order_id'])->first();
        $logger = new Logger('wyOrder');
        $logger->pushHandler(new StreamHandler(storage_path('logs/wy_order-' . date('Y-m-d') . '.log')));
        $logger->info('order:', $order);
        if (!$exist) {
            WyOrder::create($order);
            $new = WyUser::where('open_id', $order['open_id'])->where('is_back', 0)->first();

            //如果是新用户，付费回传
            if ($new) {
                //只上传当天注册用户的订单数据
//                if ($new->reg_time != date('Y-m-d')) {
//                    $logger->warn('warn:', ['message' => '非当天注册用户']);
//                    return response('ok-not valid reg date');
//                }

                $visitor = Visitor::where('ip', $new['ip'])->orderBy('id', 'desc')->first();
                
                //判定回传概率
                $rand = random_int(1, 100);
                $page = TouTiao::find($visitor->page_id);
                $back_rate = $page->back_rate;

                if ($visitor && ($rand <= $back_rate)) {
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
                    }
                }
            }
        }
        return response('ok');
    }
}