@extends("layout.home")

@section("css")
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/footer_style.css")}}">
    <link rel="stylesheet" type="text/css" href="http://static.gongsibao.com/css/1497857645371/gsb.css">
    <link rel="stylesheet" type="text/css" href="http://static.gongsibao.com/css/1497857645371/gsb.css">
    <script src="http://static.gongsibao.com/lib/g.js" type="text/javascript"></script>
    <style>
    /*在线客服*/

    .consult {
        width: 100px;
        position: fixed;
        top: 170px;
        right: 0;
        z-index: 100;
        background-color: #fff;
    }

    .consult .tit {
        background-color: #e13e38;
        text-align: center;
        width: 100px;
        height: 60px;
        position: relative;
    }

    .consult .tit::before {
        content: '';
        display: block;
        width: 100%;
        height: 7px;
        position: absolute;
        bottom: -7px;
        left: 0;
        z-index: 1;
        background: url("/assets/img/consult_tit_bottom.png") no-repeat center;
    }

    .consult .tit .img {
        margin: 0 auto;
        width: 24px;
        height: 17px;
        padding: 12px 0 7px;
    }

    .consult .tit .img img {
        width: 100%;
        height: 100%;
    }

    .consult .tit h3 {
        color: #fff;
        font-size: 14px;
    }

    .consult li {
        height: 60px;
        line-height: 25px;
        font-size: 12px;
        color: #757575;
        -webkit-transition: all .3s;
        transition: all .3s;
        padding-left: 10px;
        padding-top: 20px;
    }

    .consult li.on {
        color: #e13e38;
        -webkit-transform: translate(2px, 0);
        transform: translate(2px, 0);
    }

    .consult li~li {
        border-top: 1px solid #ededed;
    }

    .consult li a {
        display: block;
        height: 100%;
        padding: 0 10px;
    }

    .consult li a img {
        vertical-align: middle;
    }

    .consult li a span {
        padding-right: 5px;
    }
</style>
@endsection
@section('js')
    <script src="http://static.gongsibao.com/lib/g.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://static.gongsibao.com/js/4279288306afb2d647e3/common.js"></script>
@endsection
@section("content")
<div class="container">
    {{--侧边栏列表--}}
    <div class="product-option mb20">
        <div>
            <span class="pull-left">服务产品：</span>
            <ul class="clearfix m0">
                @php
                    $menus = \App\Sidemenu::where('rank','=','1')->orderby('num','asc')->get();
                @endphp
                @foreach($menus as $menu)
                <li class="pull-left @if( ($p->rank==2 &&$menu->id == $p->preid) ||($p->rank==1 &&$menu->id == $p->id) )  select @endif">
                    <a href="{{url("list/$menu->id")}}" target="_self">{{$menu->name}}</a>
                </li>
                @endforeach
            </ul>

        </div>
        <div>
            @php
                $fmenu = \App\Sidemenu::find($p->preid);
                if($p->rank == 2){
                        $tmenus = \App\Sidemenu::where('rank','=',$p->rank)->where('preid','=',$p->preid)->orderby('num','asc')->get();
                }else if($p->rank == 1){
                        $tmenus = \App\Sidemenu::where('rank','=',2)->where('preid','=',$p->id)->orderby('num','asc')->get();
                }

                if($fmenu == null){
                        $fmenu = new  \App\Sidemenu();
                        $fmenu->name = $p->name;
                 }
                 @endphp
            <span class="pull-left">{{$fmenu->name}}：</span>
            <ul class="clearfix m0">
                @foreach($tmenus as $menu)
                    <li class="pull-left @if($menu->id == $p->id )  select @endif">
                        <a href="{{url("list/$menu->id")}}"  target="_self" >{{$menu->name}}</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
    {{--填充内容--}}
    <ul class="product-list row">
        @php
            $sum = 1;
            if($p->rank == 2){
               //找到二级标签下的所有对应的三级标签
                 $thirds = \App\Sidemenu::where('preid','=',$p->id)->orderby('num','asc')->get();

            }else{
                $seconds = \App\Sidemenu::where('preid','=',$p->id)->orderby('num','asc')->get();
                $sum = count($seconds);
                if ($sum>0){
                    $thirds = \App\Sidemenu::where('preid','=',$seconds->first()->id)->orderby('num','asc')->get();

                }
            }
        @endphp
        @if($sum>0)
            @foreach($thirds as $third)
                @php

                 $pages = \App\Menu::where('sideid','=',$third->id)->get();
                @endphp
                @foreach($pages as $page )
                <li class="col-xs-3 mb20">
                    <a href="{{$page->link}}"  title="{{$page->name}}" class="show">
                            <span class="show posr">
                                <i class="posa"></i>
                                <img src="{{asset("uploads/$page->image")}}" class="show">
                            </span>
                        <h4>{{$page->name}}</h4>
                    </a>
                </li>
                    @endforeach
            @endforeach
        @endif


</div>


<!-- 在线咨询 -->

{{--<aside class="consult">--}}
    {{--<div class="tit">--}}
        {{--<div class="img">--}}
            {{--<img src="{{asset("images/consult_tit.png")}}" alt="在线咨询">--}}
        {{--</div>--}}
        {{--<h3>在线咨询</h3>--}}
    {{--</div>--}}
    {{--<ul>--}}
        {{--<li>--}}
            {{--<p style="font-size: 12px;padding: 0px;margin-left: -15px;">{{$p->member}}</p>--}}
            {{--<p style="font-size: 12px;padding: 0px;margin-left: -15px;">{{$p->memberphone}}</p>--}}
        {{--</li>--}}

    {{--</ul>--}}

{{--</aside>--}}


@endsection
