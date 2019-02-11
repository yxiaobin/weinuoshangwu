@extends("layout.home")
@section("key")
    <meta name="keywords" content="{{$page->member}}">
@endsection
@section("css")
    <script src="https://cdn.bootcss.com/html5shiv/r29/html5.js"></script>
    <script src="{{asset("/assets/plugins/jquery.js")}}"></script>
    <script src="{{asset("js/common.js")}}"></script>
    <link rel="stylesheet" href="{{asset("css/product.css")}}">
    <link rel="stylesheet" href="{{asset("css/page3.css")}}" />
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    {{--<link rel="stylesheet" href="{{asset("css/base.css")}}">--}}
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, "STheiti", "Microsoft Yahei", "SimHei", Arial, Tahoma, sans-serif, serif !important;
        }
        .header {
            /*height: 70px;*/
            height: 55px!important;
            line-height: 0px!important;
        }
        .mb20{
            height: 55px!important;
            line-height: 0px!important;
        }
    </style>
    <style>
        .typeLabel .val {
            width: 100%;
            height: 100%;
            padding: 8px 25px 8px 10px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .typeLabel .select-box {
            padding: 0;
        }

    </style>
    <style>
        .headSearch input {
            width: 416px;
            height: 32px;
            padding: 10px;
            font-size: 14px;
            box-sizing: border-box;
            vertical-align: middle;
        }
        .searchBtn {
            width: 64px;
            height: 32px;
            line-height: 32px;
            font-size: 14px;
            background: #c20600;
            box-sizing: border-box;
            text-align: center;
            color: white;
            margin-left: -4px;
            vertical-align: middle;
            border: none;
        }

    </style>
    <link rel="stylesheet" href="{{asset("css/footer_style.css")}}">

@endsection

@section("content")

<div class="topBanner" style="background:url('{{asset("uploads/$page->image")}}') no-repeat center ; width: 100%; height: 480px">
    <div class="bannerContent w" style="padding-top: 7%;">
        <h1 style=" font-size: 72px; color: #ffffff ;position: relative;
    left: 7%; ">{{$page->title}}</h1>
        <!--<span class="bannerSpan">公司注销难 只需两步就可化难为易：一流程问题梳理清楚 ，二在泓灼找资深人士指导。</span>-->
    </div>
</div>
<div class="wrap w" >
    <div class="registryDes" style="position: relative;
    left: 50%;
    margin-left: -599px;">
        {{--在这个div下填充内容--}}
        {!!html_entity_decode($page->content)!!}
    </div>


    <div class="center7">
        <h3>
            <span class="left_bg"></span>您可能还需要
            <span class="right_bg"></span>
        </h3>
        <ul class="center7_list1">
            <li style="border:none;width:auto;height:auto">
                <img src="{{asset("/uploads/images/7yV2sqgmEuDxhg044IU1P64Z7wJTqGZoytxh7qn6.jpeg")}}" style="width:175px;height:100px;position: initial;">
                <span style="margin-top:0px">商业保理公司注册</span>
                <a href="http://wn.budgroup.cn/factory" class="js-openchat">详情点击</a>
            </li>
            <li style="border:none;width:auto;height:auto">
                <img src="{{asset("/uploads/images/GCfY7x49cQdoPWDUE2kHNgOERFeSS56sFwxClERA.png")}}" style="width:175px;height:100px;position: initial;">
                <span style="margin-top:0px">融资租赁公司注册</span>
                <a href=" http://wn.budgroup.cn/financing">详情点击</a>
            </li>
            <li style="border:none;width:auto;height:auto">
                <img src="{{asset("/uploads/images/U4g7u3SHVLNa5mbyKXsHVQnDjsf5gPWZK9f4LtVz.png")}}" style="width:175px;height:100px;position: initial;">
                <span style="margin-top:0px">私募基金公司注册</span>
                <a href="http://wn.budgroup.cn/private">详情点击</a>
            </li>
            <li style="border:none;width:auto;height:auto">
                <img src="{{asset("/uploads/images/1zijSjIpVbxuprh49tje6O7UPuFcba6o1KUl0a2Y.png")}}" style="width:175px;height:100px;position: initial;">
                <span style="margin-top:0px">境外投资备案</span>
                <a href="http://wn.budgroup.cn/investment" class="js-openchat">详情点击</a>
            </li>
            <li style="border:none;width:auto;height:auto">
                <img src="{{asset("uploads/images/koeJOlUcFmvTvWRhBFufav2fTfLYyrYy17FlBkVY.png")}}" style="width:175px;height:100px;position: initial;">
                <span style="margin-top:0px">出口退税</span>
                <a href="http://wn.budgroup.cn/ckts" class="js-openchat">详情点击</a>
            </li>
            <li style="border:none;width:auto;height:auto">
                <img src="{{asset("uploads/images/LKys4LUArNo7Q4eIk3IUI5biLhGOaeaxuNJ13XIL.png")}}" style="width:175px;height:100px;position: initial;">
                <span style="margin-top:0px">注销公司</span>
                <a href="http://wn.budgroup.cn/gongsizhuxiao" class="js-openchat">详情点击</a>
            </li>
        </ul>
    </div>

</div>


@endsection
<!-- 在线咨询 -->
<!--在线客服-->
{{--<aside class="consult">--}}
    {{--<div class="tit">--}}
        {{--<div class="img">--}}
            {{--<img src="{{asset("images/consult_tit.png")}}" alt="在线咨询">--}}
        {{--</div>--}}
        {{--<a href="#">--}}
            {{--<h3>在线咨询</h3>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<ul>--}}
        {{--<li style="font-size: 11px;">--}}
            {{--<p style="font-size: 12px;padding: 0px;margin-left: -15px;">{{$page->memberphone}}</p>--}}
            {{--<p style="font-size: 12px;padding: 0px;margin-left: -15px;">{{$page->phone}}</p>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</aside>--}}


</footer>

@section("js")
<script type="text/javascript" src="{{asset("assets/plugins/superSlide/jquery.SuperSlide.2.1.1.js")}}"></script>
<script src="{{asset("js/evalStart.js")}}"></script>
<script src="{{asset("js/page.js")}}"></script>
@endsection