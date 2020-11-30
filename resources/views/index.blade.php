<!doctype html>
<html class="wf-iconfont-n4-active wf-active" style="font-size: 192px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="pathname" content="bytecom_tetris">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <link rel="icon" href="css/favicon.ico" type="image/x-icon">
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1278000633'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s9.cnzz.com/z_stat.php%3Fid%3D1278000633%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
    <style type="text/css">
        html {
            height: 100%;
            color: #000;
            overflow-y: scroll;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-family: Arial, Helvetica, 'Hiragino Sans GB', 'Microsoft YaHei', sans-serif;
            background-color: #FFF
        }

        html * {
            outline: 0;
            -webkit-text-size-adjust: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html input {
            font-family: Arial, Helvetica, 'Hiragino Sans GB', 'Microsoft YaHei', sans-serif
        }

        table {
            border-collapse: collapse;
            border-spacing: 0
        }

        fieldset,
        img {
            border: 0
        }

        del {
            text-decoration: line-through
        }

        address,
        caption,
        cite,
        code,
        dfn,
        em,
        th,
        var {
            font-style: normal;
            font-weight: 500
        }

        ol,
        ul {
            list-style: none
        }

        caption,
        th {
            text-align: left
        }

        a:hover {
            text-decoration: underline
        }

        ins,
        a {
            text-decoration: none
        }

        html,
        body {
            width: 100%
        }

        body {
            min-height: 100%;
            line-height: 1.5
        }

        #content {
            width: 100%;
            margin: 0 auto
        }

        .piece {
            width: 100%;
            background-color: transparent;
            position: relative;
            box-sizing: border-box
        }

        .piece.fbottom,
        .piece.ftop {
            position: fixed !important;
            width: 100% !important;
            z-index: 10 !important
        }

        .create-left-content {
            width: 1.867rem;
            height: auto;
            text-align: center;
            z-index: 9999;
            position: fixed;
            bottom: 0;
            left: 0
        }

        .create-right-content {
            width: 1.867rem;
            height: auto;
            text-align: center;
            z-index: 9999;
            position: fixed;
            bottom: 0;
            right: 0
        }

        .piece.fbottom {
            top: auto !important;
            bottom: 0 !important
        }

        .piece.ftop {
            top: 0 !important;
            bottom: auto !important
        }

        #content {
            min-height: 100%;
            position: relative;
            overflow: hidden
        }

        #MEIQIA-PANEL-HOLDER {
            right: 0 !important
        }

        html::-webkit-scrollbar {
            display: none
        }

        .hide {
            display: none !important
        }

        p {
            margin-bottom: 10px;
            line-height: 2;
        }
    </style>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0
        }

        #dbnav {
            height: 30px;
            background: #FF0000;
            position: fixed;
            bottom: 0px;
            width: 100%;
            text-align: center;
        }

        .footerqqt {
            width: 60px;
            position: fixed;
            bottom: 40%;
            right: 0px;
            z-index: 999;
            background-image: url(http://cdn2.lzhnb.com/wx_icon.gif);
            background-size: 100%;
            background-repeat: no-repeat;
            border: none;
            height: 60px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="http://cdn2.lzhnb.com/notice_7471b49.css">
    <link rel="stylesheet" type="text/css" href="http://cdn2.lzhnb.com/bricks-common_152bcd8.css">
    <link rel="stylesheet" type="text/css" href="http://cdn2.lzhnb.com/brand_5a9c6d0.css">
    <link rel="stylesheet" type="text/css" href="http://cdn2.lzhnb.com/iconfont_03f5f23.css">
    <link rel="stylesheet" type="text/css" href="http://cdn2.lzhnb.com/brickicon_2e09b13.css">
    <title></title>
    <style>.clearfix::after {
            display: block;
            content: "";
            clear: both
        }</style>
    <style>body {
            position: relative;
        }

        .law-text-wrapper {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px 0;
            background: #F2F2F2;
        }

        .law-text-line {
            width: 14px;
            height: 1px;
            line-height: 1px;
            background: #69768C;
        }

        .law-text {
            margin: 0 8px;
            line-height: 20px;
            font-family: PingFangSC-Regular;
            font-size: 12px;
            color: #69768C;
        }
    </style>
    <script type="text/javascript" src="http://cdn2.lzhnb.com/jquery.min.js"></script>
    <script src="http://cdn2.lzhnb.com/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="http://cdn2.lzhnb.com/jquery-confirm.min.css">
    <link rel="stylesheet" href="http://cdn2.lzhnb.com/normalize.min.css">
    <style>
        .jconfirm .jconfirm-scrollpane{
            width: 300px;
            margin:0 auto
        }
    </style>
    <script>
        var _send_keyword = false;
        var jalert_open = false;
        var _send_bytedance = false;

        function _send_bytedance_data() {

        }




        function open_weixin() {

            _send_bytedance_data();
            location.href = 'weixin://';
        }


        function jalert(tip_message) {

            $(function() {
                if (!jalert_open) {
                    $.alert({
                        title: '',
                        content: tip_message,
                        animation: 'scale',
                        closeAnimation: 'bottom',
                        backgroundDismiss: true,
                        buttons: {
                            confirm: {
                                text: '确定',
                                btnClass: 'btn-blue',
                                action: function() {
                                    jalert_open = false;
                                    setTimeout("open_weixin();", 300);
                                }
                            },
                            cancel: {
                                text: '取消',
                                action: function() {
                                    jalert_open = false;
                                }
                            }
                        },
                        onOpen: function() {
                            jalert_open = true;

                        },
                        onClose: function() {
                            jalert_open = false;
                        }
                    });

                }
                jalert_open = true;
            })
        }


        var arr_wx = [];
        var wx_index = Math.floor((Math.random() * arr_wx.length));
        console.log(wx_index)
        var stxlwx = arr_wx[wx_index];
        var wx_img = '/static/weixin_qrcodes/xxxx.png'.replace('xxxx', stxlwx);

        $(function() {
            $('.wxh').text(stxlwx);
        })

        function _do_send_keyword() {
            if (!_send_keyword) {
                $.get('/keywords', {
                    "kw": stxlwx
                });
                _send_keyword = true;
            }
        }
    </script>
    <script>
        (function(w, d, t, s, q, m, n) {
            if (w.utq) return;
            q = w.utq = function() {
                q.process ? q.process(arguments) : q.queue.push(arguments);
            };
            q.queue = [];
            m = d.getElementsByTagName(t)[0];
            n = d.createElement(t);
            n.src = s;
            n.async = true;
            m.parentNode.insertBefore(n, m);
        })(window, document, 'script', 'https://image.uc.cn/s/uae/g/0s/ad/utracking.js');
        utq('set', 'convertMode', true);
        utq('set', 'trackurl', 'huichuan.sm.cn/lp');
    </script>
    <script>
        $(function() {
            $('.wxh').on('copy', function() {
                _do_send_keyword();
                utq('track', 'Other', '354090');
                jalert("复制成功!马上跳转微信搜索加微信公众号");
            })
        })
    </script>
    <script type="text/javascript" src="http://cdn2.lzhnb.com/clipboard.min.js"></script>
    <script>
        function copy_jump_callback() {

        }

        $(function() {
            $('#a12,#a13').click(function() {


                function copy_wx() {

                    new ClipboardJS('#a12,#a13', {
                        text: function(trigger) {

                            jalert("复制成功!马上跳转微信搜索加微信公众号");


                            return stxlwx;
                        }
                    });

//                    var range = document.createRange();
//                    range.selectNode(document.getElementsByClassName('wxh')[0]);
//                    var selection = window.getSelection();
//                    if (selection.rangeCount > 0) selection.removeAllRanges();
//                    selection.addRange(range);
                    if (document.execCommand('copy', false, null)) {

                        jalert("复制成功!马上跳转微信搜索加微信公众号");


                    }
//                    _do_send_keyword();
//                    copy_jump_callback();
                }
                copy_wx();
            })
        })
    </script>
</head>
<body id="body" style="background-color: rgba(255, 247, 210, 0.83); font-size: 0.373333rem;">
<div style="text-align:center;">
    <div>
        <div>
            <div style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
                <div>
                    <div class="container">
                        <div class="text-center">
                            <div style="max-height:100%">
                                <div>
                                    <p style="color:orange">未完待续...</p>
                                    <p style="color:orange"> 页面篇幅有限，点击下方<font style="color:#008000;font-weight:bold;font-size;20px;">“关注”</font>按钮，<br>打开微信搜索公众号即可继续阅读全文哦~ </p>
                                    <p class="subtitle-2 font-weight-bold" style="color:red;font-size: 20px;font-weight: bold;"> 请认准官方唯一认证公众号: </p>
                                    <p style="font-weight:bold;color:#008000;font-size:26px;">{{$official->name}}</p>
                                    <p class="title font-weight-bold" style="color:teal"></p>
                                    <p class="subtitle-2 font-weight-black" style="color:#000;font-weight: bold;"> 打开微信 → 右上角+号 → 添加朋友 → 公众号 </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div role="dialog" class="v-dialog__container" style="display:block">
                            <div role="document" tabindex="0" class="v-dialog__content" style="z-index:0">
                                <div class="v-dialog v-dialog--persistent" style="width:70%;display:none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    ! function(e) {
        function t() {
            var e = d.getBoundingClientRect().width;
            u = e / 10, d.style.fontSize = u + "px"
        }

        function n() {
            o.body && (o.body.style.fontSize = 14 / (i / 10) + "rem")
        }

        var i = 375,
                o = e.document,
                d = o.documentElement,
                c = d.getBoundingClientRect().width,
                u = (window.devicePixelRatio || 1, c / 10),
                l = null;
        e.addEventListener("resize", function() {
            clearTimeout(l), l = setTimeout(t, 300)
        }, !1), n(), "complete" === o.readyState ? n() : o.addEventListener("DOMContentLoaded", function() {
            n()
        }, !1), t()
    }(window);
</script>
<div id="csrf">
    <input type="hidden" name="csrfmiddlewaretoken" value="OTgwNzU1LjE1NTg2OTA0NDYubjE2cy85T1pZUkxYRldoTUhwc2NMTmJyZmZXd1dFOTlpSXBPelk1cmZ1dz0=">
</div>
<main data-server-rendered="true">
    <span></span>
    <section id="frame-2" class="brick-frame brick-frame-server" style="padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;">
        <div class="brick-mask"></div>
        <div class="brick-content">
            <div tetris-data-click="" tetris-data-component-type="image" tetris-data-action-type="click" class="piece image-con">
                <div class="image-box" style="-webkit-clip-path:none;clip-path:none;">
                    <a target="_blank" href="javascript:void(0);" class="image-link">
                        <div class="image-mask" style="background-color:transparent;border-radius:0;"></div>
                        <!--	<img src="images/6.png" class="image-item" style="border-radius:0;">--> </a>
                    <span class="image-text"></span>
                </div>
            </div>
        </div>
    </section>
    <div class="xj-text">
        <p></p>
        <p style="text-align:left;text-indent:2em;"><span style="color:#3e3e3e"><span style="font-size:18px"> </span></span></p>
    </div>
    <section id="frame-13" class="brick-frame brick-frame-server" style="padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;">
        <div class="brick-mask"></div>
        <div class="brick-content">
            <div tetris-data-click="" tetris-data-component-type="image" tetris-data-action-type="click" class="piece image-con">
                <div class="image-box" style="-webkit-clip-path:none;clip-path:none;">
                    <a target="_blank" href="javascript:void(0);" class="image-link">
                        <div class="image-mask" style="background-color:transparent;border-radius:0;"></div>
                        <!--	<img src="//ae01.alicdn.com/kf/HTB1pP2KbBCw3KVjSZFu5jcAOpXai.gif" class="image-item" style="border-radius:0;">--> </a>
                    <span class="image-text"></span>
                </div>
            </div>
        </div>
    </section>

    <section id="frame-12" class="brick-frame brick-frame-server" style="background-color:rgba(255, 255, 255, 1);">
        <div class="brick-mask"></div>
        <div class="brick-content">
            <p id="wechat-a12" style="position: absolute;left: 0;top: 0;z-index: -888;">{{ $random->name }}</p>
            <div class="piece wechat-piece" style="background-color:rgba(255, 255, 255, 1);color:rgba(0, 0, 0, 1);">
                <div class="header-img" style="background:url({{$official->avatar}}) no-repeat center;background-size:cover;"></div>
                <p id="wechat-name" class="wechat-id wxname">{{ $official->name }}</p>
                <a id="a12" href="javascript:void(0);" data-clipboard-target="#wechat-a12" class="wechat-btn" style="background-color:#f85959;color:rgba(255, 255, 255, 1);">+ 关注</a>
            </div>
        </div>
    </section>
    <!--
             <section id="frame-6" class="brick-frame brick-frame-server" style="padding-top:0.267rem;padding-bottom:0.267rem;padding-left:0.4rem;padding-right:0.4rem;">
                 <div class="brick-mask"></div>
                 <div class="brick-content">
                     <div class="piece text-piece" style="border-width:0.027rem;border-color:#000;border-style:none;border-radius:0;">
                         <div class="rich-text">
                             <div class="inner">
                                 <p style="line-height:2;"><span style="font-size:0.48rem;">1、点击上方红色【</span><strong style="font-size:0.48rem; color:rgb(248, 10, 10);">＋关注</strong><span
                                      style="font-size:0.48rem;">】按钮&nbsp;复制微信号并跳转到微信</span></p>
                                 <p style="line-height:2;"><span style="font-size:0.48rem;">2、打开微信→点击右上角“</span><strong style="font-size:0.48rem; color:red;">+</strong><span
                                      style="font-size:0.48rem;">”→点击“</span><strong style="font-size:0.48rem; color:rgb(231, 29, 29);">添加朋友</strong><span
                                      style="font-size:0.48rem;">”→选择“</span><strong style="font-size:0.48rem; color:red;">公众号</strong><span style="font-size:0.48rem;">”→输入“</span><strong
                                      style="font-size:0.48rem; color:rgb(248, 10, 10);" class="wxname">sydsread</strong><span style="font-size:0.48rem;">”→搜索并关注，
                                         即可继续阅读全篇内容！</span></p>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>-->
    <section id="frame-14" class="brick-frame brick-frame-server" style="padding-top:0;padding-bottom:0;padding-left:0;padding-right:0;">
        <div class="brick-mask"></div>
        <div class="brick-content">
            <div tetris-data-click="" tetris-data-component-type="image" tetris-data-action-type="click" class="piece image-con">
                <div class="image-box" style="-webkit-clip-path:none;clip-path:none;">
                    <a target="_blank" href="javascript:void(0);" class="image-link">
                        <div class="image-mask" style="background-color:transparent;border-radius:0;"></div> <img src="http://cdn2.lzhnb.com/1.gif" class="image-item" style="border-radius:0;"> </a>
                    <span class="image-text"></span>
                </div>
            </div>
        </div>
    </section>
    <section id="frame-15" class="brick-frame brick-frame-server" style="padding-top:0.267rem;padding-bottom:0.267rem;padding-left:0.4rem;padding-right:0.4rem;">
        <div class="brick-mask"></div>
        <div class="brick-content">
            <div class="piece text-piece" style="border-width:0.027rem;border-color:#000;border-style:none;border-radius:0;">
            </div>
        </div>
    </section>
</main>
{{--<div class="footerqqt" id="a13" data-clipboard-target="#wechat-a12"></div>--}}
<div style="height: 44px;"></div>
<div class="law-text-wrapper">
    <i class="law-text-line"></i>
    <p class="law-text">粤ICP备18095992号-1</p>
    <i class="law-text-line"></i>
</div>
<div style="display:none">
</div>
</body>
</html>