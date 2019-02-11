@extends("layout.phone")
@section("css")
    <link rel="stylesheet" href="{{asset("phone/css/new_public_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/new_top_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/bottom_style.css")}}">
    <script src="{{asset("phone/js/jquery-1.12.4.min.js")}}"></script>
    <script src="{{asset("phone/js/gsb.tools-1.0.T.js")}}"></script>
    <meta name="viewport" content="initial-scale=1, user-scalable=0, minimal-ui" charset="UTF-8">
    <!-- UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <!-- QQ强制全屏 -->
    <meta name="x5-fullscreen" content="true">
    <script src="{{asset("phone/js/jquery.mobile-1.3.2.min.js")}}"></script>
    <script src="{{asset("phone/js/idangerous.swiper.min.js")}}"></script>
    <link rel="stylesheet" href="{{asset("phone/css/index_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/hyzx_style.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/dropload.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("phone/css/footer_banner_style.css")}}">
    <style>
        .tabs span.active a{
            border-bottom: 2px solid #00D5FF;
        }
        .bottom_space{
            /*position: absolute;*/
            /*bottom: 0px;*/
            height: 70px;
            margin-top: -60px;
        }
        html, body{
            height: 100%;
        }
    </style>

@endsection
@section('js')
    <script type="text/javascript" language="javascript">
        function search() {
            $('form1').submit();
        }

        var path = ''
        $(function () {
            $.ajax({
                url: "http://www.gongsibao.com/gongsibao-web/jee/user/info",
                type: "get",
                dataType: "json",
                async: false,
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function (data) {
                    if (data.code == 200) {
                        var pk = data.data.mobilePhone;
                        if (pk != "" && pk != null) {
                            var html = '<a class="fr" href="JavaScript:logout();"> 注销</a><a class="fr" target="_top" href="/cmsapi/toGsbMemberCenter.api">' + pk + '</a>';
                            $("#login").html(html);
                            $("#login-button").css("display", "none");
                            $("#login").css("display", "none");
                        }
                    } else {
                        var html = '<a href="/cmsapi/gsbLogin.jspx?returnUrl=' + window.location.toString() + '" target="_top">登录 </a>';
                        $("#login").html(html);

                    }
                }
            });
        })

        function logout() {
            $.ajax({
                url: "http://www.gongsibao.com/gongsibao-web/web/account/accountloginout",
                xhrFields: {
                    withCredentials: true
                },
                crossDomain: true,
                success: function () {
                    location.href = "";
                }
            });
        }
    </script>

