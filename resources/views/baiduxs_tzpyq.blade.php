
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
    <!-- 跳转朋友圈css start-->
    <link type="text/css" rel="stylesheet" href="{{asset('baidu/tzpyq.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('baidu/tzpyq-footer.css')}}" />
    <!-- 跳转朋友圈css end-->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/clipboard.min.js')}}"></script>
    <script>
    var img=document.createElement("img"); 
    var serach = window.location.search; 
    if(serach.indexOf('dycallback=1') >= 0){ 
    img.src="https://track.zhuishuyun.com/a.png"+serach; 
    img.style.display="none"; 
    document.body.appendChild(img); 
    };
    </script>
    <script>
      window._agl = window._agl || [];
      (function () {
          _agl.push(
              ['production', '_f7L2XwGXjyszb4d1e2oxPybgD']
          );
          (function () {
              var agl = document.createElement('script');
              agl.type = 'text/javascript';
              agl.async = true;
              agl.src = 'https://fxgate.baidu.com/angelia/fcagl.js?production=_f7L2XwGXjyszb4d1e2oxPybgD';
              var s = document.getElementsByTagName('script')[0];
              s.parentNode.insertBefore(agl, s);
          })();
      })();
  </script>
</head>
<body style="display: none;background: rgb(255, 246, 218);">
<div style="font-family: 微软雅黑; font-weight: normal; font-size: 22px;">
    {!! $toutiao->content !!}
</div>
<section class="_135editor" data-role="paragraph">
    <p>
        <br/>
    </p>
</section>

<div class="page">
  <div class="guide">
    <p style="text-align:center;font-weight:bold;font-size:16px">篇幅有限，后续更加精彩！</p>
    <p style="text-align:center;font-weight:bold;font-size:16px"> <span>按下方步骤</span> <span style="color:red" >关注微信公众号</span> <span>继续阅读</span> </p>
    <div style="text-align:center; padding-bottom:20px;">
      <div>↓ ↓ ↓</div>
      <button  class="gowx" style="padding: 10px;margin-bottom: 12px;border: none;color: #fff;background: #4caf50;text-align: center;border-radius: .133333rem;font-size:18px;margin-top: 10px;display: inline-block;width: 4rem;text-decoration: none;"> 前往微信关注公众号 </button>
      <img class="gowx" style="width:100%" src="{{asset('images/tzpyq-xiaoshuo.gif')}}" alt=""/>
       <button  class="gowx" style="padding: 10px;margin-bottom: 12px;border: none;color: #fff;background: #4caf50;text-align: center;border-radius: .133333rem;font-size:18px;margin-top: 10px;display: inline-block;width: 4rem;text-decoration: none;"> 前往微信关注公众号 </button>
     </div>
  </div>
  <input type="text" value="share" id="share" style="display: none;" title="">
</div>
<!--弹窗-->
<div class="popup-wrap" id="popup-wrap" style="display:none">
  <div class="popup-box" style="max-width: 640px;">
    <div   style="text-align: center; " >
      <div data-title='👉点此处关注公众号继续阅读👈' data-content="👉点此处关注公众号继续阅读👈"  data-shareLink='{{$toutiao->channel_id}}' data-shareIcon="{{Storage::disk(config('admin.upload.disk'))->url($toutiao->avatar)}}" class="BaidushareBtn"><img src="{{asset('images/tzpyq-xs-pop.jpg')}}" style="width:90%"></div>
      <div class="title">
        <div data-title='👉点此处关注公众号继续阅读👈' data-content="👉点此处关注公众号继续阅读👈"  data-shareLink='{{$toutiao->channel_id}}' data-shareIcon="{{Storage::disk(config('admin.upload.disk'))->url($toutiao->avatar)}}" data-clipboard-text="{{$toutiao->mp_weixin}}" class="btn popup-cancle copywx BaidushareBtn" id="queren" style="background: #4caf50;color:#fff;font-size:18px;margin: 0;"> 确定 </div>
      </div>
    </div>
  </div>
</div>
<script>
    $('.gowx').click(function(){
        $('#popup-wrap').show();
    })
    $('.hide').click(function(){
        $('#popup-wrap').hide();
    })
  	// $('.BaidushareBtn').click(function(){
     //  window._agl && window._agl.push(['track', ['success', {t: 19}]])
     //   window._agl && window._agl.push(['track', ['success', {t: 3}]])
     // })
</script>
<script src="{{asset('baidu/share.js')}}"></script>
<script src="{{asset('baidu/tzpyq.js')}}"></script>
<script>
    var btns = document.querySelectorAll('.copywx');
    // var clipboard = new Clipboard(btns);

    // clipboard.on('success', function(e) {
    // });

    // clipboard.on('error', function(e) {
    // });
</script>

<span style="display:block;text-align: center;font-size: 0.37rem;color: #000;margin-top: 10px;"></span>
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
        
        $('body').show();
        var randomWord = '{{$toutiao->rand_suffix}}'.split(',');
        new ClipboardJS('.copywx', {
            text: function () {
                var index = Math.round(Math.random()*(randomWord.length - 1))
                return '{{$toutiao->mp_weixin}}' + randomWord[index];
            }
        });
        //获取url中的参数
        function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }

        var integrityurl = window.location.href;
        var userAgent = navigator.userAgent;
        var ip = '{{$ip}}';
        var debug = getUrlParam('debug');
        if(debug == "{{$toutiao->appid}}") {
            $.ajax({
                type: "POST",
                url: "/api/baidu/debug",
                data: {
                    url: integrityurl,
                    page_id: "{{$toutiao->id}}"
                },
                success: function (msg) {

                }
            });
        }
        $.ajax({
            type: "POST",
            url: "/api/visitor/save",
            data: {
                url: integrityurl,
                ua: userAgent,
                ip: ip,
                appid: "{{$toutiao->appid}}",
                bd_vid: getUrlParam('bd_vid'),
                page_id: "{{$toutiao->id}}"
            },
            success: function (msg) {

            }
        });
    });
</script>
<div class="ar_bt">{{$toutiao->company}}</div>
</body>

</html>