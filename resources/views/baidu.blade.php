<!DOCTYPE html>
<html lang=en>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;">
    <meta version="v2.3.3">
    <link rel="icon" href="favicon.ico">
    <title>在线阅读</title>
    <link href="{{ asset('baidu/app.css') }}" rel=stylesheet>
    {{--<script src="{{ asset('baidu/34-HhWrQ0anyG-0.js') }}"></script>--}}
    <script>
        window._agl = window._agl || [];
        (function () {
            _agl.push(
                    ['production', '_f7L2XwGXjyszb4d1e2oxPybgD']
            );
            (function () {
                var agl = document.createElement('script');
                agl.type ='text/javascript';
                agl.async = true;
                agl.src = 'https://fxgate.baidu.com/angelia/fcagl.js?production=_f7L2XwGXjyszb4d1e2oxPybgD';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(agl, s);
            })();
        })();
    </script>
    <script>
        var id = '25';
        var wx_arr = ["{{ $page->mp_name }}"];
        var wx_id_arr = ["{{ $page->mp_id }}"];
        var wx_desc_arr = ["点击下方\"关注公众号\"，发消息-更精彩！海量精彩书籍等你来看~"];
        var wx_avatar_arr = ["images\/b529043caa9970be86fff4b0730a5b91.png"];
        var wx_gif_arr = ["/1.gif"];
        var cdnUrl = "//opca.shenshuge.cn";
        var config = {
            "guide": 2,
            "bg": "#fafafa",
            "g_bg": "#ffffff",
            "n_bg": "#333333",
            "logo_color": "#333333",
            "info_color": "#999999",
            "content_lh": 2.5,
            "show_model": "mobile",
            "hide_id": false,
            "hide_copy": false,
            "hide_open": false,
            "hide_title": false,
            "hide_cover": false,
            "hide_copyright": false,
            "hide_pl": false,
            "search_link": null,
            "search_add_params": false,
            "share_guide": true,
            "share_guide_url": "{!! $page->mp !!}",
            "share_guide_icon": "https:\/\/sccdn.gsyuanquan.com\/hdbz.png",
            "share_guide_title": "👉 点我继续阅读，不用关注 👈",
            "ac_id": 34,
            "ad_key": "HhWrQ0anyG",
            "copy_id": 0,
            "title": "",
            "cover_rand": false,
            "cover": [],
            "next": null,
            "article_id": 14,
            "copyright": "版权：{{ $page->copyright }}",
            "is_set_content": false,
            "content": [{

                "text": '{!! $page->content !!}'
            }]
        }
    </script>
    <script>
        //打开微信回调
        function onOpenWechat() {

        }
        //一键复制回调
        function onCopy() {

        }
        //长按复制回调
        function onLongCopy() {

        }
        //阅读章节回调
        function onRead(index) {
			
        }
    </script>
    <style>
        .title {
            display: none;
        }
        img {
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div id=app></div>
    <div class=code style="display: none;">

 
		
		{{--<script type="text/javascript" src="https://s23.cnzz.com/z_stat.php?id=1276895463&web_id=1276895463"></script>--}}
    </div>
    <script src="{{ asset('baidu/chunk-vendors.js') }}"></script>
    <script src="{{ asset('baidu/app.js') }}"></script>
    <script src="{{ asset('baidu/gta.js') }}"></script>
</body>

</html>