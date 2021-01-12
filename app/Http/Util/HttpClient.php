<?php


namespace App\Http\Util;


class HttpClient
{
    protected $client;

    public function __construct($baseUri)
    {
        $this->client = new \GuzzleHttp\Client(['base_uri' => $baseUri]);
    }

    public function request($url, $method, $options)
    {
        return $this->client->request($method, $url, $options);
    }

    public function httpGet(string $url, array $query = [])
    {
        return $this->request($url, 'GET', ['query' => $query]);
    }

    public function httpPost(string $url, array $data = [])
    {
        return $this->request($url, 'POST', ['form_params' => $data]);
    }

    public function httpPostJson(string $url, array $data = [])
    {
        return $this->request($url, 'POST', ['json' => $data]);
    }
}