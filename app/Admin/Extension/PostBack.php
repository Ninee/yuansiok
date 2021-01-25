<?php


namespace App\Admin\Extension;


use App\TouTiao;

class PostBack
{
    const BOOK_PLATFORM_HS = 1;
    const BOOK_PLATFORM_WY = 2;
    const BOOK_PLATFORM_YC = 3;
    const BOOK_PLATFORM_YW = 4;

    public static function home()
    {
        $pages = TouTiao::all()->pluck('remark', 'id');
        return view('extension.post_back', compact('pages'));
    }

    public static function record()
    {
        return view('extension.post_back_record');
    }

    public static function supply()
    {
        return view('extension.supply');
    }
}