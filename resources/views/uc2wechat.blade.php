<!doctype html>
<html lang="en">
 <head> 
  <meta charset="UTF-8"> 
  <link rel="icon" href="data:image/ico;base64,aWNv"> 
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport"> 
  <meta name="format-detection" content="telephone=no"> 
  <title>{{$toutiao->title}}</title>
  <style>
        body {
            font-size: 12px;
          
        }

        .main {
            width: 100%;
            max-width: 414px;
            margin: 0 auto;
        }

        .banner {
            padding: 12px 16px 0;
        }

        .banner img {
            width: 100%;
            border-radius: 5px;
        }

        .content {
            padding: 0 16px;
            font-size: 1.6em;
            color: #333;
            line-height: 30px;
            text-align: justify;
            margin: 16px auto 0;
            white-space: pre-line;
        }

        .footer {
            font-size: 16px;
            padding: 16px;
            margin-top: 30px;
            text-align: center;
        }

        .footer-text {
            font-size: 18px;
            line-height: 1.9;
            text-align: center;
            font-weight: 700;
        }

        .footer-icon {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAG0AAAAcCAYAAABrhjEyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMTQwIDc5LjE2MDQ1MSwgMjAxNy8wNS8wNi0wMTowODoyMSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTggKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NzU4NDYwOEVCQUQ1MTFFODg3QkI4NTAyN0RBN0EzMkYiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NzU4NDYwOEZCQUQ1MTFFODg3QkI4NTAyN0RBN0EzMkYiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo3NTg0NjA4Q0JBRDUxMUU4ODdCQjg1MDI3REE3QTMyRiIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo3NTg0NjA4REJBRDUxMUU4ODdCQjg1MDI3REE3QTMyRiIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PkPF/s8AAAIcSURBVHja7JoxS8NAFMeTqqOLUvFDdGs76gew0MnF1UUtCFYQOqtQunUQqTjZtbuL4ORiKfg1hE4Fwamt/yeXQNNL7qKFu3fcgz+hTXP5vftfLu+ShuVyOciIY6gLtYWWYjQaBbZFpVKJucHXDpiELndB0c4etAntB7zCae51RSNX0Dv0zCx5p7lDxfSoDBunR9ej4LuAX6imx23oAHqBPhnd0GNuzATOcauutDuoDz0yG4xOc6tM+4CmYsspnObWKUTI2Bm3QgRTTQFsM273Kx1uXz366tGHDabVoSF0yGyKqUNDyElulWnnUBU6YzYYneZWmbYhtmvMknea29/TfCHiw5vmw5vmStAD4yOIVtg30CTHsfRws0UlKhbYAwPlccyN809yHPfLTUsZrtxk2pOoWuhtaQ0aa7RRhF6hEvQNDQwMuJgbCdXQAWONxJ3gpumxL/ZVxY5iDsMoTD1JX+AWiekmzpqbTDuBHsQXJYVxyQZ60IWh5Je40zpAkjhrbjJtKlbgPYVxu5IGGri85yYyx3ml3MkOwGfnuKPqkRJoSIzbEp93oLdkA+I4YyE6Pje3KcNWxZ18NRNC99Bpxjnpf3mXkWE2vJrBqNTmNm3YKriT67RoBHRTGuhATdNXWMbITeXGb5o2GfYfbtniei6M6UgMa9m64KTEKEEZN753ijvriQgdcA19Qbc2G5bohAVumw37K/ePAAMAxAomSJZ7AbkAAAAASUVORK5CYII=);
            background-size: cover;
            width: 109px;
            height: 28px;
            margin: 10px auto;
        }

        .footer-wechat-text {
            padding: 12px 13px;
            background-color: #f6f6f6;
            font-size: 26px;

            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }

        .colorR-label {
            color: #f54343;
        }

        .footer-img {
            margin: 20px 0;
        }

        .footer-img img {
            width: 100%;
        }

        .footer-copyright {
            font-size: 14px;
            color: #999;
            margin: 11px 0;
        }

        /* 复制弹框 */
        .alert {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .alert .mask {
            position: absolute;
            background: #00000080;
            z-index: 1;
            width: 100%;
            height: 100%;
        }

        .alert-content {
            position: relative;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 400px;
            background: #fff;
            z-index: 2;
        }

        .gzh_img {
            width: 100%;
        }

        .btn {
            display: inline-block;
            padding: 2px 5px;
            text-align: center;
            -ms-touch-action: manipulation;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 30%;
            border-radius: 20px;
            font-size: 15px;
            margin: 20px 5% 0 0;
        }

        .popup-cancel {
            border: 1px solid #999999;
            color: #999999;
        }

        .popup-sure {
            background: #4caf50;
            color: #fff;
            border: 0;
            box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
        }

        .focus-box {
            text-align: center;
        }

        .animated {
            display: block !important;
            -webkit-animation-name: slideInUp;
            animation-name: slideInUp;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @keyframes slideInUp {
            from {
                top: 0px;
            }
            to {
                top: 45%;
            }
        }

        @-webkit-keyframes slideInUp /* Safari and Chrome */
        {
            from {
                top: 0px;
            }
            to {
                top: 45%;
            }
        }

        .copy-button {
            padding: 4px 12px;
            border-radius: 6px;
            background: #ff5252;
            cursor: pointer;
            color: white;
            outline: none;
            font-size: 18px;
            letter-spacing: 2px;
        }

        .readbtn {
            background: #67ac5b;
            border-radius: 3px;
            text-align: center;
            line-height: 40px;
            font-size: 20px;
            margin-bottom: 10px;
            border: none;
            color: #FFF;

            -webkit-animation-name: scaleDraw;
            -webkit-animation-timing-function: ease-in-out;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-duration: 3s;
        }

        .surebtn {
            -webkit-animation-name: scaleDraw;
            -webkit-animation-timing-function: ease-in-out;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-duration: 3s;
        }

        @keyframes scaleDraw {
            0% {
                transform: scale(1);
            }
            25% {
                transform: scale(1.2);
            }
            50% {
                transform: scale(1);
            }
            75% {
                transform: scale(1.2);
            }
        }
    </style>
  <script>

   (function(w,d,t,s,q,m,n){if(w.utq)return;q=w.utq=function(){q.process?q.process(arguments):q.queue.push(arguments);};q.queue=[];m=d.getElementsByTagName(t)[0];n=d.createElement(t);n.src=s;n.async=true;m.parentNode.insertBefore(n,m);})(window,document,'script','https://image.uc.cn/s/uae/g/0s/ad/utracking.js');utq('set', 'convertMode', true);utq('set', 'trackurl', 'huichuan.sm.cn/lp');


  </script>
  <script>
   function one_click(){
    utq('track', 'Other', '579513');

   }
  </script>
 </head> 
 <body> 
  <div class="main" data-id="83">
   <section class="chapter"> 
    <section class="plContent">
     {!! $toutiao->content !!}
    </section> 
   </section>
   <!--    uc分享到朋友圈--> 
   <div class="footer footer-uc"> 
    <p class="footer-text">篇幅有限，后续更加精彩！</p> 
    <p class="footer-text">按下方步骤<span class="colorR-label">前往关注公众号</span>继续阅读</p> 
    <p class="footer-icon"></p> 
    <p style="text-align: center;padding:5px 0 15px;"> <button class="readbtn" id="readUcButton">前往微信关注公众号</button> </p> 
    <div class="footer-img"> 
     <img src="{{asset('uc/images/wx02.gif')}}" alt="">
    </div> 
    <p class="footer-copyright">{{$toutiao->company}}</p>
   </div>
  </div> 
  <!--uc分享到朋友圈--> 
  <div class="alert alert-uc" style="display:none;"> 
   <div class="mask"></div> 
   <div class="alert-content animated"> 
    <div style="text-align: center; "> 
     <img src="{{asset('uc/images/tips.gif')}}" class="gzh_img">
    </div> 
    <div class="focus-box"> 
     <div class="btn popup-cancel hideTips">
      取消
     </div> 
     <span onclick="one_click()"> 
      <div class="btn popup-sure surebtn" id="goToFocus" onclick="call('wechatTimeline')" data-jump="{{$toutiao->channel_id}}">
       前往关注 
      </div></span> 
    </div> 
   </div> 
  </div> 
  <!--其他分享到微信--> 
  <!--<div class="alert alert-other" style="display:none;">--> 
  <!--    <div class="mask"></div>--> 
  <!--    <div class="alert-content animated" style="height: 340px;">--> 
  <!--        <div style="text-align: center; ">--> 
  <!--            <img src="-->
  <!--" class="gzh_img"/>--> 
  <!--        </div>--> 
  <!--        <div class="focus-box">--> 
  <!--            <div class="btn popup-cancel hideTips">取消</div>--> 
  <!--            <div class="btn popup-sure surebtn" id="goToWechat">确定</div>--> 
  <!--        </div>--> 
  <!--    </div>--> 
  <!--</div>--> 
  <script src="{{asset('uc/js/jquery-1.9.1.min.js')}}"></script>
  <script src="{{asset('uc/js/nativeshare.js')}}"></script>
  <script>
    var jump = $('#goToFocus').attr('data-jump');
    var nativeShare = new NativeShare();
    var shareData = {
        title: '👉点此继续免费阅读下一章👈',
        desc: '👉点此继续免费阅读下一章👈',
        // 如果是微信该link的域名必须要在微信后台配置的安全域名之内的。
        link: jump,
        icon: 'https://s.kjcdn.com/cps/landpage/continue_read.png?1',
        // 不要过于依赖以下两个回调，很多浏览器是不支持的
        success: function () {
            alert('success')
        },
        fail: function () {
            alert('fail')
        }
    };
    nativeShare.setShareData(shareData);

    function call(command) {
        try {
            nativeShare.call(command)
        } catch (err) {
            // 如果不支持，你可以在这里做降级处理
            // alert(err.message)
            location.href = 'weixin://';
        }
    }

    function copywx() {
        const range = document.createRange();
        range.selectNode(document.getElementById('copy_content'));
        const selection = window.getSelection();
        if (selection.rangeCount > 0) selection.removeAllRanges();
        selection.addRange(range);
        document.execCommand('copy');
    }

    $(function () {
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
        var id = $('.main').attr('data-id');
        //uc分享到朋友圈
        $('#readUcButton').on('click', function () {
            $('.alert-uc').show();

            // gdt('track', 'COMPLETE_ORDER', {'id': id});
        });

        //其他跳转到微信
        // $('#readOtherButton').on('click', function () {
        //     $('.alert-other').show();
        //
        //     gdt('track', 'COMPLETE_ORDER', {'id': id});
        // });

        $('.mask').on('click', function () {
            $('.alert').hide();
        });
        $('.hideTips').on('click', function () {
            $('.alert').hide();
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

    $.ajax({
      type: "POST",
      url: "/api/visitor/save",
      data: {
       url: integrityurl,
       ua: userAgent,
       ip: ip,
       domain: window.location.host,
       platform: 3,
       appid: "{{$toutiao->appid}}",
       uctrackid: getUrlParam('uctrackid'),
       page_id: "{{$toutiao->id}}"
      },
      success: function (msg) {

      }
     });
    });

</script>
  <div style="display: none"> 
  </div>  
 </body>
</html>