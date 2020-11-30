<?php


namespace App\Admin\Extension;


use App\TouTiao;

class PostBack
{
    public static function home()
    {
        $pages = TouTiao::all()->pluck('remark', 'id');
        return view('extension.post_back', compact('pages'));
    }
}