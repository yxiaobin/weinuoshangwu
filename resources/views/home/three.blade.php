@extends("layout.home")
@section("key")
    <meta name="keywords" content="{{$page->member}}">
@endsection
@section("css")

    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("css/bootstrap-theme.min.css")}}" rel="stylesheet">
    <link href="{{asset("css/cssreset.css")}}" rel="stylesheet">
    <link href="{{asset("css/style3.css")}}" rel="stylesheet">
    <link href="{{asset("css/service.css")}}" rel="stylesheet">
    <link href="{{asset("css/special-Css.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("css/footer_style.css")}}">


    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, "STheiti", "Microsoft Yahei", "SimHei", Arial, Tahoma, sans-serif, serif !important;
        }
        .header {
            /*height: 70px;*/
            height: 55px!important;
            line-height: 0px!important;
        }
    </style>
    <script src="{{asset("js/html5shiv.min.js")}}"></script>
    <script src="{{asset("js/respond.min.js")}}"></script>
    <script src="{{asset("js/loginStatus.js?ver=201803281212")}}"></script>
    <script src="{{asset("js/jquery-1.11.2.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.min.js")}}"></script>
    <script src="{{asset("js/jquery.SuperSlide.2.1.1.js")}}"></script>
    <script src="{{asset("js/main.js")}}"></script>
@endsection

@section("content")

    <!--banner-->
    <div class="jumbotron_pc hidden-xs" style="background: url('{{asset("uploads/$page->image")}}') repeat fixed;">
        <div class="container">
            <div class="row b_box1PD">
                <div class="col-md-6 col-lg-6 col-sm-6 text-left">
                    <b>正规 | 专业 | 高效</b>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 text-right">
                    <span>指导单位：上海市工商行政管理局</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6 text-left">
                    <h1>{{$page->name}}</h1>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 text-right">
                    <p>咨询热线：{{$page->phone}}</p>
                </div>
            </div>
        </div>
    </div>

    <!--主体-->
    <div class="container" id="chemical_cont">
        <!--第一部分-->
        <div class="row g_line18">

            <!--主体内容-->
            <div class="row pub_line20">
                <div class="col-md-12 col-xs-12 pub_li2em m_pd20">
                    {{--{!! $page->content !!}--}}
                    {!!html_entity_decode($page->content)!!}

                </div>
            </div>
        </div>
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

    <!-- 在线咨询 -->

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
            {{--<li style="font-size: 11px;margin-bottom: 20px;">--}}
                {{--<p style="font-size: 12px;padding: 0px;margin-left: -15px;">{{$page->memberphone}}</p>--}}
                {{--<p style="font-size: 12px;padding: 0px;margin-left: -15px;">{{$page->phone}}</p>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</aside>--}}


@endsection