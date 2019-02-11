@extends("layout.phone")
@section("key")
    <meta name="keywords" content="{{$new->href}}">
@endsection
@section("css")
    <link rel="stylesheet" href="{{asset("phone/css/new_public_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/new_top_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/bottom_style.css")}}">
    <script src="{{asset("phone/js/jquery-1.12.4.min.js")}}"></script>
    <script src="{{asset("phone/js/gsb.tools-1.0.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("phone/css/index_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/hyzx_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/hyzx_style_details.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/footer_banner_style.css")}}">
    <style>
        .bottom_space{
            position: absolute;
            bottom: 0px;
        }
        .footer-banner ul li #footer-img-05{
            background: rgb(0, 213, 255) url(../images/tel.gif) no-repeat!important;
            background-size: contain!important;
        }
    </style>
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
                    <div class="header-left">
                    </div>
                </a>
                <a href="{{url('/')}}"><img src="{{asset("images/logo.jpg")}}" id="logo-gsb" alt="公司宝Logo图片" style="margin-left:-30px;height: 40px;margin-top: 4px;position: relative;left: 50%;"></a>
            </li>
        </ul>
    </div>
    <!--咨询详情页-->
    <div class="details-main">
        <div class="Industry_information">
            <div class="details-main-content">
                <span id="content-title">{{$new->title}} </span>
                <div class="line">
                    <a class="source">来源:巍诺商务服务</a>
                    <a class="time" style="position: relative;left: 65%;margin-left: 0px!important;">{{date("Y-m-d H:m:s",$new->time)}}</a>
                </div>
                <p style="color: #000">
                    {!! $new->content !!}
                </p>
            </div>
        </div>
    </div>

    <!--上一篇/下一篇-->
    @php
        $news = \App\News::where("category_id",'=',$new->category_id)->get();
        $index = 0;
        $num = count($news);
        for ($i=$num-1; $i>0; $i--){
            $key = $news[$i];
            if($key->id == $new->id){
                $index = $i;
                break;
            }
        }
    @endphp
    <div class="page">
        <div class="page_up">
            @if($index == $num-1)
                <a href="#">无</a>
            @else
                @php
                $key = $news[$index+1];
                @endphp
                <a href="{{url("article/$key->id")}}">上一篇</a>
            @endif
        </div>
        <div class="page_down">
            @if($index == 0)
                <a href="">无</a>
            @else
                @php
                    $key = $news[$index-1];
                @endphp
                <a href="{{url("article/$key->id")}}">下一篇</a>
            @endif
        </div>
    </div>
    <!--联系电话-->
    {{--<div id="tel">联系电话: 400-628-2203</div>--}}
    <!--置顶页面图标-->
    <a id="js-gototop" href="javascript:;"></a>

    @endsection

    @section("js")

        <script src="{{asset("phone/js/public_swipe.js")}}"></script>
        <script src="{{asset("phone/js/index.js")}}"></script>

        <script src="{{asset("phone/js/new_public.js")}}"></script>
@endsection

