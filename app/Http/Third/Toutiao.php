<?php


namespace App\Http\Third;


use Illuminate\Support\Facades\Log;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Toutiao
{

    public function sendConvertData($url, $event_type) {
        $reqData = array('url' => $url, 'event_type' => $event_type);

        //写入日志
        $logger = new Logger('toutiao');
        $logger->pushHandler(new StreamHandler(storage_path('logs/toutiao-' . date('Y-m-d') . '.log')));
        $logger->info('request:', $reqData);

        $api = 'https://ad.toutiao.com/track/activate/?link=' . urlencode($url) . '&event_type=' . $event_type;
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