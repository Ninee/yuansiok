<?php


namespace App\Http\Controllers;


use App\Http\Third\BaiduOcpc;
use App\Http\Third\UcOcpc;
use App\Http\Util\HttpClient;
use App\Models\HsOrder;
use App\Models\HuaSheng;
use App\Models\Visitor;
use App\Models\WyOrder;
use App\Models\WyUser;
use App\Models\YcOrder;
use App\Models\YwOrder;
use App\Models\YwUser;
use App\Models\ZdOrder;
use App\Models\ZdUser;
use App\Models\Zhangdu;
use App\TouTiao;
use Illuminate\Http\Request;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use function GuzzleHttp\Psr7\build_query;

class ThirdController extends Controller
{
    const RETRY_TIMES = 3;  //重试次数

    /**
     * @param $visitor
     * @param $amount 单位为分
     * @return bool|string
     * @throws \Exception
     */
    public function postBack($visitor, $amount)
    {
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
                        'newType' => 19 // 一句话咨询
                    );
                    $conversionTypes = array($cv);
                    $ocpc = new BaiduOcpc();
                    $res = $ocpc->sendConvertData($token, $conversionTypes);
                    break;
                //回传头条
                case Visitor::PLATFORM_TOUTIAO:
                    //充值金额大于30元才回传
                    if ($amount >= 3000 ) {
                        $toutiao = new \App\Http\Third\Toutiao();
                        $res = $toutiao->sendConvertData($visitor->url, 2); //付费
                    } else {
                        $res = false;
                    }
                    break;
                case Visitor::PLATFORM_UC:
                    //回传UC
                    $uc = new UcOcpc();
                    $res = $uc->sendConvertData($visitor->url, 13); //在线咨询
                    break;
                default:
                    $res = false;
                    break;
            }
            return $res;
        }
        return false;
    }

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

    public function ycSign($data)
    {
        $secret = '3YoRBAB3ygVZM2I8BlZoS0qur5i47lVe';
        $req = $data;
//        ksort($req, SORT_REGULAR);
        asort($req);
        $splicedString = '';
        foreach ($req as $paramKey => $paramValue) {
            $splicedString .= $paramKey . trim($paramValue);
        }
        return md5($splicedString . $secret);
    }
    /**
     * 元初回传
     */
    public function back4Yc()
    {
        //请求渠道列表
        $appid = 13;
        $data = [
            'appid' => $appid,
            'timesmap' => time()
        ];
        $data['sign'] = $this->ycSign($data);
        $client = new HttpClient('https://vip.yuyuetui.net/index/api/getChannelList');
        $request = $client->httpGet('', $data);
        $response = $this->response($request);
        if ($response['code'] == 0) {
            $channels = $response['data'];
            foreach ($channels as $channel) {
                $orderReq = [
                    'appid' => $appid,
                    'timesmap' => time(),
                    'channel' => $channel['channel'],
                    'starttime' => strtotime(date('Y-m-d 00:00:00', time())),
                    'endtime' => strtotime(date('Y-m-d 23:59:59', time())),
                    'status' => 1,
                    'page' => 1
                ];

                $orderReq['sign'] = $this->ycSign($orderReq);
                $orderClient = new HttpClient('https://vip.yuyuetui.net/index/api/getOrderList');
                $orderResult = $this->response($orderClient->httpGet('', $orderReq));
                if ($orderResult['code'] == 0) {
                    if ($orderResult['data']['item']) {

                        //插入数据并回传
                        $orders = $orderResult['data']['item'];
                        foreach ($orders as $index => $order) {
                            //检查是否已入库
                            $exist = YcOrder::where('order_id', $order['order_id'])->first();
                            if (!$exist) {
                                //如果是首冲，付费回传
                                if ($order['status'] == 1) {
                                    //写入日志
                                    $logger = new Logger('ycorders');
                                    $logger->pushHandler(new StreamHandler(storage_path('logs/yc_orders-' . date('Y-m-d') . '.log')));
                                    $logger->info('order:', $order);

                                    $ycOrder = YcOrder::create($order);

                                    //只上传当天注册用户的订单数据
                                    $subscribe = date('Y-m-d', $order['regsiter_time']);
                                    if ($subscribe != date('Y-m-d')) {
                                        $logger->warn('warn:', ['message' => '非当天注册用户']);
                                        continue;
                                    }

                                    //查询落地页访问记录
                                    $visitor = Visitor::where('ip', $order['ip'])->where('created_at', '>', date('Y-m-d 00:00:00'))->orderBy('id', 'asc')->first();
                                    if (!$visitor) {
                                        $logger->warn('warn:', ['message' => '无对应访问记录']);
                                        continue;
                                    }

                                    //回传
                                    $res = $this->postBack($visitor, $order['money'] * 100);
                                    //回传成功，更新订单回传状态
                                    if ($res) {
                                        $ycOrder->is_back = 1;
                                        $ycOrder->save();
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

    }

    public function response($res)
    {
        return json_decode($res->getBody()->getContents(), true);
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
//            print_r($orders);

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
                        $subscribe = date('Y-m-d', strtotime($order['subscribe_at']));
                        if ($subscribe != date('Y-m-d')) {
                            $logger->warn('warn:', ['message' => '非当天注册用户']);
                            continue;
                        }

                        //查询落地页访问记录
                        $visitor = Visitor::where('ip', $order['ip'])->where('created_at', '>', date('Y-m-d 00:00:00'))->orderBy('id', 'asc')->first();
                        if (!$visitor) {
                            $logger->warn('warn:', ['message' => '无对应访问记录']);
                            continue;
                        }

                        //回传
                        $res = $this->postBack($visitor, $order['amount'] * 100);
                        //回传成功，更新订单回传状态
                        if ($res) {
                            $hsOrder->is_back = 1;
                            $hsOrder->save();
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
                $reg_time = date('Y-m-d', strtotime($new->reg_time));
                if ($reg_time != date('Y-m-d')) {
                    $logger->warn('warn:', ['message' => '非当天注册用户']);
                    return response('ok-not valid reg date');
                }

                $visitor = Visitor::where('ip', $new['ip'])->where('created_at', '>', date('Y-m-d 00:00:00'))->orderBy('id', 'asc')->first();
                if (!$visitor) {
                    $logger->warn('warn:', ['message' => '无对应访问记录']);
                    return response('ok-not valid visitor');
                }
                //回传
                $res = $this->postBack($visitor, $order['amount']);
                //回传成功，更新订单回传状态
                if ($res) {
                    $new->is_back = 1;
                    $new->save();
                }
            }
        }
        return response('ok');
    }

    /**
     * 从掌读获取订单
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function back4Zd()
    {
        $startTime = \request('start_time') ? strtotime(date('Y-m-d 00:00:00', strtotime(\request('start_time')))): strtotime(date('Y-m-d 00:00:00',time()));
        $endTime = \request('end_time') ? strtotime(date('Y-m-d 23:59:59', strtotime(\request('end_time')))) : time();

        $api = 'https://api.zhangdu520.com/';
        $client = new HttpClient($api);

        $zhangdus = Zhangdu::all();
        foreach ($zhangdus as $zhangdu) {
            $uid = $zhangdu->uid;
            $appSecret = $zhangdu->secret;
            $timestamp = time();
            $config = [
                'uid' => $uid,
                'timestamp' => $timestamp,
                'sign' => md5($uid . '&' . $appSecret . '&' . $timestamp)
            ];



            $param = array_merge($config, [
                'starttime' => $startTime,
                'endtime' => $endTime,
                'page' => 1,
            ]) ;
            //先请求新注册用户
            $request = $client->httpGet('channel/getuser', $param);
            $response = $this->httpResponse($request);
            $users = $response['data']['list'];

            foreach ($users as $user) {
                ZdUser::firstOrCreate(['openid' => $user['openid']], $user);
            }

            //请求订单
            $request = $client->httpGet('channel/getorder', $param);
            $response = $this->httpResponse($request);
            if ($response['err'] == 0) {
                $orders = $response['data']['list'];
                if (!empty($orders)) {
                    foreach ($orders as $order) {
                        //检查是否已入库
                        $exist = ZdOrder::where('orderno', $order['orderno'])->first();
                        if (!$exist) {
                            //如果是首冲，付费回传
                            $new = ZdUser::where('openid', $order['openid'])->where('is_back', 0)->whereBetween('regtime', [
                                $startTime,
                                $endTime
                            ])->first();

                            if ($new && $order['status'] == 1) {
                                //写入日志
                                $logger = new Logger('zdorders');
                                $logger->pushHandler(new StreamHandler(storage_path('logs/zd_orders-' . date('Y-m-d') . '.log')));
                                $logger->info('order:', $order);

                                $zdOrder = ZdOrder::create($order);

                                //查询落地页访问记录
                                $visitor = Visitor::where('ip', $order['ip'])->where('created_at', '>', date('Y-m-d 00:00:00'))->orderBy('id', 'asc')->first();
                                if (!$visitor) {
                                    $logger->warn('warn:', ['message' => '无对应访问记录']);
                                    continue;
                                }
                                //回传
                                $res = $this->postBack($visitor, $order['amount'] * 100);
                                //回传成功，更新订单回传状态
                                if ($res) {
                                    $new->is_back = 1;
                                    $new->save();
                                    $zdOrder->is_back = 1;
                                    $zdOrder->save();
                                }
                            }
                        }
                    }
                }
            } else {
                var_dump($response);
            }
        }
        return response('掌读回传完成');
    }

    public function back4Yw()
    {
        //阅文每次订单只支持截止到目前时间内订单
        $api = 'https://open.yuewen.com/cpapi/';
        $client = new HttpClient($api);
        $config = [
            'email' => '3035593319@qq.com',
            'version' => 1,
            'timestamp' => time(),
        ];

        $param = array_merge($config, [
            'start_time' => strtotime('2019-01-01'),
            'end_time' => time(),
            'page' => 1,
        ]) ;

        $param['sign'] = $this->ywSign($param);
        $request = $client->httpGet('wxRecharge/getapplist', $param);
        $response = $this->httpResponse($request);
        if ($response['code'] == 0) {
            $channels = $response['data']['list'];
            foreach ($channels as $channel) {
                $data = array_merge($config, [
                    'start_time' => strtotime(date('Y-m-d 00:00:00', time())),
                    'end_time' => time() - 60,
                    'appflags' => $channel['appflag'],
                    'order_status' => 2,
                ]);
                $data['sign'] = $this->ywSign($data);
                $orderReq = $client->httpGet('wxRecharge/querychargelog', $data);
                $orderResponse = $this->httpResponse($orderReq);
                unset($data);
                if ($orderResponse['code'] == 0) {
                    $orders = $orderResponse['data']['list'];
                    if (!empty($orders)) {
                        foreach ($orders as $order) {
                            //检查是否是首冲
                            $exist = YwOrder::where('order_id', $order['order_id'])->first();
                            if ($exist) continue;
                            $logger = new Logger('ywOrder');
                            $logger->pushHandler(new StreamHandler(storage_path('logs/yw_order-' . date('Y-m-d') . '.log')));
                            $logger->info('order:', $order);
                            YwOrder::create($order);
                            $new = YwUser::where('open_id', $order['openid'])->where('is_back', 0)->first();

                            //如果是新用户，付费回传
                            if ($new) {
                                //只上传当天注册用户的订单数据
                                $reg_time = date('Y-m-d', strtotime($new->time));
                                if ($reg_time != date('Y-m-d')) {
                                    $logger->warn('warn:', ['message' => '非当天注册用户']);
                                    continue;
                                }

                                $visitor = Visitor::where('ip', $new['ip'])->where('created_at', '>', date('Y-m-d 00:00:00'))->orderBy('id', 'asc')->first();
                                if (!$visitor) {
                                    $logger->warn('warn:', ['message' => '无对应访问记录']);
                                    continue;
                                }
                                //回传
                                $res = $this->postBack($visitor, $order['amount'] * 100);  //转换单位为分
                                //回传成功，更新订单回传状态
                                if ($res) {
                                    $new->is_back = 1;
                                    $new->save();
                                }
                            }
                        }
                    }
                } else {
                    var_dump($orderResponse);
                }
            }
        } else {
            dd($response);
        }
        return response('阅文书城回传完成');
    }

    /**
     * 阅文上报新用户
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function ywNewUser(Request $request)
    {
        $user = $request->all();
        $exist = YwUser::where('open_id', $user['open_id'])->first();
        $logger = new Logger('YwUser');
        $logger->pushHandler(new StreamHandler(storage_path('logs/yw_user-' . date('Y-m-d') . '.log')));
        $logger->info('user:', $user);
        if (!$exist) {
            YwUser::create($user);
        }
        return response('ok');
    }

    public function ywSign($data)
    {

        $secretkey = 'ddfb7d33819a66da6057a16d66aed89f';
        $req = $data;
        ksort($req, SORT_REGULAR);
//        asort($req);
        $splicedString = '';
        foreach ($req as $paramKey => $paramValue) {
            $splicedString .= $paramKey . $paramValue;
        }
        return strtoupper(md5( $secretkey .$splicedString));
    }

    public function httpResponse($res)
    {
        return json_decode($res->getBody()->getContents(), true);
    }
}