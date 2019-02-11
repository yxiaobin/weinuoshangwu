@extends("layout.phone")
@section("key")
    @php
        $webkey = \App\Web::all();
        if(count($webkey)==0){
        $webkey = new \App\Web();
        }else{
        $webkey = $webkey->first();
        }
    @endphp
    <meta name="keywords" content="{{$webkey->keyword}}">
@endsection
@section("css")
    <link rel="stylesheet" href="{{asset("phone/css/new_public_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/new_top_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/bottom_style.css")}}">
    <script src="{{asset("phone/js/jquery-1.12.4.min.js")}}"></script>
    <script src="{{asset("phone/js/gsb.tools-1.0.T.js")}}"></script>
    <script src="{{asset("phone/js/jquery.mobile-1.3.2.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("phone/css/index_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/footer_banner_style.css")}}">
@endsection
@section("content")
<body data-role="none">
<!--公司宝-->
<script>
    function gotofun() {
        window.location= "{{url("/leftside")}}";
    }
</script>
<div class="logo">
    <ul>
        <li>
            <a href="javascript:void(0)" onclick="gotofun()">
            <div class="header-left" >
                </div>
            </a>
            {{--<a href="{{url('/')}}"><img src="{{asset("images/logo.jpg")}}" id="logo-gsb" alt="公司宝Logo图片" style="margin-left:-30px;height: 40px;margin-top: 4px;position: relative;left: 50%;"></a>--}}
            {{--<img src="images/logo-button.png" id="logo-button">--}}
            {{--<div class="login_button" id="login"></div>--}}
        </li>
    </ul>
</div>
<!--轮播-->
<script src="{{asset("phone/js/new_public.js")}}"></script>
<div class="banner">
    <ul>
        @foreach($ppts as $ppt)
        <li>
            <a target="_top" href="{{$ppt->href}}"><img src="{{asset("uploads/$ppt->image")}}" style="height: 160px;"></a>
        </li>
        @endforeach
        <div class="clearfix"></div>
    </ul>
    <div class="point_group">
        <div class="point select fl"></div>
        <div class="point fl mlr_10"></div>
        <div class="point fl mlr_10"></div>
        <div class="point fl mlr_10"></div>
        <div class="point fl mlr_10"></div>
    </div>
</div>

<!--导航-->
<div class="menus_x1">
    <ul>
        <a target="_top" href="{{url("catlist/5")}}">
            <li class="fl"><img src="{{asset('images/公告.png')}}">
                <div class="h6">企业登记</div>
            </li>
        </a>
        <a target="_top" href="{{url("catlist/18")}}">
            <li class="fl"><img src="{{asset('images/荣誉.png')}}">
                <div class="h6">金融公司</div>
            </li>
        </a>
        <a target="_top" href="{{url("catlist/25")}}">
            <li class="fl"><img src="{{asset('images/资质.png')}}">
                <div class="h6">资质审批</div>
            </li>
        </a>
        <a target="_top" href="{{url("catlist/29")}}">
            <li class="fl"><img src="{{asset('images/102.png')}}">
                <div class="h6">财会税务</div>
            </li>
        </a>
        <div class="clear"></div>
        <a target="_top" href="{{url("catlist/41")}}">
            <li class="fl"><img src="{{asset('images/零件.png')}}">
                <div class="h6">海外注册</div>
            </li>
        </a>
        <a target="_top" href="{{url("catlist/45")}}">
            <li class="fl"><img src="{{asset('images/111.png')}}">
                <div class="h6">人事代理</div>
            </li>
        </a>
        <a target="_top" href="{{url("catlist/50")}}">
            <li class="fl"><img src="{{asset('images/活动.png')}}">
                <div class="h6">增值业务</div>
            </li>
        </a>
        <a target="_top" href="{{url("catlist/-1")}}">
            <li class="fl"><img src="{{asset('images/8.png')}}">
                <div class="h6">全部分类</div>
            </li>
        </a>
    </ul>
    <div class="clear"></div>
</div>

<!--热门推荐-->
<div class="hot_space">
    <div class="title"><b>热门推荐</b></div>
    <ul>
        @foreach($rementuijians as $p)
        <li class="fl">
            <a href="{{$p->link}}" target="_top">
                {{--<img src="http://gsb-public.oss-cn-beijing.aliyuncs.com/cms/041ab61829224664f1b2e5a651ea6ea5.png"/>--}}
                <img src="{{asset("uploads/$p->image")}}" style="width: 180px;height: 100px;">
                <div class="li_title" style="text-align: center">{{$p->name}}</div>
                <div class="li_price">
                    <!-- <em><i>面议</i></em> -->
                </div>
            </a>
        </li>
        @endforeach
    </ul>
    <div class="clear"></div>
