@php
$webkey = \App\Web::all();
if(count($webkey)==0){
    $webkey = new \App\Web();
}else{
$webkey = $webkey->first();
}
@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">
    <meta name="format-detection" content="telephone=no,email=no,adress=no">
    <meta name="applicable-device" content="pc">
    <link rel="Shortcut Icon" href="{{asset("uploads/$webkey->logo")}}">
    @yield("key")
    <meta name="description" content="{{$webkey->des}}">
    <meta http-equiv="Access-Control-Allow-Origin" content="*.gongsibao.com">
    <title>{{$webkey->title}}</title>
    @yield("css")
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer_style.css')}}" type="text/css">
    <style>
        .header h1 a,
        .header h1 img {
            display: block;

            /*width: auto!important;*/
            height: 103px;
            transform: scale(0.8);
            transform-origin: 0 0;
            margin-top: -19px;
            /*margin-top: -14px;*/
            margin-left: 25px;
        }
        .header {
            /*height: 70px;*/
            height: 55px!important;
            line-height: 0px!important;
        }
    </style>
    {{--<link rel="stylesheet" href="{{asset("css/style.css")}}">--}}
    {{--<link rel="stylesheet" href="{{asset("css/swiper.min.css")}}">--}}
    {{--<link rel="stylesheet" href="{{asset("css/footer_style.css")}}">--}}
    {{--<link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">--}}
    {{--<link href="{{asset("css/bootstrap-theme.min.css")}}" rel="stylesheet">--}}
    {{--<link href="{{asset("css/cssreset.css")}}" rel="stylesheet">--}}
    {{--<link href="{{asset("css/service.css")}}" rel="stylesheet">--}}
    {{--<link href="{{asset("css/special-Css.css")}}" rel="stylesheet">--}}
    {{--<script src="{{asset("js/jquery-1.12.4.min.js")}}"></script>--}}
    {{--<script src="{{asset("js/swiper-3.3.1.min.js")}}"></script>--}}
    {{--<script src="{{asset("js/common.js")}}"></script>--}}
    {{--<script src="{{asset("js/click_event.js")}}"></script>--}}
    @yield("js")
    {{--<style rel="stylesheet">--}}
        {{--#loginBtn,--}}
        {{--#registerBtn {--}}
            {{--cursor: pointer;--}}
            {{--display: inline-block;--}}
            {{--vertical-align: middle;--}}
        {{--}--}}
        {{--#loginBtn:hover,--}}
        {{--#registerBtn:hover {--}}
            {{--color: #26b8ef;--}}
        {{--}--}}
         {{--a{--}}
            {{--color: black;--}}
        {{--}--}}

    {{--</style>--}}
    <!--<script src="js/leftAd.js"></script>-->
</head>

<body style="overflow:hidden">
<div class="top" style="background: #ebebeb;
    color: #666666;
    font-size: 12px;
    height: 31px;
    line-height: 29px;" >
    <div class="content clearfix" >
        <div class="fl pl10">{{$webkey->biaoyu}}</div>
        <div class="fr pr20">
            <div class="after-landing posr" id="login_mobilephone"></div>
            <a href="{{url("list/4")}}">企业服务</a>
            {{--<em>|</em>--}}
            {{--<a href="{{url('/factory')}}">商业保理</a>--}}
        </div>
    </div>
</div>

<div class="clear"></div>
<script src="{{asset("js/loginStatus.js?ver=201803281212")}}"></script>

<div class="header mb20" style=" height: 55px!important;
            line-height: 0px!important;">
    <div class="content clearfix">
        <h1 class="fl  pl10" style="flex-direction: column;width: 120px ">
            {{--<div style="font-size: 12px;    margin-top: -25px;--}}
    {{--margin-left: 25px;">上海一站式服务平台</div>--}}
            <div>
                <a href="{{url('/')}}" title="logo">
                    {{--<img src="{{asset("images/logo.png")}}" alt="" style="display: inline-block;margin-top: -4px;--}}
    {{--margin-left: -66px;">--}}
                    <img src="{{asset("images/logo.jpg")}}" alt="logo" style="margin-left: -61px;display: inline-block;margin-top: 4px;width:300px;height: 90px;">
                </a>
            </div>
            {{--<div style="font-size: 12px;    margin-top: -60px;margin-left: 45px;">敬天爱人厚德</div>--}}
        </h1>
        @php
            //        获取顶部导航栏
            $topmunues = \App\Topmunue::orderby('num','asc')->get();
        @endphp
        <div class="fr tel pr20">{{$webkey->member}}</div>
        <div class="header-content">
            <div class="nav">
                @foreach($topmunues as $topmunue)
                <a href="{{$topmunue->link}}" id="index" style="color: black;">{{$topmunue->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@yield("content")

<!-- 页脚 -->
<div class="footer_space">
    <div class="content pb30">
        <div class="footer-nav pt30 clearfix">
            <ul class="col-xs-3">
                <li class="fl" style="width: 33%;padding: 0px">
                    <span class="pb10"></span>
                    <a href="http://wn.budgroup.cn/about" target="_blank">关于我们</a>
                    <a href="http://wn.budgroup.cn/contact" target="_blank">联系我们</a>
                    <a href="http://wn.budgroup.cn/articlelist/5" target="_blank">最新动态</a>
                </li>
                <li class="fl" style="width: 33%;padding: 0px"><span class="pb10">特色服务</span>
                    <a>一对一贴心服务</a>
                    <a>精英团队</a>
                </li>
                <li class="fl" style="width: 33%;padding: 0px"><span class="pb10">热门产品</span>
                    <a href="http://wn.budgroup.cn/investment">境外投资</a>
                    <a href="http://wn.budgroup.cn/financing">融资租赁</a>
                    <a href="http://wn.budgroup.cn/list/5">公司注册</a>
                    <a href="http://wn.budgroup.cn/gongsizhuxiao">注销公司</a>
                    <a href="http://wn.budgroup.cn/ckts">出口退税</a>
                </li>
            </ul>
            <div class="col-xs-5">
                <div class="contact-way pull-right">
                    <div class="clearfix pb15"><i class="fl mr10 c-icon1"></i><span class="fl italic" style="padding-bottom: 5px;">客服电话</span><em class="fl">400-628-2203</em></div>
                    <div class="clearfix pb15"><i class="fl mr15 c-icon4"></i><span class="fl italic" style="padding-bottom: 5px;">总经理邮箱</span><em class="fl">tomzhong@winnerchina.biz</em></div>
                    <div class="clearfix pb15 btm-zixun js-openchat2"><i class="fl mr10 c-icon2"></i><span class="fl italic" style="padding-bottom: 5px;">投诉建议</span><em class="fl">服务时段 8:45-5:15</em></div>
                    <div class="clearfix pb10"><i class="fl mr10 c-icon3"></i><span class="fl italic" style="padding-bottom: 5px;">商务合作</span><em class="fl">bensonzhong@winnerchina.biz</em></div>
                </div>
                <div class="" style="margin-left: 0px;">
                        <span class="fl" style="text-align: center;margin-right: 10px;">
                        <span>关注服务号</span>
                        <div class="codes"><img src="{{asset("uploads/$webkey->fuwu")}}" style="height: 121px;width: 121px;"></div>
                        </span>
                </div>
                <div class="" style="margin-left: 0px">
                       <span class="f1" >
                        <span style="padding-left: 26px;">关注订阅号</span>
                        <div class="codes"><img src="{{asset("uploads/$webkey->dingyue")}}" style="height: 121px;width: 121px;"></div>
                        </span>
                </div>

                {{--<div class="codes"></div></span>--}}
            </div>
            <div class="col-xs-4">
                {{--<img src="{{asset("images/logo.png")}}" style="position: absolute ;top: 50px;left: -40px;width: 483px">--}}
                <img src="{{asset("images/slogo.png")}}" width="400px" style="    width: 150px;
    margin-left: 140px;margin-top: 50px">
            </div>
        </div>
    </div>

    <!-- 页脚的友链 -->
    <div class="index-footer">
        <div class="content">
            <div class="friendly-link pb20">
                <h5>
                    <a style="font-weight:700">友情链接</a>
                </h5>
                @php
                    $yqljs = \App\Friend::where('status','=','1')->get();
                @endphp
                <p class="clearfix">
                    @foreach($yqljs as $p)
                        <a href="{{$p->link}}" rel="nofollow" title="" target="_blank" class="fl pr30">{{$p->name}}</a>
                    @endforeach
                </p>
            </div>
            <div class="footer-bq clearfix">
                    <span class="pl10">
                        <p style="display: inline-block">{{$webkey->allright}}</p>
                          技术支持：
                        <a href="https://www.mengyakeji.com/" style="width: auto;float: initial;margin: 0;background: none">萌芽科技</a>
                    </span>

            </div>
        </div>
    </div>
</div>

<!-- <script src="js/kefu.js"></script> -->
<script src="{{asset("js/index.js")}}"></script>
<script src="{{asset("js/assistant.js")}}"></script>
<script>
    $(function () {
        $("#index").addClass("select");
    })
</script>

{!! $webkey->shangqiao !!}
</body>

</html>