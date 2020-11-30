<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use App\Models\Landing;
use App\Models\OfficialAccount;
use App\Models\RandomMp;
use App\Models\Template;
use App\TouTiao;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($slug)
    {
        $official = OfficialAccount::whereSlug($slug)->first();
        $random = RandomMp::where('official_account_id', $official->id)->inRandomOrder()->first();
        return view('index', [
            'random' => $random,
            'official' => $official
        ]);
    }

    public function baidu()
    {
        $server_name = $_SERVER['HTTP_HOST'];
        $domain = Domain::where('domain', $server_name)->first();
        if (!$domain) {
            exit('域名不存在,请先添加域名');
        } else {
            $page = Landing::where('domain_id', $domain->id)->first();
        }
        return view('baidu', [
            'page' => $page
        ]);
    }

    public function toutiao(Request $request)
    {
        $server_name = $_SERVER['HTTP_HOST'];
        $toutiao = TouTiao::where('domain', $server_name)->first();
        if (!$toutiao) {
            exit('域名未在宝塔添加,或者未找到对应的落地页,请检查');
        }
//        $request->setTrustedProxies($request->getClientIps());
//        $ip = $request->getClientIp();
        return view('toutiao', [
            'toutiao' => $toutiao,
//            'ip' => $ip
        ]);
    }

    public function template(Request $request, $suffix = null)
    {
        $server_name = $_SERVER['HTTP_HOST'];
        $toutiao = TouTiao::where('domain', $server_name)->first();

        if ($suffix) {
            $toutiao = TouTiao::where([
                'domain' => $server_name,
                'domain_suffix' => $suffix
            ])->first();
        }
        if (!$toutiao) {
            exit('未找到对应的落地页,请检查链接是否有误');
        }
        $template = Template::find($toutiao->template_id);
//        dd($template->template);
        $request->setTrustedProxies($request->getClientIps());
        $ip = $request->getClientIp();
        return view($template->template, [
            'toutiao' => $toutiao,
            'ip' => $ip,
        ]);
    }
}