</div>
<!--累计服务-->
<div class="Cumulative_service" style="background: url(images/chuang3.jpg) no-repeat;height: auto;    background-size: cover;padding-bottom: 20px;">
    <div style="font-size: 0.3rem;    margin-left: 1.2rem;    line-height: .5rem;">
        业务范围覆盖上海16个区县 <br>  规模超过 <span style="color: red">50+</span>人的企业服务专家团队
    </div>
    <div class="title_1">累计为<span class="number">
          <div id="company_num">13000</div>
    <var class="posa"></var></span>家公司
    </div>
    <div class="title_2"><b>提供了优质的企业服务</b></div>
</div>


<!--行业资讯-->
<div class="Industry_information" id="">
    {{--<img src="{{asset("phone/images/Industry_information.png")}}" alt="" class="title">--}}
    <div class="title" style="position: relative;
    left: -0.8rem;
    margin: 0.18rem 0 0.18rem 50%;
    background: url(../images/icon11.png) no-repeat 0 0.05rem;
    background-size: 0.37rem 0.34rem;
    font-size: 0.3rem;
    color: #028eee;
    text-indent: 0.4rem;
    height: auto;"><b>新闻资讯</b></div>
    @php
        $num = count($news);
    if($num>4){
    $num = 4;
    }
    @endphp
    @for($i=0; $i<$num;$i++)
        @php
            $p = $news[$i];
        @endphp

        <div class="Industry_information-img">

            <img src="{{asset("uploads/$p->image")}}" onclick="gotonew({{$p->id}})">
        </div>
        <div class="Industry_information-content">
            <a target="_top" href="{{url("article/$p->id")}}" >
                {{$p->title}}
            {{--<span id="industry-desc"> {{str_limit( strip_tags($p->content), 40, '...')}}</span>--}}

            </a>
            {{--<a href="{{url("article/$p->id")}}">--}}
            <span id="industry-desc" style="text-overflow: -o-ellipsis-lastline;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">{{strip_tags($p->abstract)}}</span>
                {{--<span id="industry-desc">{{strip_tags($p->abstract)}}</span>--}}
            {{--</a>--}}
        </div>

    @endfor
    <script>
        function gotonew(date) {
            var url = "http://wn.budgroup.cn"
            var  str = "/article/" + date;
            str  = url + str;
            window.location= str;
        }
    </script>
    <div class="more_space">
        <div class="text_space fl">更多精彩行业资讯，创业更轻松</div>
        <a target="_top" href="{{url("/phonenews")}}"  class="fr">查看更多</a></div>
</div>

<!--客户声音-->
<div class="Customer_voice">
    <img src="{{asset("phone/images/Customer_voice.jpg")}}" alt="">
    <div class="Mask"></div>
    <div class="content">
        <ul>
            @foreach($members  as $p)
            <li class="fl">
                <img src="{{asset("uploads/$p->image")}}" alt="">
                <div class="fl">
                    <div class="h6"><b>{{$p->company}}</b></div>
                    <div class="name">{{$p->job}}<i>|</i>{{$p->name}}</div>
                    <div class="Explain">{{$p->motto}}
                    </div>
                </div>
            </li>
           @endforeach
        </ul>
        <div class="point_group">
            <div class="point select fl"></div>
            <div class="point fl mlr_10"></div>
            <div class="point fl mlr_10"></div>
            <div class="point fl mlr_10"></div>
            <div class="point fl mlr_10"></div>
        </div>
    </div>
</div>
<!--合作伙伴-->
<div class="Cooperative_partner" style="padding-bottom: 20px">
    {{--<img src="{{asset("phone/images/Cooperative_partner.png")}}" alt="" class="title">--}}
    <div class="title" style="position: relative;
    left: -0.8rem;
    margin: 0.18rem 0 0.18rem 50%;
    background: url(../images/icon22.png) no-repeat 0 0.05rem;
    background-size: 0.37rem 0.35rem;
    font-size: 0.3rem;
    color: #028eee;
    text-indent: 0.4rem;
    height: auto;"><b>合作伙伴</b></div>
    <ul>
        @foreach($hezuohuobans as $p)
        <li class="fl">
            <img src="{{asset("uploads/$p->image")}}" alt="">
        </li>
        @endforeach
    </ul>
</div>
@endsection