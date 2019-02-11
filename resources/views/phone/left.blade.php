@extends("layout.phone")
@section("css")
    <link rel="stylesheet" href="{{asset("phone/Public/Plugs/Font-Awesome-3.2.1/css/font-awesome.min.css")}}" />
    <link rel="stylesheet" href="{{asset("phone/Public/Mobile/css/common.css")}}" />
    <script src="{{asset("phone/Public/Plugs/jquery-2.1.4.js")}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset("phone/Public/Mobile/css/index.css")}}" />
    <script src="{{asset("phone/Public/Mobile/js/common.js")}}" type="text/javascript"></script>
    {{--<link rel="stylesheet" href="{{asset("phone/css/footer_banner_style.css")}}">--}}
    <style>
        .container .classify .content .tab-nav ul .active{
            color: rgb(0, 213, 255);
        }
    </style>
@endsection
@section('content')
    <!-- 头部导航 -->
    <div class="header-article-nav">
        <a href="javascript:history.go(-1)">
            <div class="header-back"><i class="icon icon-angle-left"></i></div>
        </a>
        <a style="background-color: rgb(0, 213, 255);">
            <div class="header-text">全部分类</div>
        </a>
    </div>
    <div class="container">
        <!-- 产品分类 -->
        <div class="classify header-top-space">
            <!-- 搜索 -->
            <div class="search">
                <div class="search-info">
                    <div class="row" onclick="location.href='search'">
                        <div class="c"><input type="text" readonly placeholder="找专业人做专业事"></div>
                        <div class="l"><i class="icon-search"></i></div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="tab-nav">
                    <ul>
                        {{--<li class="active" onclick="chooseKind(this,3)">为您推荐</li>--}}
                        @php
                        $i=4;
                        @endphp
                        @foreach($sidemenus as  $p)

                            <li @if($i==4)class="active"@else class="" @endif onclick="chooseKind(this,{{$i}})">{{$p->name}}</li>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </ul>
                </div>
                <div class="tab-menu">
                    @php
                        $i2=4;
                    @endphp
                    @foreach($sidemenus as  $p)
                        {{--寻找每一个的二级标签--}}
                        @php
                            $str = "mean-tree".$i2;
                            $i2++;
                        @endphp
                        <div class="{{$str}}" style='display:none'>
                            <div class="title-img">
                                <!--<img class="" src="/Public/Mobile/img/common/kind_banner.png" alt="">-->
                                {{--<img class="" src="{{asset("phone/Public/Mobile/img/common/kind_banner.png")}}" alt="">--}}
                            </div>
                            @php
                                $r2=\App\Sidemenu::where('preid','=',$p->id)->where('rank','=','2')->orderby('num','asc')->get();
                            @endphp
                            @foreach($r2 as  $r)
                                <div class="l-content">
                                    <div class="title"><span></span>&nbsp;&nbsp;{{$r->name}}&nbsp;&nbsp;<span></span></div>
                                    <div class="row">
                                        @php
                                            $r3=\App\Sidemenu::where('preid','=',$r->id)->where('rank','=','3')->orderby('num','asc')->get();
                                        @endphp
                                        @foreach($r3  as  $r4)
                                        <div class="one">
                                            <a onclick="location.href='{{url("catlist/$r->id")}}'" class="info">
                                                <p>{{$r4->name}}</p>
                                            </a>
                                        </div>
                                            @endforeach
                                    </div>
                                </div>
                            @endforeach
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>




    @section('js')
        <script>
            // 菜单选择
            window.onload=function(){
                $('.mean-tree4').show();
            }
            function chooseKind(obj, num) {
                $(obj).siblings().removeClass('active');
                $(obj).addClass('active');
                $('div[class^=mean-tree]').hide();
                $('.mean-tree' + num + '').show();
            }
            $(window).scroll(function() {
                /**
                 * 文章页固定咨询师的位置
                 * @author liuhaoyue
                 * @email 202683457@qq.com
                 * @campany QiYing
                 * @time 2018/3/28
                 * @type {*|jQuery|number}
                 */
                    // 超出盒子的距离+二级栏目导航条
                var outDiv = $(window).scrollTop() || 0;

                // 导航高度+banner高度
                var overHeight = 0;
                overHeight += $("header").height() || 0;
                var moveLength = outDiv - overHeight;
                if (moveLength > 0) {
                    $('.r-nav').attr('style', 'top:' + overHeight + 'px');

                } else if (moveLength < 0 && moveLength > -$(".search").outerHeight(true)) {
                    var showHeight = $(".search").outerHeight(true) - outDiv + $("header").height();
                    $('.r-nav').attr('style', 'top:' + showHeight + 'px');
                } else {
                    $('.r-nav').removeAttr('style');
                }
            });
        </script>
    @endsection

@endsection

