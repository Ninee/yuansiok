<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$toutiao->title}}</title>
    <script src="{{asset('js/jquery-1.9.1.min.js')}}"> </script>
    <script src="{{asset('js/clipboard.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <style>
        .ct_body h4{ font-size:120%; text-align:center; margin:1.5em 0;}
        .ct_body p{ text-indent:2em; line-height:3em;}
    </style>
</head>
<body>


<div>
    {{--<div class="text-center">--}}
        {{--<img src="banner.jpg" class="img-fluid">--}}
    {{--</div>--}}
    <div id="content" class="ct_body"  style="padding:  1rem;">
        {!! $toutiao->content !!}
    </div>


</div>
<div class="bg-white text-center p-3">
    <img src="{{asset('pics/hand.gif')}}" class="img-fluid">
</div>
<div class="p-2 clearfix" style="background-color:rgb(168, 183, 176);">
    <div class="float-left"><img src="{{Storage::disk(config('admin.upload.disk'))->url($toutiao->avatar)}}" class="rounded-circle mr-1" width="40" height="40"><span style="font-size:130%;">{{$toutiao->name}}</span></div>
    <div class="float-right">
        <button type="button" class="btn btn-danger rounded-pill clickcopy" onclick="showModal()">+ 关注</button>
    </div>
</div>
<div class="p-3" style="font-size:18px;color:rgb(102, 102, 102);">
    <strong>
        按照以下步骤即可继续阅读：<br>
        1、点击右上方红色【<span class="text-danger">+关注</span>】按钮-点击【<span class="text-danger">确定</span>】后跳转到微信<br>
        2、打开微信-点击右上角【<span class="text-danger">+</span>】<br>
        3、点击【<span class="text-danger">添加朋友</span>】-选择【<span class="text-danger">公众号</span>】<br>
    </strong>
</div>

<div class="bg-light text-center mb-5">
    <img src="pics/remark.gif" class="img-fluid">
    <div class="p-3">
        {{$toutiao->company}}  </div>
</div>
<div class="fixed-bottom p-2 clearfix bg-light">
    <div class="float-left"><img src="{{Storage::disk(config('admin.upload.disk'))->url($toutiao->avatar)}}" class="rounded-circle mr-1" width="40" height="40"><span style="font-size:130%;">{{$toutiao->name}}</span></div>
    <div class="float-right">
        <button type="button" class="btn btn-danger rounded-pill clickcopy" onclick="showModal()">复制公众号</button>
    </div>
</div>
<div class="modal" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <p class="text-success text-center">公众号复制成功</p>
                    <div><strong>关注步骤:</strong></div>
                    <div>1.打开微信→右上角+号→添加朋友→公众号，<span style="color:red">即可继续阅读</span></div>
                    <div class="text-center py-2">
                        <button type="button" class="btn btn-success btn-lg" onclick="closeModal()">确定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop show"></div>
</body>
</html>

<script>




    $(document).ready(function() {
        var clipboard = new Clipboard('.clickcopy', {
            text: function() {
                var gzhrand='';
                //var rndCNStr = "⊙●○①⊕◎Θ⊙¤㊣★☆♀◆◇◣◢◥▲▼△▽⊿◤◥▂▃▄▅▆▇██■▓回□〓≡╝╚╔╗╬═╓╩┠┨┯┷┏┓┗┛┳⊥﹃﹄┌┐└┘∟「」↑↓→←↘↙♀♂ＡＢＣＤＥＦＧＨＩＪＫＬＭＮＯＰＱＲＳＴＵＶＷＸＹＺ";
                var rndCNStr = "囔囕囖囘囙囜囝圠圡圢圤圥壻壸壾壿夀夁夗夘夛夝夞夡夣夤夥夦妸奯奰奱奲孆孈孉孊孻孼孽孾寳寴寷獶獹獽獾獿猡玁玂玃牺犨犩犪犫爰爳爴爢爣爤爥爦爧爨爩灛灜灏灞灟灠灡灢湾滦灥灦灧灨灪氥氦氧氨氩氪氭氮氯氰氱氲毴毵毶毷毸毹毺毻毼毽毾毵氀氁氂氃氋氄氅氆氇毡氉氊氍氎榇櫭櫮櫯櫰櫱櫲栊櫴櫵櫶櫷榉櫹櫼櫽櫾櫿欀欁欂欃栏欅欆欇欈欉权欋欌欍欎椤欐欑栾欓欔欕榄欗欘欙欚欛欜欝棂欟曜曝曞曟旷曡曢曣曤曥曦曧昽曩曪曫晒曭曮曯旔旕旖旘旙旚旜旝旞旟攡攒挛攥攦攧攨攩搅攫攭攮";
                var rndENStr = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                var gzhrandtype=2;
                if(gzhrandtype==9){

                    gzhrandtype=randomNum(1,5);
                }
                console.log(gzhrandtype);
                switch(gzhrandtype){
                    case 0:
                        var gzhrand="";break;
                    case 1:
                        var gzhrand="   /"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndCNStr.charAt(Math.round(Math.random()*rndCNStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length));break;
                    case 2:
                        var gzhrand="/"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+"/"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length)); break;
                    case 3:
                        var gzhrand="   /"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+"/"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length)); break;
                    case 4:
                        var gzhrand="   /"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length));break;
                    case 5:
                        var gzhrand="   /"+rndENStr.charAt(Math.round(Math.random()*rndENStr.length))+rndENStr.charAt(Math.round(Math.random()*rndENStr.length));break;
                        break;
                }

                content = "{{$toutiao->mp_weixin}}" + gzhrand;
                var randomWord = '{{$toutiao->rand_suffix}}'.split(',');
                var index = Math.round(Math.random()*(randomWord.length - 1));
                return '{{$toutiao->mp_weixin}}' + randomWord[index];
            }
        });
    });
    function showModal(){
        //暂不用回传数据
        pusht();
        $(".modal-backdrop").show();
        $(".modal").show();
    }

    function closeModal(){
        $(".modal-backdrop").hide();
        $(".modal").hide();
        window.location.href = 'weixin://';
    }
    function randomNum(minNum,maxNum){
        switch(arguments.length){
            case 1:
                return parseInt(Math.random()*minNum+1,10);
                break;
            case 2:
                return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10);
                break;
            default:
                return 0;
                break;
        }
    }
    //头条埋点
    function pusht(){
        $.ajax({
            url: 'https://api.818tu.com/v1/marketing/track/toutiao?channel_uid={{$toutiao->channel_id}}',
            type: 'GET',
            dataType: 'jsonp',
            success: function(data) {
                console.log('toutiao success',data);
            },
        })
    }

</script>