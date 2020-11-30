<?php


namespace App\Http\Third;


use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class BaiduOcpc
{

    const BAIDU_OCPC_URL = 'https://ocpc.baidu.com/ocpcapi/api/uploadConvertData';
    const RETRY_TIMES = 3;

    /**
     * @param $token
     * @param $conversionTypes
     * @return bool 发送成功返回响应数据，失败返回false
     */
    public function sendConvertData($token, $conversionTypes) {
        $reqData = array('token' => $token, 'conversionTypes' => $conversionTypes);
        //写入日志
        $logger = new Logger('hsorders');
        $logger->pushHandler(new StreamHandler(storage_path('logs/baidu.log')));
        $logger->info('back_to_baidu:', $reqData);
        $reqData = json_encode($reqData);
        // 发送完整的请求数据

        // 向百度发送数据
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, self::BAIDU_OCPC_URL);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $reqData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Content-Length: ' . strlen($reqData)
            )
        );
        // 添加重试，重试次数为3
        for ($i = 0; $i < self::RETRY_TIMES; $i++) {
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode === 200) {
                // 打印返回结果
                // do some log
//                print_r('retry times: ' . $i . ' res: ' . $response . "\n");
                $res = json_decode($response, true);
                // status为4，代表服务端异常，可添加重试
                $status = $res['header']['status'];
                if ($status !== 4) {
                    curl_close($ch);
                    return $res;
                }
            }
        }
        curl_close($ch);
        return false;
    }

}