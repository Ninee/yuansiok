<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function clearVisitors()
    {
        $date = $mtime= date("Y-m-d 00:00:00", strtotime("-3 day"));
        Visitor::where('created_at', '<', $date)->delete();
        return response('ok');
    }
}