@endsection
@section("content")

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
                <a href="{{url('/')}}">
                    <img src="{{asset("images/logo.jpg")}}" id="logo-gsb" alt="公司宝Logo图片" style="margin-left:-30px;height: 40px;margin-top: 4px;position: relative;left: 50%;">
                </a>
            </li>
        </ul>
    </div>
    <script src="{{asset("phone/js/new_public.js")}}"></script>
    <!--资讯页导航图片-->
    {{--<div class="zx-banner" style="background: url('http://gsb-public.oss-cn-beijing.aliyuncs.com/cms/71dc740cbcb29acef6c1f088d9d0a767.png') no-repeat;background-size: 7.5rem 3.3rem;">--}}
    {{--</div>--}}

    <!--卡片面板切换-->
    <div class="pg-main" style="    min-height: 435px;
    padding-bottom: 60px;">
        <div id="wrapper">
            <div class="wrap">
                <div class="tabs">
                    @foreach($cat as  $p)
                    <span class="part"><a href="#" hidefocus="true">{{$p->name}}</a></span>
                    @endforeach
                </div>
                @php
                    $row = array("cyxt-slide","zcbb-slide","mbtt-slide");
                    $col = array("cyxt","zcbb","mbtt");
                    $i=0;
                @endphp
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($cat  as $p)
                        <div class="swiper-slide" id="{{$row[$i]}}">
                            <div class="content-slide" id="{{$col[$i]}}">
                                @php
                                    $i=$i+1;
                                @endphp
                                <!--创业学堂 [-->
                                <div class="Industry_information opacity" style="box-sizing: border-box;;padding-bottom: 25px;">
                                    @php
                                        $keys = \App\News::where("category_id",'=',$p->id)->orderby("id",'desc')->get();
                                    @endphp
                                    @foreach($keys  as  $key)

                                    <div class="Industry_information-img">
                                            <img src="{{asset("uploads/$key->image")}}" onclick="gotonew({{$key->id}})">
                                    </div>
                                        <div class="Industry_information-content">
                                            <a target="_top" href="{{url("article/$key->id")}}" >{{$key->title}}
                                                {{--<span>{{str_limit( strip_tags($key->abstract), 50, '...')}}</span>--}}
                                            </a>
                                            <span id="industry-desc" style="text-overflow: -o-ellipsis-lastline;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">{{strip_tags($key->abstract)}}</span>
                                        </div>
                                        <script>
                                            function gotonew(date) {
                                                var url = "http://wn.budgroup.cn"
                                                var  str = "/article/" + date;
                                                str  = url + str;
                                                window.location= str;
                                            }
                                        </script>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--卡片面板js-->
    <script src="{{asset("phone/js/hyzx_dropload.js")}}"></script>
    <script type="text/javascript">
        window.onload=function(){
            var height = $(window).height;
            document.getElementsByClassName('Industry_information').style.minHeight = height;
        }
        $(function () {
            var tabsSwiper;
            tabsSwiper = new Swiper('.swiper-container', {
                speed: 500,
                observer: true,
                observeParents: true,
                autoHeight: true, //高度随内容变化
                onSlideChangeStart: function () {
                    var H = $(".content-slide").eq(tabsSwiper.activeIndex).height() + 35;
                    $(".swiper-wrapper").css('height', H + 'px');
                    $(".swiper-container").css('height', H);
                    $(".tabs .active").removeClass('active');
                    $(".tabs span").eq(tabsSwiper.activeIndex).addClass('active');
                }
            });
            var flag02 = true;
            var flag03 = true;
            $(".tabs span").on('touchstart mousedown', function (e) {
                e.preventDefault()
                $(".tabs .active").removeClass('active');
                $(this).addClass('active');
                tabsSwiper.swipeTo($(this).index());
                if ($(this).text() == "知产播报") {
                    if (flag02) {
                        console.log(flag02)
                        zcbb();
                        flag02 = false;
                        console.log(flag02)
                    } else {
                        return;
                    }
                }
                if ($(this).text() == "蜜宝头条") {
                    if (flag03) {
                        mbtt();
                        flag03 = false;
                    } else {
                        return;
                    }
                }
            });
            $(".tabs span").click(function (e) {
                e.preventDefault();
            });
        });
    </script>
    <!--知产播报-->
    <script>
        function zcbb() {
            var fist = 5;
            var count = 5;
            $('#zcbb-slide').dropload({
                scrollArea: window,
                loadDownFn: function (me) {
                    $.ajax({
                        url: "/cmsapi/content/list.jspx",
                        dataType: 'json',
                        data: {
                            channelIds: 515,
                            channelOption: '1',
                            format: '0',
                            first: fist + '',
                            count: count + '',
                            orderBy: 4
                        },
                        async: false,
                        success: function (data) {
                            var html = '';
                            console.log(data.length)
                            if (data.length > 0) {
                                for (var i = 0; i <= data.length; i++) {
                                    var title = data[i].title;
                                    console.log(title);
                                    var url = data[i].url;
                                    var typeImg = data[i].typeImg;
                                    console.log(typeImg);
                                    var description = data[i].description;
                                    if(description.length>50) description=description.slice(0,49).concat("...");
                                    var mobileUrl = data[i].mobileUrl;
                                    if (description == undefined) description = ' ';
                                    html += '<div class="Industry_information opacity">';
                                    html += '<div class="Industry_information-img">';
                                    html += '<img src="' + typeImg + '"/>';
                                    html += '</div>';
                                    html += '<div class="Industry_information-content">';
                                    html += '<a target="_top" href="' + mobileUrl + '">' + title + '</a>';
                                    html += '<span>' + description + '</span>';
                                    html += '</div>';
                                    html += '</div>';
                                    if ((i + 1) >= data.length) {
                                        me.noData();
                                        break;
                                    }
                                }
                            } else {
                                me.noData();
                            }
                            setTimeout(function () {
                                fist = fist + count;
                                $("#zcbb").append(html);
                                $(".swiper-container").css("height", "auto");
                                me.resetload();
                            }, 1000);
                        }, error: function (xhr, type) {
                            me.resetload();
                            me.noData();
                        }
                    })
                }
            });
        }
    </script>
    <!--联系电话-->
    {{--<div id="tel">联系电话: 400-628-2203</div>--}}
    <!--置顶页面图标-->
    <!-- <a id="js-gototop" href="javascript:;">
    </a> -->
    <script src="{{asset("phone/js/public_swipe.js")}}"></script>
    <script src="{{asset("phone/js/index.js")}}"></script>
    <!--加载更多按钮js-->
    <!-- <script src="js/jquery-1.7.2.min.js"></script> -->
    <script src="{{asset("phone/js/dropload.js")}}"></script>
    <script src="{{asset("phone/js/jquery-1.7.2.min.js")}}"></script>
    <!--创业学堂-->
    <script>
        $(function () {
            var fist = 5;
            var count = 5;
            $('#cyxt-slide').dropload({
                scrollArea: window,
                loadDownFn: function (me) {
                    $.ajax({
                        url: "/cmsapi/content/list.jspx",
                        dataType: 'json',
                        data: {
                            channelIds: 514,
                            channelOption: '1',
                            format: '0',
                            first: fist + '',
                            count: count + '',
                            orderBy: 4
                        },
                        async: false,
                        success: function (data) {
                            var html = '';
                            if (data.length > 0) {
                                for (var i = 0; i <= data.length; i++) {
                                    console.log(data[i].title);
                                    var title = data[i].title;
                                    var url = data[i].url;
                                    var typeImg = data[i].typeImg;
                                    var description = data[i].description;
                                    var mobileUrl = data[i].mobileUrl;
                                    if (description == undefined) description = '';
                                    html += '<div class="Industry_information opacity">';
                                    html += '<div class="Industry_information-img">';
                                    html += '<img src="' + typeImg + '"/>';
                                    html += '</div>';
                                    html += '<div class="Industry_information-content">';
                                    html += '<a target="_top" href="' + mobileUrl + '">' + title + '</a>';
                                    html += '<span>' + description + '</span>';
                                    html += '</div>';
                                    html += '</div>';
                                    if ((i + 1) >= data.length) {
                                        me.lock();
                                        me.noData();
                                        break;
                                    }
                                }
                            } else {
                                me.noData();
                            }
                            setTimeout(function () {
                                fist = fist + count;
                                $("#cyxt").append(html);
                                $(".swiper-container").css("height", "auto");
                                me.resetload();
                            }, 1000);

                        }, error: function (xhr, type) {
                            me.resetload();
                        }
                    })
                }
            });

        })
    </script>
    <!--底部导航点击事件-->
    <script>
//        $(function () {
////            $("#footer-img-01").css("background", "url('images/footer-banner-active-01.png') no-repeat");
////            $("#footer-img-01").css("background-size", "contain");
////            $("#footer-img-01 + div").css("color", "#E4C514");
//            $("#footer-img-01").mouseenter(function () {
//                $(this).css("background", "url('images/footer-banner-active-01.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-01 + div").css("color", "#E4C514");
//            }), $("#footer-img-01").mouseleave(function () {
//                $(this).css("background", "url('images/footer-banner-white-01.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-01 + div").css("color", "#fff");
//            });
//            $("#footer-img-02").mouseenter(function () {
//                $(this).css("background", "url('images/footer-banner-active-02.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-02 + div").css("color", "#E4C514");
//            }), $("#footer-img-02").mouseleave(function () {
//                $(this).css("background", "url('images/footer-banner-white-02.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-02 + div").css("color", "#fff");
//            });
//            $("#footer-img-03").mouseenter(function () {
//                $(this).css("background", "url('images/footer-banner-active-03.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-03 + div").css("color", "#E4C514");
//            }), $("#footer-img-03").mouseleave(function () {
//                $(this).css("background", "url('images/footer-banner-white-03.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-03 + div").css("color", "#fff");
//            });
//            $("#footer-img-04").mouseenter(function () {
//                $(this).css("background", "url('images/footer-banner-active-04.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-04 + div").css("color", "#E4C514");
//            }), $("#footer-img-04").mouseleave(function () {
//                $(this).css("background", "url('images/footer-banner-white-04.png') no-repeat");
//                $(this).css("background-size", "contain");
//                $("#footer-img-04 + div").css("color", "#fff");
//            });
//        })
    </script>

@endsection
