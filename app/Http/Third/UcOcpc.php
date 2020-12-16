<?php


namespace App\Http\Third;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class UcOcpc
{

    public function sendConvertData($url, $event_type) {
        $reqData = array('url' => $url, 'event_type' => $event_type);

        //写入日志
        $logger = new Logger('uc');
        $logger->pushHandler(new StreamHandler(storage_path('logs/uc-' . date('Y-m-d') . '.log')));
        $logger->info('request:', $reqData);

        $api = 'https://huichuan.uc.cn/callback/ct/add?link=' . urlencode($url) . '&event_type=' . $event_type;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $logger->info('response:', json_decode($response, true));
        curl_close($ch);
        if ($response) {
            return $response;
        }
        return false;
    }

}