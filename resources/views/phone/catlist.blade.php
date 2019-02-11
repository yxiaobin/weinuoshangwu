<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no,email=no,adress=no">
    <meta name="applicable-device" content="mobile">
    <title>巍诺服务有限公司</title>
    <link rel="stylesheet" type="text/css" href="http://static.gongsibao.com/h5css/1494835485266/gsb-mobile.css">
    <script src="http://static.gongsibao.com/lib/h5lib.js"></script>

</head>
<style>
    body{
        background-color: white!important;
    }
    body, html{
        height: 100%;
    }
</style>

<body>
<div id="header" class="header clearfix dit posr">
    <h1 class="dtc logo" style="height: 50px;">
        <a href="{{url('/')}}" class="db">
            <img src="{{asset("images/logo.jpg")}}" id="logo-gsb" alt="公司宝Logo图片" style="margin-top: -10px;position: relative;left: 50%;">
        </a>
    </h1>
    {{--<a id="noLogin" href="/log/login.html" class="top-login fr"></a>--}}
    {{--<span id="isLogin" class="top-pop fr hide"></span>--}}
    {{--<span id="isLoginList" class="top-pop select fr hide"></span>--}}
    {{--<a href="/my/order_list.html" class="top-list fr"></a>--}}
</div>
<div id="headerPop"
     class="header-login-pop posa">
    <div class="userinfo"><span class="tx db"><img id="userImg" src="http://gsb-public.oss-cn-beijing.aliyuncs.com/m/images/tx.jpg" class="db"></span><span id="userName" class="tel db tac">公司宝</span></div>
    <div class="header-link"><a href="/my/order_list.html" class="db clearfix"><i class="fl icon1"></i><span class="db">我的订单<i class="fr link"></i></span></a><a href="/log/set_new_password.html" class="db clearfix"><i class="fl icon2"></i><span class="db">修改密码<i class="fr link"></i></span></a></div>
    <span
            id="quit" class="db quit tac">退出</span>
</div>

<div id="con" style="min-height: 82%;padding-bottom: 70px;box-sizing: border-box;">
    <div id="indexArticle">
        <div id="indexArticleType" class="swiper-container index-tab">
            <ul class="articleTypeContainer swiper-wrapper">
                <li data-id="2016" data-name="productList" class="js-articleTypeItem articleTypeItem swiper-slide fl select"><a href="/product">服务列表</a></li>
            </ul>
        </div>
        <div id="indexArticleWrap" class="articleListContainer" style="min-height: 30.2rem;!important;">
            @foreach($ps as $p)
                @php
                    $key = \App\Menu::where("name",'=',$p->name)->get();
                    if(count($key)>=1){
                    $key = $key->first();
                    }else{
                    $key = new  \App\Menu();
                    }
                @endphp
                @if($key->link != null)
               <a href="{{$key->link}}" title="{{$key->name}}" class="clearfix db product-list">
                        {{--<img src="http://gsb-public.oss-cn-beijing.aliyuncs.com/dc234171849c36cf7d1264eac70b5447.jpg" class="fl">--}}
                        <img src="{{asset("uploads/$key->image")}}" class="fl">
                        <div class="articleList-right">
                            <h4 class="articleName texthide">{{$key->name}}</h4>
                            <p class="texthide">{{str_limit( strip_tags($key->content), 32, '...')}}</p>
                            <span></span>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div class="index-loading">
            <div id="noNext" class="noNext tac hide">没有更多了！</div>
            <div id="loading" class="loading tac hide">正在加载...</div>
        </div>
    </div>
</div>

<div class="product-tit-nav posf">
    <div class="js-product-nav swiper-container">
        <div class="swiper-wrapper">
            @php
                $i = 0;
            @endphp
            @foreach($sidmenus as  $p)
            <div data-nav-index="0" class="swiper-slide fl posr">
                <div data-open="0" class="js-product-title name">{{$p->name}}</div>
                <div class="js-product-body hide"><i class="posa jiao"></i>
                    <div class="product-nav-level2 posa">
                        @php
                            $r1 = \App\Sidemenu::where("rank","=","2")->where("preid","=",$p->id)->get();
                        @endphp
                        @foreach($r1  as  $r)
                        <a href="{{url("/catlist/$r->id")}}">{{$r->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="swiper-button-prev"><span></span></div>
        <div class="swiper-button-next"><span></span></div>
    </div>
</div>

<div class="product-make posf hide"></div>

<div class="index-footer product-footer" style="height: 70px;margin-top: -70px;">
    <div id="footer" class="footer">
        @php
            $webkey = \App\Web::all();
            if(count($webkey)==0){
            $webkey = new \App\Web();
            }else{
            $webkey = $webkey->first();
            }
        @endphp
        {{--<p class="tac footer-type"><a href="/d" class="dib">客户端</a><span state="mobile" class="dib">触屏版</span><span state="pc" class="dib">电脑版</span></p>--}}
        <div style="font-size: 10px;
    text-align: center;    color: #5A737E;">联系电话: 400-628-2203</div>
        <p class="tac footer-num" style="font-size: 12px;
    line-height: 17px;
    font-family: 微软雅黑;
    padding: 0px;">{{$webkey->allright}}&nbsp;&nbsp;&nbsp;技术支持：<a href="https://www.mengyakeji.com/">萌芽科技</a></p>
    </div>
</div>
<div class="gototop posf">
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o), m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-94112410-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
<script src="http://static.gongsibao.com/h5js/34680912c3bef67b1fda/index.js"></script>

</html>
