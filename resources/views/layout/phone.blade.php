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
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no,email=no,adress=no">
    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Access-Control-Allow-Origin" content="#">
    <link rel="Shortcut Icon" href="{{asset("uploads/$webkey->logo")}}">
    @yield("key")
    <meta name="description" content="{{$webkey->des}}">
    <title>{{$webkey->title}}</title>
    @yield("css")
    @yield("js")
      <!-- UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <!-- QQ强制全屏 -->
    <meta name="x5-fullscreen" content="true">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no,email=no,adress=no">
    <meta name="applicable-device" content="mobile">
    <!-- UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <!-- QQ强制全屏 -->
    <meta name="x5-fullscreen" content="true">
    <style>

        .footer-banner ul li #footer-img-01 {
            background:url(phone/images/footer-banner-white-01.png) no-repeat;
            background-size: cover;
        }
        .footer-banner ul li #footer-img-02 {
            background:url(phone/images/footer-banner-white-02.png) no-repeat;
            background-size: cover;
        }

        .footer-banner ul li #footer-img-03 {
            background:url(phone/images/footer-banner-white-03.png) no-repeat;
            background-size: cover;
        }

        .footer-banner ul li #footer-img-04 {
            background:url(phone/images/footer-banner-white-04.png) no-repeat;
            background-size: contain;
        }
        .footer-banner ul li .footer-img{
            margin-left: 24%;
        }
        .footer-banner ul li #footer-img-05{
            background: rgb(0, 213, 255) url(phone/Public/Mobile/img/red/index/tel.gif) no-repeat;
            background-size: contain;
            border-radius: 50%;
            height: 55px;
            width: 55px;
            margin-left: 2px;
            margin-top: -16px;
        }
        .logo{
            background-color: white;
        }
        .header-left{
            background: url(phone/images/header_4s.png) no-repeat center;
            background-size: cover;
        }
    </style>
</head>
@yield("content")

<!--底部-->
<div class="bottom_space" style="
         bottom: 0;">
    <!--<div class="type">
                <a target="_blank" href="/mstatics/H5dbcd/4744.jhtml">
        <span class="fl">客户端</span></a>
        <i class="fl">|</i>
        <a target="_blank" href="/mstatics/H5dbcd/4745.jhtml"><span class="fl select">触屏版</span></a>
        <i class="fl">|</i>
        <a target="_blank" href="/mstatics/H5dbcd/4746.jhtml"><span class="fl">电脑版</span></a>
        <div class="clearfix"></div>
    </div>-->
    {{--<div id="tel">联系电话: 400-628-2203</div>--}}
    <div class="Copyright_information" style="height: 50px;">
        <div style="font-size: 0.24rem;
    text-align: center;    color: #5A737E;">联系电话: 400-628-2203</div>
        <p>{{$webkey->allright}}&nbsp;&nbsp;&nbsp;技术支持：<a href="https://www.mengyakeji.com/">萌芽科技</a></p>

        <!--<script>-->
        <!--document.write(window.location.href);-->
        <!--</script>-->
    </div>
</div>

<!--底部导航-->
<div class="footer-banner">
    <ul>
        <a target="_top" href="{{url("/")}}">
            <li class="fl">
                <div class="footer-img" id="footer-img-01"></div>
                <div class="h6" href="">首页</div>
            </li>
        </a>
        <a target="_top" href="{{url("/catlist/-1")}}" >
            <li class="fl">
                <div class="footer-img" id="footer-img-02"></div>
                <div class="h6">分类</div>
            </li>
        </a>
        {{--<a target="_top" onclick="gotochat()">--}}
        <a target="_top" href="tel://400-628-2203">
            <li class="fl">
                <div class="footer-img" id="footer-img-05"></div>
                <div class="h6" href="">拨打电话</div>
            </li>
        </a>

        <a target="_top" href="{{url("phonenews")}}">
            <li class="fl">
                <div class="footer-img" id="footer-img-03"></div>
                <div class="h6">资讯</div>
            </li>
        </a>
        <a target="_blank"  onclick="gotochat()">
            <li class="fl">
                <div class="footer-img" id="footer-img-04"></div>
                <div class="h6">咨询</div>
            </li>
        </a>
        <div class="clear"></div>
    </ul>
    <script>
        function gotochat() {
            window.location="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2211894228%22%2C%22userId%22%3A%227727567%22%2C%22pageId%22%3A0%7D";
        }
    </script>
</div>
<!--底部导航点击事件-->
<script>
//    $(function () {
//        $("#footer-img-01").mouseenter(function () {
//            $(this).css("background", "url('images/首页.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-01 + div").css("color", "#E4C514");
//        }), $("#footer-img-01").mouseleave(function () {
//            $(this).css("background", "url('images/首页.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-01 + div").css("color", "#fff");
//        });
//        $("#footer-img-02").mouseenter(function () {
//            $(this).css("background", "url('images/footer-banner-active-02.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-02 + div").css("color", "#E4C514");
//        }), $("#footer-img-02").mouseleave(function () {
//            $(this).css("background", "url('images/footer-banner-white-02.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-02 + div").css("color", "#fff");
//        });
//        $("#footer-img-03").mouseenter(function () {
//            $(this).css("background", "url('images/footer-banner-active-03.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-03 + div").css("color", "#E4C514");
//        }), $("#footer-img-03").mouseleave(function () {
//            $(this).css("background", "url('images/footer-banner-white-03.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-03 + div").css("color", "#fff");
//        });
//        $("#footer-img-04").mouseenter(function () {
//            $(this).css("background", "url('images/footer-banner-active-04.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-04 + div").css("color", "#E4C514");
//        }), $("#footer-img-04").mouseleave(function () {
//            $(this).css("background", "url('images/footer-banner-white-04.png') no-repeat");
//            $(this).css("background-size", "contain");
//            $("#footer-img-04 + div").css("color", "#fff");
//        });
//    })

    //以下GA统计代码
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-94112410-1', 'auto');
    ga('send', 'pageview');
</script>
<script src="{{asset("phone/js/public_swipe.js")}}"></script>
<script src="{{asset("phone/js/index.js")}}"></script>
</body>
<!-- <script src="js/kefu.js"></script> -->
</html>
