<?php

namespace App\Http\Controllers;

use App\Models\HsOrder;
use App\Models\Visitor;
use App\Models\WyOrder;
use App\Models\WyUser;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    /**
     * 清理访客记录
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function clearVisitors()
    {
        $date = $mtime= date("Y-m-d 00:00:00", strtotime("-3 day"));
        Visitor::where('created_at', '<', $date)->delete();
        WyOrder::where('created_at', '<', $date)->delete();
        WyUser::where('created_at', '<', $date)->delete();
        HsOrder::where('created_at', '<', $date)->delete();
        return response('ok');
    }


}
