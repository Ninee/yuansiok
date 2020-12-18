<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title>{{$landing->title}}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
     <style>a,abbr,acronym,address,applet,article,aside,audio,b,big,blockquote,body,canvas,caption,center,cite,code,dd,del,details,dfn,div,dl,dt,em,embed,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,main,mark,menu,nav,object,ol,output,p,pre,q,ruby,s,samp,section,small,span,strike,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,tt,u,ul,var,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav,section{display:block}[hidden]{display:none}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:after,blockquote:before,q:after,q:before{content:"";content:none}table{border-collapse:collapse;border-spacing:0}body,button,input,select,textarea{font:14px \5FAE\8F6F\96C5\9ED1,Hiragino Sans GB,Hiragino Sans GB W3,arial,\5b8b\4f53}a{color:#333;text-decoration:none;*blur:expression(this.onFocus=this.blur());outline-style:none}.hidden{display:none}body{background:#e5e4db}.novel-header{height:40px;background:#f5f5f5}.novel-hd-inner{width:1060px;margin:0 auto;height:100%}.novel-hd-left{float:left;width:218px;height:40px;background:url(360/images/header_icon.png) no-repeat}.novel-hd-qrimg{display:none;position:absolute;left:0;top:40px;width:100px;height:120px;background:#2e2e2c}.novel-hd-qrimg i{position:absolute;left:11px;top:-6px;width:11px;height:6px;background:url(360/images/header_icon.png) no-repeat 0 -160px}.novel-hd-qrimg span{display:block;width:80px;height:80px;background:#fff;margin:12px auto 0;padding:0px}.novel-hd-qrimg em{display:block;text-align:center;line-height:30px;color:#fff;font-size:12px}.novel-hd-qrimg img{width:80px;height:80px}.novel-hd-qrcode{position:relative;width:75px;height:40px}.novel-hd-qrcode:hover .novel-hd-qrimg{display:block}.novel-hd-right{float:right;width:222px;height:40px;background:url(306/images/header_icon.png) no-repeat 0 -60px}.novel-loading{height:800px;line-height:600px;text-align:center;color:#999}.novel-content{width:810px;margin:0 auto;padding:20px 250px 90px 0}.novel-name{height:40px;line-height:40px;margin:30px 0;font-size:28px;color:#222;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.novel-info{height:45px;font-style:14px;color:#999}.info-from{float:left;margin:10px 45px 0 0}.info-time{float:left;margin-top:10px}.info-share{float:right;width:140px;height:30px;background:url(360/images/index1_icon.png) no-repeat 0 -140px;margin:0 10px 0 20px}.info-comment{float:right;margin:10px}.info-comment i{color:#ff6161;font-family:\6977\4F53}.info-user{float:right;margin-top:10px}.info-user i{color:#ff6161;font-family:Georgia;font-weight:700}.novel-main{width:798px;background:#f6f4ec;border:1px solid #d4d2c7;padding:19px 0 30px}.novel-banner{width:760px;margin:0 auto;overflow:hidden;text-align:center}.novel-banner img{max-width:760px}.novel-line{background-image:url(360/images/sprite.png);background-position:0 0;background-size:670px 35px;display:none}.novel-text{width:750px;margin:0 auto;padding-left:10px}.novel-text pre{white-space:pre-wrap;word-wrap:break-word;font-size:18px;line-height:30px;color:#484848}.novel-chapter{text-align:center;padding-bottom:20px;margin-top:30px}.novel-chapter span{position:relative;font-size:24px;line-height:44px;padding:0 29px;display:inline-block;*display:inline;*zoom:1;margin:0 auto}.novel-chapter i{background:url(360/images/index1_icon.png) no-repeat}.novel-chapter b,.novel-chapter i{display:inline-block;*display:inline;*zoom:1;width:29px;height:60px;vertical-align:middle}.novel-chapter b{background:url(360/images/index1_icon.png) no-repeat -29px 0}.novel-chapter em{background:url(360/images/index1_icon.png) repeat-x 0 -70px;display:inline-block;*display:inline;*zoom:1;height:60px;line-height:48px;vertical-align:middle;color:#c57053;font-weight:700;font-size:20px}.novel-chapter code{background:url(360/images/index1_icon.png) no-repeat -58px 0;*display:inline;*zoom:1;position:absolute;width:20px;height:10px;left:50%;top:3px;margin-left:-10px}.novel-nextTitle{margin-top:15px;text-align:center;color:#ff2b49;line-height:50px;font-size:18px}.novel-wcTips{text-indent:30px;margin-top:30px;color:#ff2b49;font-size:20px}.novel-wcTips span{color:#2b7bff}.novel-arrow{background-image:url(360/images/sprite.png);background-position:0 -7px;background-size:670px 35px;width:109px;height:28px;margin:30px 0 0 220px}.novel-qrbox{width:760px;height:245px;position:relative;overflow:hidden;margin:30px auto 0}.novel-qrbox img,.novel-qrbox table{position:absolute;width:153px;height:153px;top:46px;right:47px}.novel-fiexd{position:absolute;left:50%;margin-left:290px;top:205px;width:210px;padding:2px 14px 14px;border:1px solid #d4d2c7;background:#fcfaf4}.fiexd-style{position:fixed;top:0}.tab-nosl-title{height:39px;border-bottom:1px solid #ebe8e8;margin:4px 0 8px}.tab-nosl-title h4{float:left;width:105px;height:38px;text-align:center;line-height:38px;cursor:pointer;color:#525252}.tab-nosl-title h4.cur{border-bottom:2px solid #d63837;color:#d63837}.novel-fiexd-qrcode{margin-top:12px}.novel-fiexd-qrcode span{display:block;width:115px;height:115px;background:#fff;margin:0 auto}.novel-fiexd-qrcode img{width:120px;height:120px}.tab-nosl-rank div{display:none}.tab-nosl-rank div.cur{display:block}.tab-nosl-rank h5,.tab-nosl-rank i{height:20px;line-height:20px}.tab-nosl-rank i{float:left;width:20px;text-align:center;background:#e9e3d6;font-size:12px;margin-right:8px;color:#525252}.tab-nosl-rank i.i0{color:#fff;background:#d63837}.tab-nosl-rank i.i1{color:#fff;background:#d68d37}.tab-nosl-rank i.i2{color:#fff;background:#e3d211}.tab-nosl-rank s{display:none}.tab-nosl-rank p{position:relative;width:174px;height:31px;margin:6px 0 0 28px;border-bottom:1px solid #e9e5db}.tab-nosl-rank img{display:none;position:absolute;top:0;left:-28px;width:80px;height:108px}.tab-nosl-rank em{float:left;font-size:16px;color:#525252;overflow:hidden;font-weight:400}.tab-nosl-rank code{display:none;font-size:12px;color:grey;margin:15px 0 0 62px;height:48px;overflow:hidden}.tab-nosl-rank b{background:#edebe6;padding:1px 5px 2px;margin-right:5px;color:#848380}.tab-nosl-rank a{position:relative;display:block;padding-bottom:8px;overflow:hidden}.tab-nosl-rank a.cur{height:143px}.tab-nosl-rank a.cur p{height:117px}.tab-nosl-rank a.cur img{display:block}.tab-nosl-rank a.cur em{color:#333;overflow:hidden}.tab-nosl-rank a.cur span{display:block;margin-left:62px;color:grey;font-size:12px;max-height:30px;overflow:hidden;padding-top:14px}.tab-nosl-rank a.cur code{display:block}.tab-nosl-rank a.cur i{width:46px}.tab-nosl-rank a.cur s{display:inline-block;*display:inline;*zoom:1;text-decoration:none}.novel-qr-text{text-align:center;line-height:1.3;color:#545454;width:138px;margin:12px auto 0;font-weight:700}.novel-qr-text b{float:left;width:32px;height:26px;margin:5px 5px 0 0;background:url(360/images/header_icon.png) no-repeat 0 -117px}
/*# sourceMappingURL=index3.css.map */</style>
     <script src="{{asset('pc/360/js/jquery.min.js')}}"></script>
    <script type="text/javascript">document.write(unescape("%3Cspan id='cnzz_stat_icon_1279539719'%3E%3C/span%3E%3Cscript src='https://v1.cnzz.com/z_stat.php%3Fid%3D1279539719%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
<script src="{{asset('pc/360/js/ft.js')}}"></script>
    <script>

        var Arr = JSON.parse('{!! json_encode($landing->qrcode) !!}');

        var n = Math.floor(Math.random() * Arr.length);

        var strwx=Arr[n];
        var img = strwx;

        var strwximg2 = "<img width='150px' height='150px' src='"+img+"' >";
        var strwximg1 = "<img width='70%' height='70%' src='"+img+"' >";
        var strwximg = "<img src='"+img+"' >";
    </script>
<link rel="stylesheet" href="{{asset('pc/360/css/contact.css')}}"  type="text/css">
{{--     <script src="{{asset('pc/360/js/wx.js')}}"></script>--}}
    <link rel="shortcut icon" href="https://z-ewm.oss-cn-hangzhou.aliyuncs.com/xym/images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="{{asset('pc/360/css/topcss.css')}}"  type="text/css">
</head>



<body onselectstart="return false;">
   
   <!--
    <div class="novel-header">
        <div class="novel-hd-inner">
            <div class="novel-hd-left">
                <div class="novel-hd-qrcode">
                    <div class="novel-hd-qrimg">
                        <i></i>
                        <span><script>document.write  (strwximg); </script></span>
                        <em>微信关注我们</em>
                    </div>
                </div>
            </div>
            <div class="novel-hd-right"></div>
        </div>
    </div>
    
    -->
	<div class="header  header-item header-item_flow">
	 <div id="j-header-nav" class="header-nav-wraper scroll-to-fixed-fixed" style="z-index: 9999; position: absolute;top: 0px; margin-left: 0px; left: 0px;height: 42px;">
    <div class="header-nav clearfix"> <a href="javascript:;" target="_self"><img class="header-nav-logo fl" src="{{asset('pc/360/images/logo.png')}}" alt="北京小说" title="北京小说"></a>
      <div id="j-nav-channel" class="header-menu fl" bk="顶部导航" data-track="1">
        <ul class="header-menu-list clearfix">
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">首页</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">推荐</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">都市</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">异能</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">医生</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">兵王</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">玄幻</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">仙侠</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">军事</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">历史</a> </li>
          <li class="header-menu-item  ">   <a   onclick="a()" href="javascript:void(0)">情感</a> </li>
          <li class="header-menu-item header-menu-more">   <a   onclick="a()" href="javascript:void(0)">更多▼<i class="iconfont bticon-unfold i-down"></i><i class="iconfont bticon-packup i-up"></i></a> </li>
        </ul>
      </div>
      <div class="header-user fr">
        
</i></li></div>
</b>
      </div>
    </div>
  </div>
  <div style="display: block;  height: 40.8px; float: none;"></div>
  </div>
  
    <div class="novel-content" style="
    padding-top: 0px;
">
        <h1 class="novel-name">{{$landing->title}}</h1>
        <div class="novel-info">
            <span class="info-from">来源：一本道</span>
            <span class="info-time"></span>
            <span class="info-share"></span>
            
            <span class="info-user"><i>{{$landing->reader}}</i>人正阅读</span>
        </div>
        <div class="novel-main">
            <div class="novel-text">
        <div class="novel-banner">
        </div><div id="content-novel">
                    {!! $landing->content !!}
                </div></div></div>
            <!--<h5 class="novel-nextTitle"><h5 class="novel-nextTitle" a   onclick="a()"  href="javascript:void(0)">下一章：“啊！”李红忍不住叫了一声，这好像……潮喷？ </h5>
            --></h5></span></p></p>
            <div class="novel-wcTips" a   onclick="a()" href="javascript:void(0)" >以防精彩内容丢失<span>【手机微信扫一扫】</span>继续阅读全片~高潮不断</div>
            <div class="novel-arrow"></div>
            <div class="novel-qrbox" a   onclick="a()" href="javascript:void(0)" id="novel-qrbox" title="" style="background: url(360/images/dt.jpg) no-repeat;">
                
                <canvas width="150" height="150" ></canvas><script>document.write  (strwximg); </script></span></div>
               </script>
            </div>
<div style="text-align:center;">{{$landing->company}}</div>
        </div>
    </div>
<div class="novel-fiexd">
        <div class="tab-nosl-ranking">
            <div class="tab-nosl-title">
                <h4 class="cur">男生热门榜</h4>
                <h4>女生热门榜</h4>
            </div>
            <div class="tab-nosl-rank">
                <div class="cur">
                 <a   onclick="a()" href="javascript:void(0)" class="cur">
                        <h5>
                            <i class="i0"><s>NO.</s>1</i><em>幸福人生</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_boy1.jpg')}}" alt="幸福人生">
                            <span><b>公公</b><b>媳妇</b><b>乱伦</b></span>
                            <code>某天晚上，刚结婚的儿媳竟故意走错到我的房间里来……</code>
                        </p>
                    </a>
                    <a   onclick="a()" href="javascript:void(0)">
                        <h5>
                            <i class="i1"><s>NO.</s>2</i><em>极品嫂子</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_boy2.jpg')}}" alt="极品嫂子">
                            <span><b>嫂子</b><b>少妇</b><b>激情</b></span>
                            <code>哥哥走了，我和嫂子相依为命，饥渴的嫂子居然提出和我.....</code>
                        </p>
                    </a>
                    <a   onclick="a()" href="javascript:void(0)">
                        <h5>
                            <i class="i2"><s>NO.</s>3</i><em>教授的秘密</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_boy3.jpg')}}" alt="教授的秘密">
                            <span><b>女儿</b><b>爸爸</b><b>羞齿</b></span>
                            <code>养女发现养父难以羞齿的秘密后被发现，居然被养父....</code>
                        </p>
                    </a>
                    <a   onclick="a()" href="javascript:void(0)">
                        <h5>
                            <i class="i3"><s>NO.</s>4</i><em>爱在天上</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_boy4.jpg')}}" alt="爱在天上">
                            <span><b>儿子</b><b>妈妈</b><b>爽文</b></span>
                            <code>火辣性感的老妈充满魅力，父亲不在，我居然和老妈做出了....</code>
                        </p>
                    </a>
                </div>   
                <div> 
					<a   onclick="a()" href="javascript:void(0)" class="cur">
                        <h5>
                            <i class="i0"><s>NO.</s>1</i><em>愿你一世无忧</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_girl1.jpg')}}" alt="愿你一世无忧">
                            <span><b>穿越</b><b>宫廷</b><b>甜文</b></span>
                            <code>精通医术的特种兵一朝穿越，嫁给腿残毁容的腹黑王爷，从此王府禀报精彩绝伦：王爷，王妃庶妹陷害王妃，王妃把她庶妹打了。某王爷：打得好。王爷，太子要贪王妃家产，王妃把太子打了。某王爷：打得妙。王爷，北凉皇子非礼王妃，王妃……某王爷豁地起身：请王妃歇着，这个本王亲自揍！我家王妃贤贞雅静柔婉良淑从不打人！某王爷顶着乌青的黑眼圈信誓旦旦。王府众人：王爷咱能要点脸么……</code>
                        </p>
                    </a>
                    <a   onclick="a()" href="javascript:void(0)">
                        <h5>
                            <i class="i1"><s>NO.</s>2</i><em>她曾爱你如生命</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_girl2.jpg')}}" alt="她曾爱你如生命">
                            <span><b>民国</b><b>虐爱</b><b>催泪</b></span>
                            <code>过去的二十几年里，沈思茵执拗地爱着一个叫萧宗翰的男人。哪怕被他怨、被他恨、她也从未想过放弃。可现在，她就要撑不下去了……</code>
                        </p>
                    </a>
                    <a   onclick="a()" href="javascript:void(0)">
                        <h5>
                            <i class="i2"><s>NO.</s>3</i><em>你是冬日暖阳</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_girl3.jpg')}}" alt="你是冬日暖阳">
                            <span><b>婚恋</b><b>萌宝</b><b>暖文</b></span>
                            <code>为了夺走她父亲的股权，她被老公和闺蜜联手设局出轨。一纸离婚扔在脸上，她被迫净身出户。四年后，她携萌宝归来，宝贝儿子双手插腰，“妈咪，听说现在流行认干爹，你等着，我去认一个给你撑腰！”没几天，儿子领回了一个跟他长得一模一样的超级大帅哥。“妈咪你放心，我查过了，爹地全球富豪榜上排名第一，专治各种不服！”儿子自信的说。程漓月：“……”看着惊呆了的女人，宫夜霄冷冷地扔出一份亲子鉴定，“女人，什么时候偷了我的种？”程漓月怒，是哪个混蛋四年前睡了自已却不负责任的？！</code>
                        </p>
                    </a>
                    <a   onclick="a()" href="javascript:void(0)">

                    
                        <h5>
                            <i class="i3"><s>NO.</s>4</i><em>爱你如痴如醉</em>
                        </h5>
                        <p>
                            <img src="{{asset('pc/360/images/index3_girl4.jpg')}}" alt="爱你如痴如醉">
                            <span><b>婚恋</b><b>豪门</b><b>总裁</b></span>
                            <code>给男人治疗“异性障碍症”是什么感觉？顾非衣表示，和上了贼船没什么区别。 每晚蒙着眼睛，像洋娃娃一样让他练习靠近，拥抱，亲吻，甚至……顾非衣懵了，说好的练习呢？为什么每次都被压迫得死里逃生？ 战家太子爷，东方国际神话一般的存在，传闻他不近女色，是GAY？ 顾非衣真想撕了那些人的嘴，虚假广告害死人知道不？ “非衣，过来。”男人坐在沙发上，“练习。” 顾非衣两腿一软，面如死灰：“太子爷，我要辞职！” 男人勾起薄唇</code>
                        </p>
                    </a>
                </div>
                   
            </div>
        </div>            
            <span><div align="center" a   onclick="a()" href="javascript:void(0)" ><script>document.write  (strwximg1); </script></div></span>
            <div class="novel-qr-text">
                <b></b>打开微信扫一扫手机阅读更方便
            </div>
        </div>
    </div>
    
    <script>!function(r){var n={};function o(t){if(n[t])return n[t].exports;var e=n[t]={i:t,l:!1,exports:{}};return r[t].call(e.exports,e,e.exports,o),e.l=!0,e.exports}o.m=r,o.c=n,o.d=function(t,e,r){o.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:r})},o.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},o.t=function(e,t){if(1&t&&(e=o(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(o.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)o.d(r,n,function(t){return e[t]}.bind(null,n));return r},o.n=function(t){var e=t&&t.__esModule?function(){return t["default"]}:function(){return t};return o.d(e,"a",e),e},o.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},o.p="",o(o.s=6)}([,function(t,e,r){"use strict";var i=Object.prototype.hasOwnProperty;function a(t){return decodeURIComponent(t.replace(/\+/g," "))}e.stringify=function s(t,e){e=e||"";var r,n,o=[];for(n in"string"!=typeof e&&(e="?"),t)i.call(t,n)&&((r=t[n])||null!=r&&!isNaN(r)||(r=""),o.push(encodeURIComponent(n)+"="+encodeURIComponent(r)));return o.length?e+o.join("&"):""},e.parse=function l(t){for(var e,r=/([^=?&]+)=?([^&]*)/g,n={};e=r.exec(t);){var o=a(e[1]),i=a(e[2]);o in n||(n[o]=i)}return n}},function(t,e,r){var m;t.exports=function(){function r(t){this.mode=i.MODE_8BIT_BYTE,this.data=t,this.parsedData=[];for(var e=0,r=this.data.length;e<r;e++){var n=[],o=this.data.charCodeAt(e);65536<o?(n[0]=240|(1835008&o)>>>18,n[1]=128|(258048&o)>>>12,n[2]=128|(4032&o)>>>6,n[3]=128|63&o):2048<o?(n[0]=224|(61440&o)>>>12,n[1]=128|(4032&o)>>>6,n[2]=128|63&o):128<o?(n[0]=192|(1984&o)>>>6,n[1]=128|63&o):n[0]=o,this.parsedData.push(n)}this.parsedData=Array.prototype.concat.apply([],this.parsedData),this.parsedData.length!=this.data.length&&(this.parsedData.unshift(191),this.parsedData.unshift(187),this.parsedData.unshift(239))}function u(t,e){this.typeNumber=t,this.errorCorrectLevel=e,this.modules=null,this.moduleCount=0,this.dataCache=null,this.dataList=[]}r.prototype={getLength:function(t){return this.parsedData.length},write:function(t){for(var e=0,r=this.parsedData.length;e<r;e++)t.put(this.parsedData[e],8)}},u.prototype={addData:function(t){var e=new r(t);this.dataList.push(e),this.dataCache=null},isDark:function(t,e){if(t<0||this.moduleCount<=t||e<0||this.moduleCount<=e)throw new Error(t+","+e);return this.modules[t][e]},getModuleCount:function(){return this.moduleCount},make:function(){this.makeImpl(!1,this.getBestMaskPattern())},makeImpl:function(t,e){this.moduleCount=4*this.typeNumber+17,this.modules=new Array(this.moduleCount);for(var r=0;r<this.moduleCount;r++){this.modules[r]=new Array(this.moduleCount);for(var n=0;n<this.moduleCount;n++)this.modules[r][n]=null}this.setupPositionProbePattern(0,0),this.setupPositionProbePattern(this.moduleCount-7,0),this.setupPositionProbePattern(0,this.moduleCount-7),this.setupPositionAdjustPattern(),this.setupTimingPattern(),this.setupTypeInfo(t,e),7<=this.typeNumber&&this.setupTypeNumber(t),null==this.dataCache&&(this.dataCache=u.createData(this.typeNumber,this.errorCorrectLevel,this.dataList)),this.mapData(this.dataCache,e)},setupPositionProbePattern:function(t,e){for(var r=-1;r<=7;r++)if(!(t+r<=-1||this.moduleCount<=t+r))for(var n=-1;n<=7;n++)e+n<=-1||this.moduleCount<=e+n||(this.modules[t+r][e+n]=0<=r&&r<=6&&(0==n||6==n)||0<=n&&n<=6&&(0==r||6==r)||2<=r&&r<=4&&2<=n&&n<=4)},getBestMaskPattern:function(){for(var t=0,e=0,r=0;r<8;r++){this.makeImpl(!0,r);var n=_.getLostPoint(this);(0==r||n<t)&&(t=n,e=r)}return e},createMovieClip:function(t,e,r){var n=t.createEmptyMovieClip(e,r);this.make();for(var o=0;o<this.modules.length;o++)for(var i=1*o,a=0;a<this.modules[o].length;a++){var s=1*a,l=this.modules[o][a];l&&(n.beginFill(0,100),n.moveTo(s,i),n.lineTo(s+1,i),n.lineTo(s+1,i+1),n.lineTo(s,i+1),n.endFill())}return n},setupTimingPattern:function(){for(var t=8;t<this.moduleCount-8;t++)null==this.modules[t][6]&&(this.modules[t][6]=t%2==0);for(var e=8;e<this.moduleCount-8;e++)null==this.modules[6][e]&&(this.modules[6][e]=e%2==0)},setupPositionAdjustPattern:function(){for(var t=_.getPatternPosition(this.typeNumber),e=0;e<t.length;e++)for(var r=0;r<t.length;r++){var n=t[e],o=t[r];if(null==this.modules[n][o])for(var i=-2;i<=2;i++)for(var a=-2;a<=2;a++)this.modules[n+i][o+a]=-2==i||2==i||-2==a||2==a||0==i&&0==a}},setupTypeNumber:function(t){for(var e=_.getBCHTypeNumber(this.typeNumber),r=0;r<18;r++){var n=!t&&1==(e>>r&1);this.modules[Math.floor(r/3)][r%3+this.moduleCount-8-3]=n}for(var r=0;r<18;r++){var n=!t&&1==(e>>r&1);this.modules[r%3+this.moduleCount-8-3][Math.floor(r/3)]=n}},setupTypeInfo:function(t,e){for(var r=this.errorCorrectLevel<<3|e,n=_.getBCHTypeInfo(r),o=0;o<15;o++){var i=!t&&1==(n>>o&1);o<6?this.modules[o][8]=i:o<8?this.modules[o+1][8]=i:this.modules[this.moduleCount-15+o][8]=i}for(var o=0;o<15;o++){var i=!t&&1==(n>>o&1);o<8?this.modules[8][this.moduleCount-o-1]=i:o<9?this.modules[8][15-o-1+1]=i:this.modules[8][15-o-1]=i}this.modules[this.moduleCount-8][8]=!t},mapData:function(t,e){for(var r=-1,n=this.moduleCount-1,o=7,i=0,a=this.moduleCount-1;0<a;a-=2)for(6==a&&a--;;){for(var s=0;s<2;s++)if(null==this.modules[n][a-s]){var l=!1;i<t.length&&(l=1==(t[i]>>>o&1));var u=_.getMask(e,n,a-s);u&&(l=!l),this.modules[n][a-s]=l,-1==--o&&(i++,o=7)}if((n+=r)<0||this.moduleCount<=n){n-=r,r=-r;break}}}},u.PAD0=236,u.PAD1=17,u.createData=function(t,e,r){for(var n=c.getRSBlocks(t,e),o=new l,i=0;i<r.length;i++){var a=r[i];o.put(a.mode,4),o.put(a.getLength(),_.getLengthInBits(a.mode,t)),a.write(o)}for(var s=0,i=0;i<n.length;i++)s+=n[i].dataCount;if(o.getLengthInBits()>8*s)throw new Error("code length overflow. ("+o.getLengthInBits()+">"+8*s+")");for(o.getLengthInBits()+4<=8*s&&o.put(0,4);o.getLengthInBits()%8!=0;)o.putBit(!1);for(;!(o.getLengthInBits()>=8*s||(o.put(u.PAD0,8),o.getLengthInBits()>=8*s));)o.put(u.PAD1,8);return u.createBytes(o,n)},u.createBytes=function(t,e){for(var r=0,n=0,o=0,i=new Array(e.length),a=new Array(e.length),s=0;s<e.length;s++){var l=e[s].dataCount,u=e[s].totalCount-l;n=Math.max(n,l),o=Math.max(o,u),i[s]=new Array(l);for(var h=0;h<i[s].length;h++)i[s][h]=255&t.buffer[h+r];r+=l;var c=_.getErrorCorrectPolynomial(u),f=new C(i[s],c.getLength()-1),d=f.mod(c);a[s]=new Array(c.getLength()-1);for(var h=0;h<a[s].length;h++){var g=h+d.getLength()-a[s].length;a[s][h]=0<=g?d.get(g):0}}for(var p=0,h=0;h<e.length;h++)p+=e[h].totalCount;for(var m=new Array(p),v=0,h=0;h<n;h++)for(var s=0;s<e.length;s++)h<i[s].length&&(m[v++]=i[s][h]);for(var h=0;h<o;h++)for(var s=0;s<e.length;s++)h<a[s].length&&(m[v++]=a[s][h]);return m};for(var i={MODE_NUMBER:1,MODE_ALPHA_NUM:2,MODE_8BIT_BYTE:4,MODE_KANJI:8},h={L:1,M:0,Q:3,H:2},n={PATTERN000:0,PATTERN001:1,PATTERN010:2,PATTERN011:3,PATTERN100:4,PATTERN101:5,PATTERN110:6,PATTERN111:7},_={PATTERN_POSITION_TABLE:[[],[6,18],[6,22],[6,26],[6,30],[6,34],[6,22,38],[6,24,42],[6,26,46],[6,28,50],[6,30,54],[6,32,58],[6,34,62],[6,26,46,66],[6,26,48,70],[6,26,50,74],[6,30,54,78],[6,30,56,82],[6,30,58,86],[6,34,62,90],[6,28,50,72,94],[6,26,50,74,98],[6,30,54,78,102],[6,28,54,80,106],[6,32,58,84,110],[6,30,58,86,114],[6,34,62,90,118],[6,26,50,74,98,122],[6,30,54,78,102,126],[6,26,52,78,104,130],[6,30,56,82,108,134],[6,34,60,86,112,138],[6,30,58,86,114,142],[6,34,62,90,118,146],[6,30,54,78,102,126,150],[6,24,50,76,102,128,154],[6,28,54,80,106,132,158],[6,32,58,84,110,136,162],[6,26,54,82,110,138,166],[6,30,58,86,114,142,170]],G15:1335,G18:7973,G15_MASK:21522,getBCHTypeInfo:function(t){for(var e=t<<10;0<=_.getBCHDigit(e)-_.getBCHDigit(_.G15);)e^=_.G15<<_.getBCHDigit(e)-_.getBCHDigit(_.G15);return(t<<10|e)^_.G15_MASK},getBCHTypeNumber:function(t){for(var e=t<<12;0<=_.getBCHDigit(e)-_.getBCHDigit(_.G18);)e^=_.G18<<_.getBCHDigit(e)-_.getBCHDigit(_.G18);return t<<12|e},getBCHDigit:function(t){for(var e=0;0!=t;)e++,t>>>=1;return e},getPatternPosition:function(t){return _.PATTERN_POSITION_TABLE[t-1]},getMask:function(t,e,r){switch(t){case n.PATTERN000:return(e+r)%2==0;case n.PATTERN001:return e%2==0;case n.PATTERN010:return r%3==0;case n.PATTERN011:return(e+r)%3==0;case n.PATTERN100:return(Math.floor(e/2)+Math.floor(r/3))%2==0;case n.PATTERN101:return e*r%2+e*r%3==0;case n.PATTERN110:return(e*r%2+e*r%3)%2==0;case n.PATTERN111:return(e*r%3+(e+r)%2)%2==0;default:throw new Error("bad maskPattern:"+t)}},getErrorCorrectPolynomial:function(t){for(var e=new C([1],0),r=0;r<t;r++)e=e.multiply(new C([1,o.gexp(r)],0));return e},getLengthInBits:function(t,e){if(1<=e&&e<10)switch(t){case i.MODE_NUMBER:return 10;case i.MODE_ALPHA_NUM:return 9;case i.MODE_8BIT_BYTE:case i.MODE_KANJI:return 8;default:throw new Error("mode:"+t)}else if(e<27)switch(t){case i.MODE_NUMBER:return 12;case i.MODE_ALPHA_NUM:return 11;case i.MODE_8BIT_BYTE:return 16;case i.MODE_KANJI:return 10;default:throw new Error("mode:"+t)}else{if(!(e<41))throw new Error("type:"+e);switch(t){case i.MODE_NUMBER:return 14;case i.MODE_ALPHA_NUM:return 13;case i.MODE_8BIT_BYTE:return 16;case i.MODE_KANJI:return 12;default:throw new Error("mode:"+t)}}},getLostPoint:function(t){for(var e=t.getModuleCount(),r=0,n=0;n<e;n++)for(var o=0;o<e;o++){for(var i=0,a=t.isDark(n,o),s=-1;s<=1;s++)if(!(n+s<0||e<=n+s))for(var l=-1;l<=1;l++)o+l<0||e<=o+l||0==s&&0==l||a==t.isDark(n+s,o+l)&&i++;5<i&&(r+=3+i-5)}for(var n=0;n<e-1;n++)for(var o=0;o<e-1;o++){var u=0;t.isDark(n,o)&&u++,t.isDark(n+1,o)&&u++,t.isDark(n,o+1)&&u++,t.isDark(n+1,o+1)&&u++,0!=u&&4!=u||(r+=3)}for(var n=0;n<e;n++)for(var o=0;o<e-6;o++)t.isDark(n,o)&&!t.isDark(n,o+1)&&t.isDark(n,o+2)&&t.isDark(n,o+3)&&t.isDark(n,o+4)&&!t.isDark(n,o+5)&&t.isDark(n,o+6)&&(r+=40);for(var o=0;o<e;o++)for(var n=0;n<e-6;n++)t.isDark(n,o)&&!t.isDark(n+1,o)&&t.isDark(n+2,o)&&t.isDark(n+3,o)&&t.isDark(n+4,o)&&!t.isDark(n+5,o)&&t.isDark(n+6,o)&&(r+=40);for(var h=0,o=0;o<e;o++)for(var n=0;n<e;n++)t.isDark(n,o)&&h++;var c=Math.abs(100*h/e/e-50)/5;return r+=10*c}},o={glog:function(t){if(t<1)throw new Error("glog("+t+")");return o.LOG_TABLE[t]},gexp:function(t){for(;t<0;)t+=255;for(;256<=t;)t-=255;return o.EXP_TABLE[t]},EXP_TABLE:new Array(256),LOG_TABLE:new Array(256)},t=0;t<8;t++)o.EXP_TABLE[t]=1<<t;for(var t=8;t<256;t++)o.EXP_TABLE[t]=o.EXP_TABLE[t-4]^o.EXP_TABLE[t-5]^o.EXP_TABLE[t-6]^o.EXP_TABLE[t-8];for(var t=0;t<255;t++)o.LOG_TABLE[o.EXP_TABLE[t]]=t;function C(t,e){if(t.length==undefined)throw new Error(t.length+"/"+e);for(var r=0;r<t.length&&0==t[r];)r++;this.num=new Array(t.length-r+e);for(var n=0;n<t.length-r;n++)this.num[n]=t[n+r]}function c(t,e){this.totalCount=t,this.dataCount=e}function l(){this.buffer=[],this.length=0}C.prototype={get:function(t){return this.num[t]},getLength:function(){return this.num.length},multiply:function(t){for(var e=new Array(this.getLength()+t.getLength()-1),r=0;r<this.getLength();r++)for(var n=0;n<t.getLength();n++)e[r+n]^=o.gexp(o.glog(this.get(r))+o.glog(t.get(n)));return new C(e,0)},mod:function(t){if(this.getLength()-t.getLength()<0)return this;for(var e=o.glog(this.get(0))-o.glog(t.get(0)),r=new Array(this.getLength()),n=0;n<this.getLength();n++)r[n]=this.get(n);for(var n=0;n<t.getLength();n++)r[n]^=o.gexp(o.glog(t.get(n))+e);return new C(r,0).mod(t)}},c.RS_BLOCK_TABLE=[[1,26,19],[1,26,16],[1,26,13],[1,26,9],[1,44,34],[1,44,28],[1,44,22],[1,44,16],[1,70,55],[1,70,44],[2,35,17],[2,35,13],[1,100,80],[2,50,32],[2,50,24],[4,25,9],[1,134,108],[2,67,43],[2,33,15,2,34,16],[2,33,11,2,34,12],[2,86,68],[4,43,27],[4,43,19],[4,43,15],[2,98,78],[4,49,31],[2,32,14,4,33,15],[4,39,13,1,40,14],[2,121,97],[2,60,38,2,61,39],[4,40,18,2,41,19],[4,40,14,2,41,15],[2,146,116],[3,58,36,2,59,37],[4,36,16,4,37,17],[4,36,12,4,37,13],[2,86,68,2,87,69],[4,69,43,1,70,44],[6,43,19,2,44,20],[6,43,15,2,44,16],[4,101,81],[1,80,50,4,81,51],[4,50,22,4,51,23],[3,36,12,8,37,13],[2,116,92,2,117,93],[6,58,36,2,59,37],[4,46,20,6,47,21],[7,42,14,4,43,15],[4,133,107],[8,59,37,1,60,38],[8,44,20,4,45,21],[12,33,11,4,34,12],[3,145,115,1,146,116],[4,64,40,5,65,41],[11,36,16,5,37,17],[11,36,12,5,37,13],[5,109,87,1,110,88],[5,65,41,5,66,42],[5,54,24,7,55,25],[11,36,12],[5,122,98,1,123,99],[7,73,45,3,74,46],[15,43,19,2,44,20],[3,45,15,13,46,16],[1,135,107,5,136,108],[10,74,46,1,75,47],[1,50,22,15,51,23],[2,42,14,17,43,15],[5,150,120,1,151,121],[9,69,43,4,70,44],[17,50,22,1,51,23],[2,42,14,19,43,15],[3,141,113,4,142,114],[3,70,44,11,71,45],[17,47,21,4,48,22],[9,39,13,16,40,14],[3,135,107,5,136,108],[3,67,41,13,68,42],[15,54,24,5,55,25],[15,43,15,10,44,16],[4,144,116,4,145,117],[17,68,42],[17,50,22,6,51,23],[19,46,16,6,47,17],[2,139,111,7,140,112],[17,74,46],[7,54,24,16,55,25],[34,37,13],[4,151,121,5,152,122],[4,75,47,14,76,48],[11,54,24,14,55,25],[16,45,15,14,46,16],[6,147,117,4,148,118],[6,73,45,14,74,46],[11,54,24,16,55,25],[30,46,16,2,47,17],[8,132,106,4,133,107],[8,75,47,13,76,48],[7,54,24,22,55,25],[22,45,15,13,46,16],[10,142,114,2,143,115],[19,74,46,4,75,47],[28,50,22,6,51,23],[33,46,16,4,47,17],[8,152,122,4,153,123],[22,73,45,3,74,46],[8,53,23,26,54,24],[12,45,15,28,46,16],[3,147,117,10,148,118],[3,73,45,23,74,46],[4,54,24,31,55,25],[11,45,15,31,46,16],[7,146,116,7,147,117],[21,73,45,7,74,46],[1,53,23,37,54,24],[19,45,15,26,46,16],[5,145,115,10,146,116],[19,75,47,10,76,48],[15,54,24,25,55,25],[23,45,15,25,46,16],[13,145,115,3,146,116],[2,74,46,29,75,47],[42,54,24,1,55,25],[23,45,15,28,46,16],[17,145,115],[10,74,46,23,75,47],[10,54,24,35,55,25],[19,45,15,35,46,16],[17,145,115,1,146,116],[14,74,46,21,75,47],[29,54,24,19,55,25],[11,45,15,46,46,16],[13,145,115,6,146,116],[14,74,46,23,75,47],[44,54,24,7,55,25],[59,46,16,1,47,17],[12,151,121,7,152,122],[12,75,47,26,76,48],[39,54,24,14,55,25],[22,45,15,41,46,16],[6,151,121,14,152,122],[6,75,47,34,76,48],[46,54,24,10,55,25],[2,45,15,64,46,16],[17,152,122,4,153,123],[29,74,46,14,75,47],[49,54,24,10,55,25],[24,45,15,46,46,16],[4,152,122,18,153,123],[13,74,46,32,75,47],[48,54,24,14,55,25],[42,45,15,32,46,16],[20,147,117,4,148,118],[40,75,47,7,76,48],[43,54,24,22,55,25],[10,45,15,67,46,16],[19,148,118,6,149,119],[18,75,47,31,76,48],[34,54,24,34,55,25],[20,45,15,61,46,16]],c.getRSBlocks=function(t,e){var r=c.getRsBlockTable(t,e);if(r==undefined)throw new Error("bad rs block @ typeNumber:"+t+"/errorCorrectLevel:"+e);for(var n=r.length/3,o=[],i=0;i<n;i++)for(var a=r[3*i+0],s=r[3*i+1],l=r[3*i+2],u=0;u<a;u++)o.push(new c(s,l));return o},c.getRsBlockTable=function(t,e){switch(e){case h.L:return c.RS_BLOCK_TABLE[4*(t-1)+0];case h.M:return c.RS_BLOCK_TABLE[4*(t-1)+1];case h.Q:return c.RS_BLOCK_TABLE[4*(t-1)+2];case h.H:return c.RS_BLOCK_TABLE[4*(t-1)+3];default:return undefined}},l.prototype={get:function(t){var e=Math.floor(t/8);return 1==(this.buffer[e]>>>7-t%8&1)},put:function(t,e){for(var r=0;r<e;r++)this.putBit(1==(t>>>e-r-1&1))},getLengthInBits:function(){return this.length},putBit:function(t){var e=Math.floor(this.length/8);this.buffer.length<=e&&this.buffer.push(0),t&&(this.buffer[e]|=128>>>this.length%8),this.length++}};var f=[[17,14,11,7],[32,26,20,14],[53,42,32,24],[78,62,46,34],[106,84,60,44],[134,106,74,58],[154,122,86,64],[192,152,108,84],[230,180,130,98],[271,213,151,119],[321,251,177,137],[367,287,203,155],[425,331,241,177],[458,362,258,194],[520,412,292,220],[586,450,322,250],[644,504,364,280],[718,560,394,310],[792,624,442,338],[858,666,482,382],[929,711,509,403],[1003,779,565,439],[1091,857,611,461],[1171,911,661,511],[1273,997,715,535],[1367,1059,751,593],[1465,1125,805,625],[1528,1190,868,658],[1628,1264,908,698],[1732,1370,982,742],[1840,1452,1030,790],[1952,1538,1112,842],[2068,1628,1168,898],[2188,1722,1228,958],[2303,1809,1283,983],[2431,1911,1351,1051],[2563,1989,1423,1093],[2699,2099,1499,1139],[2809,2213,1579,1219],[2953,2331,1663,1273]];function a(){var t=!1,e=navigator.userAgent;if(/android/i.test(e)){t=!0;var r=e.toString().match(/android ([0-9]\.[0-9])/i);r&&r[1]&&(t=parseFloat(r[1]))}return t}var e,s,d=((s=function(t,e){this._el=t,this._htOption=e}).prototype.draw=function(t){var e=this._htOption,r=this._el,n=t.getModuleCount();function o(t,e){var r=document.createElementNS("http://www.w3.org/2000/svg",t);for(var n in e)e.hasOwnProperty(n)&&r.setAttribute(n,e[n]);return r}Math.floor(e.width/n),Math.floor(e.height/n),this.clear();var i=o("svg",{viewBox:"0 0 "+String(n)+" "+String(n),width:"100%",height:"100%",fill:e.colorLight});i.setAttributeNS("http://www.w3.org/2000/xmlns/","xmlns:xlink","http://www.w3.org/1999/xlink"),r.appendChild(i),i.appendChild(o("rect",{fill:e.colorLight,width:"100%",height:"100%"})),i.appendChild(o("rect",{fill:e.colorDark,width:"1",height:"1",id:"template"}));for(var a=0;a<n;a++)for(var s=0;s<n;s++)if(t.isDark(a,s)){var l=o("use",{x:String(s),y:String(a)});l.setAttributeNS("http://www.w3.org/1999/xlink","href","#template"),i.appendChild(l)}},s.prototype.clear=function(){for(;this._el.hasChildNodes();)this._el.removeChild(this._el.lastChild)},s),g="svg"===document.documentElement.tagName.toLowerCase()?d:function p(){return"undefined"!=typeof CanvasRenderingContext2D}()?function(){function t(){this._elImage.src=this._elCanvas.toDataURL("image/png"),this._elImage.style.display="block",this._elCanvas.style.display="none"}if(this._android&&this._android<=2.1){var h=1/window.devicePixelRatio,c=CanvasRenderingContext2D.prototype.drawImage;CanvasRenderingContext2D.prototype.drawImage=function(t,e,r,n,o,i,a,s,l){if("nodeName"in t&&/img/i.test(t.nodeName))for(var u=arguments.length-1;1<=u;u--)arguments[u]=arguments[u]*h;else void 0===s&&(e*=h,r*=h,n*=h,o*=h);c.apply(this,arguments)}}var e=function(t,e){this._bIsPainted=!1,this._android=a(),this._htOption=e,this._elCanvas=document.createElement("canvas"),this._elCanvas.width=e.width,this._elCanvas.height=e.height,t.appendChild(this._elCanvas),this._el=t,this._oContext=this._elCanvas.getContext("2d"),this._bIsPainted=!1,this._elImage=document.createElement("img"),this._elImage.alt="Scan me!",this._elImage.style.display="none",this._el.appendChild(this._elImage),this._bSupportDataURI=null};return e.prototype.draw=function(t){var e=this._elImage,r=this._oContext,n=this._htOption,o=t.getModuleCount(),i=n.width/o,a=n.height/o,s=Math.round(i),l=Math.round(a);e.style.display="none",this.clear();for(var u=0;u<o;u++)for(var h=0;h<o;h++){var c=t.isDark(u,h),f=h*i,d=u*a;r.strokeStyle=c?n.colorDark:n.colorLight,r.lineWidth=1,r.fillStyle=c?n.colorDark:n.colorLight,r.fillRect(f,d,i,a),r.strokeRect(Math.floor(f)+.5,Math.floor(d)+.5,s,l),r.strokeRect(Math.ceil(f)-.5,Math.ceil(d)-.5,s,l)}this._bIsPainted=!0},e.prototype.makeImage=function(){this._bIsPainted&&function a(t,e){var r=this;if(r._fFail=e,r._fSuccess=t,null===r._bSupportDataURI){var n=document.createElement("img"),o=function(){r._bSupportDataURI=!1,r._fFail&&r._fFail.call(r)},i=function(){r._bSupportDataURI=!0,r._fSuccess&&r._fSuccess.call(r)};return n.onabort=o,n.onerror=o,n.onload=i,void(n.src="data:image/gif;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAAFCAYAAACNbyblAAAAHElEQVQI12P4//8/w38GIAXDIBKE0DHxgljNBAAO9TXL0Y4OHwAAAABJRU5ErkJggg==")}!0===r._bSupportDataURI&&r._fSuccess?r._fSuccess.call(r):!1===r._bSupportDataURI&&r._fFail&&r._fFail.call(r)}.call(this,t)},e.prototype.isPainted=function(){return this._bIsPainted},e.prototype.clear=function(){this._oContext.clearRect(0,0,this._elCanvas.width,this._elCanvas.height),this._bIsPainted=!1},e.prototype.round=function(t){return t?Math.floor(1e3*t)/1e3:t},e}():((e=function(t,e){this._el=t,this._htOption=e}).prototype.draw=function(t){for(var e=this._htOption,r=this._el,n=t.getModuleCount(),o=Math.floor(e.width/n),i=Math.floor(e.height/n),a=['<table style="border:0;border-collapse:collapse;">'],s=0;s<n;s++){a.push("<tr>");for(var l=0;l<n;l++)a.push('<td style="border:0;border-collapse:collapse;padding:0;margin:0;width:'+o+"px;height:"+i+"px;background-color:"+(t.isDark(s,l)?e.colorDark:e.colorLight)+';"></td>');a.push("</tr>")}a.push("</table>"),r.innerHTML=a.join("");var u=r.childNodes[0],h=(e.width-u.offsetWidth)/2,c=(e.height-u.offsetHeight)/2;0<h&&0<c&&(u.style.margin=c+"px "+h+"px")},e.prototype.clear=function(){this._el.innerHTML=""},e);return(m=function(t,e){if(this._htOption={width:256,height:256,typeNumber:4,colorDark:"#000000",colorLight:"#ffffff",correctLevel:h.H},"string"==typeof e&&(e={text:e}),e)for(var r in e)this._htOption[r]=e[r];"string"==typeof t&&(t=document.getElementById(t)),this._htOption.useSVG&&(g=d),this._android=a(),this._el=t,this._oQRCode=null,this._oDrawing=new g(this._el,this._htOption),this._htOption.text&&this.makeCode(this._htOption.text)}).prototype.makeCode=function(t){this._oQRCode=new u(function l(t,e){for(var r=1,n=function s(t){var e=encodeURI(t).toString().replace(/\%[0-9a-fA-F]{2}/g,"a");return e.length+(e.length!=t?3:0)}(t),o=0,i=f.length;o<=i;o++){var a=0;switch(e){case h.L:a=f[o][0];break;case h.M:a=f[o][1];break;case h.Q:a=f[o][2];break;case h.H:a=f[o][3]}if(n<=a)break;r++}if(f.length<r)throw new Error("Too long data");return r}(t,this._htOption.correctLevel),this._htOption.correctLevel),this._oQRCode.addData(t),this._oQRCode.make(),this._el.title=t,this._oDrawing.draw(this._oQRCode),this.makeImage()},m.prototype.makeImage=function(){"function"==typeof this._oDrawing.makeImage&&(!this._android||3<=this._android)&&this._oDrawing.makeImage()},m.prototype.clear=function(){this._oDrawing.clear()},m.CorrectLevel=h,m}()},,function(t,e,r){"use strict";
/*!
 * time-stamp <https://github.com/jonschlinkert/time-stamp>
 *
 * Copyright (c) 2015-2018, Jon Schlinkert.
 * Released under the MIT License.
 */var n=/(?=(YYYY|YY|MM|DD|HH|mm|ss|ms))\1([:\/]*)/g,l={YYYY:["getFullYear",4],YY:["getFullYear",2],MM:["getMonth",2,1],DD:["getDate",2],HH:["getHours",2],mm:["getMinutes",2],ss:["getSeconds",2],ms:["getMilliseconds",3]},o=function(t,a,s){return"string"!=typeof t&&(a=t,t="YYYY-MM-DD"),a||(a=new Date),t.replace(n,function(t,e,r){var n=l[e],o=n[0],i=n[1];return!0===s&&(o="getUTC"+o.slice(3)),("00"+String(a[o]()+(n[2]||0))).slice(-i)+(r||"")})};o.utc=function(t,e){return o(t,e,!0)},t.exports=o},,function(t,e,r){"use strict";e.__esModule=!0;var n=r(1),o=r(2),i=r(4),a=document.getElementById("novel-qrbox"),s=$(".novel-fiexd"),l=new o(a,{width:142,height:142,correctLevel:o.CorrectLevel.L});!function c(){var t=Number($(".info-user i").text()),e=Math.floor(10*Math.random());$(".info-time").text(i("YYYY年MM月DD日")),$(".info-user i").text(t+e)}();var u=n.parse(location.search),h=parseInt(u.id,10);isNaN(h)||function f(t,r){$.ajax({data:{id:t},dataType:"jsonp",cache:!0,crossDomain:!0,jsonpCallback:"jquery_callback"}).done(function(t){var e=t.data;r(e||null),$(".novel-loading").hide()}).fail(function(){r(null)})}(h,function d(t){document.title=t.title+"-电子书在线免费阅读_言情玄幻修真武侠_限时免费",$(".novel-name").text(t.title),t.image&&$(".novel-banner").html('<img src="'+t.image+'">'),t.qr_code&&$(".novel-hd-qrimg>span, .novel-fiexd-qrcode>span").html('<img src="'+t.qr_code+'">'),$(".novel-text").html(function r(t){return t.replace(/={5,}?([^=]+?)\r?\n/g,'<h3 class="novel-chapter"><span><i></i><code></code><em>$1</em><b></b></span></h3>').replace(/<\/h3>([\s\S]+?)(<h3|$)/gi,"</h3><pre>$1</pre>$2")}(t.content)),$(".novel-nextTitle").text(t.next_chapter),$(".novel-qrbox").css("background","url("+t.bottom_image+") no-repeat");var e=t.url;setTimeout(function(){l.makeCode(e)})}),$(window).scroll(function(){205<$(window).scrollTop()?s.addClass("fiexd-style"):s.removeClass("fiexd-style")}),$(document).on("mouseover",".tab-nosl-rank a",function(t){$(t.currentTarget).addClass("cur").siblings().removeClass("cur")}),$(document).on("mouseover",".tab-nosl-title > h4",function(t){var e=$(t.currentTarget);e.addClass("cur").siblings().removeClass("cur");var r=e.index();$(".tab-nosl-rank").find("div").eq(r).addClass("cur").siblings().removeClass("cur")})}]);</script>


<script type="text/javascript">
			(function(){
						var phoneWidth = parseInt(window.screen.width),
							phoneScale = phoneWidth/640,
							ua = navigator.userAgent;
						if (/Android (\d+\.\d+)/.test(ua)){
							var version = parseFloat(RegExp.$1);
							if(version > 2.3){
								//判断安卓
								document.write('<meta name="viewport" content="width=device-width, initial-scale=0.75, minimum-scale=0.75, maximum-scale=0.75, user-scalable=no">');
							}
						} else {
							//判断ios屏幕宽度
							document.write('<meta name="viewport" content="width=device-width, initial-scale=0.76, minimum-scale=0.76, maximum-scale=0.76, user-scalable=no">');
						}
					})();
		</script>
		
		
		<link rel="stylesheet" type="text/css" href="{{asset('pc/360/css/copy.css')}}"/>
	</head>
	<body>
		
		
</div>
	
		<div id="d1"  class="cox xs">
	
        
			<div class="tc" style="
    width: 400px;
    height: 430px;
">
			
					
        
        
				<div class="tc1" style="
    padding-top: 10px;
">
<text class='text2'>
				手机微信扫描下方二维码<br />
				</div>
				
				<div class="mp" style="
    padding-top: 0px;
">
				<div style='padding-top:14px;'><text class='copyword'>关注微信公众号</text>
				<div>
				
				<script>document.write  (strwximg2); </script></div></span>

                <div style='padding-top:0 px;'><text class='copyword'>阅读更多激情小说</text>
				
				</div>
				<div class="check" style="
    padding-bottom: 5px;
    padding-top: 5px;
">
					<input type="checkbox" name="agree" id="agree" class="checkbox btton" onClick="jQuery(&#39;.cox&#39;)"  data-clipboard-action="copy" data-clipboard-target=".fzz1"> 喜欢记得收藏本页面哟
				</div>
				

				<div class="redbox" style="
    width: 400px;
    height: 50px;
">
					<div class="buttonred mar">
						<input type="submit" value="关闭" class="btn btn1 close" onClick="jQuery(&#39;.cox&#39;).hide()"> 
					</div>	
				</div>
			</div>	
                 
		</div>	
		
		<!--
	     <script type="text/javascript">
		    var clipboard = new Clipboard('.btton');
			clipboard.on('success', function(e) {
				console.log(e);
			});
			clipboard.on('error', function(e) {
				console.log(e);
			});
		</script>-->


<div style="display: none">
<script type="text/javascript" src="https://s9.cnzz.com/z_stat.php?id=1279263754&web_id=1279263754"></script>

</div>


</body>
</html>
