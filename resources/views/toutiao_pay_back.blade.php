<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="x5-orientation" content="portrait"><!-- QQ强制竖屏 -->
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <title>{{$toutiao->title}}</title>
    <style>
        *{
            margin: 0;
            padding: 0
        }
        body{
            padding: .38rem .30rem .38rem;
            font-size: .26rem;
            line-height:1.5;
            background: #fff;
        }
        h2{
            font-size: .36rem;
            font-weight: bold;
            text-align: center;
            line-height:1.5;
        }
        h3{
            font-size: .26rem;
            font-weight: bold;
            text-indent: 2em;
            margin-top: .30rem;
            line-height:1.5;
        }
        .main p{
            font-size: .36rem;
            text-indent: 2em;
            margin-top: .30rem;
            line-height:1.5;
        }
        .foot_m {margin-top:.3rem; padding:.3rem .15rem; background-color:#F7EED6;}

        .foot {}
        .foot p{
            text-align: center;
            font-weight: bold;
            font-size: .36rem;
            padding-top: .30rem;
            line-height:1.2;
        }
        .f_red {color:crimson}
        .foot_img {margin-top:.3rem;}
        .foot_img img {width:100%;}
        .foot2 {position: relative; margin-top:.30rem; padding:0 1.75rem 0 .9rem; height:.75rem;}
        .foot2 .icon {position: absolute; left:0; top:0; width:.75rem; height:.75rem; border-radius:50%;}
        .foot2 p {position: relative; top:.05rem;height:.65rem; line-height: .65rem;
            text-align: left; color:#333; font-size:.3rem;
            overflow: hidden;
            text-overflow:ellipsis;
            white-space: nowrap;}
        .foot2 .copyxs {position: absolute; right:0; top:.05rem;}
        .copyxs {display:inline-block; border-radius: .325rem; padding:0 .35rem; height:.65rem; line-height: .65rem;
            text-align: center; color:#fff; font-size:.33rem; background:red; text-decoration: none;}
        .foot3 { margin-top:.3rem;}
        .foot3 p{
            text-align: left;
            font-size: .3rem;
            padding-top: .30rem;
            line-height:1.5;
        }
        .foot3 strong {position: relative; left:-.1rem;}
        .foot3 .f_red {font-weight: bold;}

        .dialog { position: fixed; top:0; right:0; bottom:0; left:0; width:100%; height:100%; z-index: 5; background:rgba(0,0,0,0.4);}
        .dialog_m { position: fixed; top:50%; left:10%; margin-top:-2.5rem; width:80%; height:4.4rem; background:#fff; border-radius: .4rem;}
        .dialog_m .h3 { margin-top:.4rem; padding:.3rem 0;text-align: center; font-size: .45rem; color:#333; font-weight: bold;}
        .dialog_m p {text-align: center; font-size: .35rem; color:#454545;}
        .dialog_m a {display:block; margin:0 auto; margin-top:.4rem; border-radius: .5rem; width:80%; height:1rem; line-height: 1rem; background:red; text-align: center;
            font-size:.45rem; color:#fff;text-decoration: none;}
        .top_ban {padding-top:.3rem;}
        .top_ban img {width:100%;}
    </style>
</head>
<body style="display: none">
<div style="font-family: 微软雅黑; font-size: 22px;">
    {!! $toutiao->content !!}
</div>


<div class="foot_m go-wx">
    <div class="foot">
        <p>篇幅有限，后续更加精彩！</p>
        <p>点击下方按钮<span class="f_red">关注微信公众号</span></p>
        <p>继续阅读精彩内容</p>
        
    	<img src="{{asset('qianniu/yangguang/a.gif')}}" style="width:100%"/>
    </div>
    <div class="foot2">
        <img src="{{Storage::disk(config('admin.upload.disk'))->url($toutiao->avatar)}}" class="icon">
        <p id="gzh">{{$toutiao->name}}</p>
        <a href="javascript:;" class="copyxs">+关注&nbsp;</a>
    </div>
    <div class="foot3">
        <p><strong>【请按照下面步骤操作】</strong></p>
        <p>1、点击上方【+关注】按钮复制微信号</p>
        <p>2、进入微信后 → 点击右上角"<span class="f_red">+</span>" → 点击"<span class="f_red">添加好友</span>" → 选择"<span class="f_red">公众号</span>"</p>
        <p>3、长按粘贴"<span class="f_red">{{$toutiao->mp_weixin}}</span>" → 关注"<span class="f_red">{{$toutiao->name}}</span>"即可继续阅读！</p>
    </div>
</div>

<div class="foot_img go-wx">
    <img src="https://tt.5dan.com/src/jc.gif" width="100%">
</div>

<div class="dialog gowx" style="display: none">
    <div class="dialog_m">
        <p class="h3">复制成功</p>
        <p>打开微信关注公众号继续阅读</p>
        <a href="javascript:;" class="gowechat">立即打开微信</a>
    </div>
	
</div>
<span style="display:block;text-align: center;font-size: 0.37rem;color: #000;margin-top: 10px;"></span>
<script type="text/javascript" src="{{asset('qianniu/yangguang/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('qianniu/yangguang/clipboard.min.js')}}"></script>
<script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
<script>
    $(function(){
        $(document.body).css("min-height",$(window).height());
        $(window).resize(function(){
            $(document.body).css("min-height",$(window).height());
        });

        function getRem(pwidth, prem) {
            var html = document.getElementsByTagName("html")[0];
            var oWidth = window.innerWidth;
            html.style.fontSize = oWidth / pwidth * prem + "px";
            if (!/iphone|ipad|ipod|android.*mobile|windows.*phone|blackberry.*mobile/i.test(window.navigator.userAgent.toLowerCase())) {
                html.style.width = "750px";
                html.style["margin"] = "0 auto";
                html.style.fontSize = "100px";
            }
        }

        getRem(750, 100);
        window.onresize = function() {
            getRem(750, 100);
        };
        //获取url中的参数
        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }

        var integrityurl = window.location.href;
        var userAgent = navigator.userAgent;
        var ip = '{{$ip}}';
        $.ajax({
            type: "POST",
            url: "/api/visitor/save",
            data: {
                url: integrityurl,
                ua: userAgent,
                ip: ip,
                domain: window.location.host,
                platform: 2,
                appid: "{{$toutiao->appid}}",
                adid: getUrlParam('adid'),
                page_id: "{{$toutiao->id}}"
            },
            success: function (msg) {

            }
        });
	
        $('body').show();
        $(".go-wx").on('click', function() {
            $('.gowx').show();
        });

        $('.gowechat').click(function () {
            $('.gowx').hide();
            window.location.href='weixin://'
        });
        var randomWord = '{{$toutiao->rand_suffix}}'.split(',');
        new ClipboardJS('.go-wx', {
            text: function () {
                var index = Math.round(Math.random()*(randomWord.length - 1));
                return '{{$toutiao->mp_weixin}}' + randomWord[index];
            }
        });
    });




   

  


</script>

	<p align="center">{{$toutiao->company}}</p>
	<!-- <script src="https://tttz.9944.com/app/yuewen/js/callback.js"> -->
<!-- </script> -->
</body>

</html>