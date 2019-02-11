
@extends("layout.home")
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
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/footer_style.css")}}">
    <style rel="stylesheet">
        #loginBtn,
        #registerBtn {
            cursor: pointer;
            display: inline-block;
            vertical-align: middle;
        }

        #loginBtn:hover,
        #registerBtn:hover {
            color: #26b8ef;
        }
        body {
            font-family: "Helvetica Neue", Helvetica, "STheiti", "Microsoft Yahei", "SimHei", Arial, Tahoma, sans-serif, serif !important;
        }
    </style>
@endsection
@section("js")
    <script src="{{asset("js/jquery-1.12.4.min.js")}}"></script>
    <script src="{{asset("js/swiper-3.3.1.min.js")}}"></script>
    <script src="{{asset("js/common.js")}}"></script>
    <script src="{{asset("js/click_event.js")}}"></script>
    @endsection


@section("content")

<!-- 轮播图 -->
<div class="banner posr">

    <div id="banner" class="banner-swiper swiper-container">
        <div class="swiper-wrapper">
            @foreach($ppts as $ppt)
            <div class="swiper-slide">
                <a  href="{{$ppt->href}}" style="background:#081624 url({{asset("uploads/$ppt->image")}}) center center no-repeat;background-size:auto 100%;"></a>
            </div>
           @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!--侧边栏-->
    @php
        $f = 0;
    @endphp

    <div class="posa banner-nav">
        @foreach($sidemenus as $sidemenu)
            @php
                if($f == 0){
                    $ysy = 163;
                    $mu = "nav_right_".strval($ysy);
                    $mu1 = 'nav_left_'.strval($ysy);
                }else{
                     if($f ==1){
                        $ysy = 166;
                     }
                    $ysy++ ;
                    $mu = 'nav_right_'.strval($ysy);
                     $mu1 = 'nav_left_'.strval($ysy);
                }
                $f++;
            @endphp
        <script>var win = "979px";</script>
        <div class="nav-tit">
            <a href="#"  class="banner-nav-tit">{{$sidemenu->name}}</a>
            <div class="nav-body posa clearfix">
                <!-- 暂时占位-->
                <div id="{{$mu}}" class="fr" style="height: 449px;">
                    <script>document.getElementById("nav_right_" + "{{$ysy}}").style.width = "220px";
                        win = "759px";</script>
                    <div class="nav_img_list">
                        <a href="#" target="_blank">
                            <img src="{{asset("images/28134913c00j.jpg")}}"></a>
                    </div>
                    <script>document.getElementById("nav_right_" + "{{$ysy}}").style.width = "220px";
                        win = "759px";</script>
                    <div class="nav_img_list">
                        <a href="#" target="_blank">
                            <img src="{{asset("images/28134934rgmd.jpg")}}"></a>
                    </div>
                    <script>document.getElementById("nav_right_" + "{{$ysy}}").style.width = "220px";
                        win = "759px";</script>
                    <div class="nav_img_list">
                        <a href="#" target="_blank">
                            <img src="{{asset("images/28134949lfk8.jpg")}}"></a>
                    </div>
                </div>
                <div id="{{$mu1}}" class="fr">
                    <ul class="nav-list">
                        @php
                            $ch1s = \App\Sidemenu::where('preid','=',$sidemenu->id)->orderby('num','asc')->get();
                        @endphp
                        <li>
                            @foreach($ch1s as $ch1)
                            <a href="{{url("list/$ch1->id")}}" target="_blank" class="tit fl">{{$ch1->name}}</a>
                                @php
                                    $ch2s = \App\Sidemenu::where('preid','=',$ch1->id)->orderby('num','asc')->get();
                                @endphp
                            <div class="list">
                                @foreach($ch2s as $ch2)
                                    @php
                                    $key = \App\Menu::where('sideid','=',$ch2->id)->get();
                                    if(count($key)== 0){
                                        $key = new \App\Menu();
                                        $key->link = null;
                                    }else{
                                    $key = $key[0];
                                    }
                                    @endphp
                                <a href="{{$key->link}}" target="_blank">{{$ch2->name}}</a>
                                @endforeach
                            </div>
                             @endforeach
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <script>document.getElementById("nav_left_" + "{{$ysy}}").style.width = win;</script>
       @endforeach
</div>
</div>
<!-- 资助公司起名 -->
<div class="index-query content">
    <div class="index-query-tab">
        <input type="hidden" id="cs" value="/statics/zzgsqm/index.jhtml">
        <a onclick="select('/statics/zzgsqm/index.jhtml','serch_action_自助公司起名');" class="posr select" id="serch_action_自助公司起名">自助公司起名
            <span class="posa">自助公司起名</span>
        </a>
        <form action="/statics/zzgsqm/index.jhtml" name="form1" id="tab_serch_action_自助公司起名" target="_blank" class="show" onsubmit="return false">
            <div class="index-query-search clearfix">
                <input type="text" placeholder="请输入公司所在城市，如：上海" onkeypress="huiche_sub2('tab_serch_action_自助公司起名','industry_qiming_address','industry_qiming','organization',1)"
                       id="industry_qiming_address" onchange="check_word('industry_qiming_address')" class="fl txt_1" name="city"
                       onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''" onFocus="placeholder =''"
                       onBlur="placeholder='请输入公司所在城市，如：上海'">
                <input type="text" placeholder="请输入公司行业，如：科技" onkeypress="huiche_sub2('tab_serch_action_自助公司起名','industry_qiming_address','industry_qiming','organization',1)"
                       autocomplete="off" class="fl txt_2 js-industry_qiming" onchange="check_word('industry_qiming')" name="industry_qiming"
                       id="industry_qiming" onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''"
                       onFocus="placeholder =''" onBlur="placeholder='请输入公司行业，如：科技'">
                <div class="fl arr_bottom_icon arr_bottom_icon_position"></div>
                <div class="industry_qiming" style="display:none;">
                    <div class="title">热门行业</div>
                    <span class="industry_qiming_input fl noselect">科技</span>
                    <span class="industry_qiming_input fl noselect">信息技术</span>
                    <span class="industry_qiming_input fl noselect">互联网</span>
                    <span class="industry_qiming_input fl noselect">网络科技</span>
                    <span class="industry_qiming_input fl noselect">电子商务</span>
                    <span class="industry_qiming_input fl noselect">国际贸易</span>
                    <span class="industry_qiming_input fl noselect">贸易</span>
                    <span class="industry_qiming_input fl noselect">销售</span>
                    <span class="industry_qiming_input fl noselect">实业</span>
                    <span class="industry_qiming_input fl noselect">工贸</span>
                    <span class="industry_qiming_input fl noselect">广告</span>
                    <span class="industry_qiming_input fl noselect">设计</span>
                    <span class="industry_qiming_input fl noselect">传媒</span>
                    <span class="industry_qiming_input fl noselect">文化传播</span>
                    <span class="industry_qiming_input fl noselect">文化传媒</span>
                    <span class="industry_qiming_input fl noselect">建筑</span>
                    <span class="industry_qiming_input fl noselect">装饰装潢</span>
                    <span class="industry_qiming_input fl noselect">工程</span>
                    <span class="industry_qiming_input fl noselect">房地产中介</span>
                    <span class="industry_qiming_input fl noselect">物业管理</span>
                    <span class="industry_qiming_input fl noselect">管理咨询</span>
                    <span class="industry_qiming_input fl noselect">投资管理</span>
                    <span class="industry_qiming_input fl noselect">企业管理</span>
                    <span class="industry_qiming_input fl noselect">餐饮管理</span>
                    <span class="industry_qiming_input fl noselect">酒店管理</span>
                    <span class="industry_qiming_input fl noselect">农业</span>
                    <span class="industry_qiming_input fl noselect">化妆品</span>
                    <span class="industry_qiming_input fl noselect">教育培训</span>
                    <span class="industry_qiming_input fl noselect">美容美发</span>
                    <span class="industry_qiming_input fl noselect">电子</span>
                    <span class="industry_qiming_input fl noselect">制造</span>
                    <span class="industry_qiming_input fl noselect">游戏</span>
                    <span class="industry_qiming_input fl noselect">医疗</span>
                    <span class="industry_qiming_input fl noselect">服饰</span>
                    <span class="industry_qiming_input fl noselect">物流</span>
                </div>
                <input type="text" readonly="readonly" placeholder="请选择公司组织形式" value="有限公司" onkeypress="huiche_sub2('tab_serch_action_自助公司起名','industry_qiming_address','industry_qiming','organization',1)"
                       autocomplete="off" class="fl txt_2 js-organization" name="organization" id="organization" onchange="check_word('organization')"
                       onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''" onFocus="if (value =='有限公司'){value =''}"
                       onBlur="if (value ==''){value='有限公司'}">
                <div class="fl arr_bottom_icon arr_bottom_icon_position"></div>
                <div class="organization" style="display:none;">
                    <div class="title">常见组织形式</div>
                    <span class="organization_input fl noselect">有限公司</span>
                    <span class="organization_input fl noselect">有限合伙公司</span>
                </div>
                <input type="button" value="查询" onclick="sub2('tab_serch_action_自助公司起名','industry_qiming_address','industry_qiming','organization',1)"
                       class="fr btn">
            </div>
        </form>
        <a onclick="select('/statics/zzhzgsm/index.jhtml','serch_action_自助核准公司名');" class="posr " id="serch_action_自助核准公司名">自助核准公司名
            <span class="posa">自助核准公司名</span>
        </a>
        <form action="/statics/zzhzgsm/index.jhtml" name="form1" id="tab_serch_action_自助核准公司名" style="display: none;" target="_blank"
              class="show" onsubmit="return false">
            <div class="index-query-search clearfix">
                <input type="text" placeholder="请输入公司所在城市，如：上海" onkeypress="huiche_sub2('tab_serch_action_自助核准公司名','industry_address','industry_name','industry',2)"
                       id="industry_address" onchange="check_word('industry_address')" class="fl txt_1" name="city" onmouseover="this.style.borderColor='#ff5a86'"
                       onmouseout="this.style.borderColor=''" onFocus="placeholder =''" onBlur="placeholder='请输入公司所在城市，如：上海'">
                <input type="text" placeholder="请输入想用的名字，如：汉唐信通" onkeypress="huiche_sub2('tab_serch_action_自助核准公司名','industry_address','industry_name','industry',2)"
                       id="industry_name" onchange="check_word('industry_name')" class="fl txt_2" name="name" onmouseover="this.style.borderColor='#ff5a86'"
                       onmouseout="this.style.borderColor=''" onFocus="placeholder=''" onBlur="placeholder='请输入公司想使用的名字，如：汉唐'">
                <input type="text" placeholder="请输入公司行业" onkeypress="huiche_sub2('tab_serch_action_自助核准公司名','industry_address','industry_name','industry',2)"
                       autocomplete="off" class="fl txt_2 js-industry" name="industry" id="industry" onchange="check_word('industry')"
                       onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''" onFocus="placeholder=''"
                       onBlur="placeholder='请输入公司行业'">
                <div class="fl arr_bottom_icon arr_bottom_icon_position"></div>
                <div class="industry" style="display:none;">
                    <div class="title">热门行业</div>
                    <span class="industry_input fl noselect">科技</span>
                    <span class="industry_input fl noselect">信息技术</span>
                    <span class="industry_input fl noselect">互联网</span>
                    <span class="industry_input fl noselect">网络科技</span>
                    <span class="industry_input fl noselect">电子商务</span>
                    <span class="industry_input fl noselect">国际贸易</span>
                    <span class="industry_input fl noselect">贸易</span>
                    <span class="industry_input fl noselect">销售</span>
                    <span class="industry_input fl noselect">实业</span>
                    <span class="industry_input fl noselect">工贸</span>
                    <span class="industry_input fl noselect">广告</span>
                    <span class="industry_input fl noselect">设计</span>
                    <span class="industry_input fl noselect">传媒</span>
                    <span class="industry_input fl noselect">文化传播</span>
                    <span class="industry_input fl noselect">文化传媒</span>
                    <span class="industry_input fl noselect">建筑</span>
                    <span class="industry_input fl noselect">装饰装潢</span>
                    <span class="industry_input fl noselect">工程</span>
                    <span class="industry_input fl noselect">房地产中介</span>
                    <span class="industry_input fl noselect">物业管理</span>
                    <span class="industry_input fl noselect">管理咨询</span>
                    <span class="industry_input fl noselect">投资管理</span>
                    <span class="industry_input fl noselect">企业管理</span>
                    <span class="industry_input fl noselect">餐饮管理</span>
                    <span class="industry_input fl noselect">酒店管理</span>
                    <span class="industry_input fl noselect">农业</span>
                    <span class="industry_input fl noselect">化妆品</span>
                    <span class="industry_input fl noselect">教育培训</span>
                    <span class="industry_input fl noselect">美容美发</span>
                    <span class="industry_input fl noselect">电子</span>
                    <span class="industry_input fl noselect">制造</span>
                    <span class="industry_input fl noselect">游戏</span>
                    <span class="industry_input fl noselect">医疗</span>
                    <span class="industry_input fl noselect">服饰</span>
                    <span class="industry_input fl noselect">物流</span>
                </div>
                <input type="button" value="查询" onclick="sub2('tab_serch_action_自助核准公司名','industry_address','industry_name','industry',2)"
                       class="fr btn">
            </div>
        </form>
    </div>
    <script>
        function check_word(obj) {
            var cw = document.getElementById(obj).value;
            if (!/^[\u4e00-\u9fa5]+$/gi.test(cw)) {
                alert("请输入汉字");
                document.getElementById(obj).value = "";
            } else {
                $.ajax({
                    url: "/cmsapi/judgSenExp.jspx",
                    data: {
                        str: cw
                    },
                    success: function (data) {
                        if (!data.isGreat) {
                            alert(data.msg);
                            document.getElementById(obj).value = "";
                            return false;
                        } else {
                            return true;
                        }
                    }
                });
            }
        }

        function check_word_without_char(obj) {
            var cw = document.getElementById(obj).value;
            $.ajax({
                url: "/cmsapi/judgSenExp.jspx",
                async: false,
                data: {
                    str: cw
                },
                success: function (data) {
                    if (!data.isGreat) {
                        alert(data.msg);
                        document.getElementById(obj).value = "";
                        return false;
                    }
                }
            });
        }
        var select_name = "serch_action_自助公司起名";

        function getUserCookie() {
            var arr, reg = new RegExp("(^| )COOKIE_ACCOUNT_LOGIN_TICKET=([^;]*)(;|$)");
            if (arr = document.cookie.match(reg)) return unescape(arr[2]);
            else return "";
        }

        function select(str, name) {
            if (select_name != name) {
                if (select_name != "") {
                    $("#" + select_name).removeClass("select");
                }
                $("#" + name).addClass("select");
                select_name = name;
                document.form1.action = str;
            }
            $("#tab_" + name).parent().find("form").css("display", "none");
            $("#tab_" + name).css("display", "block");
        }

        function huiche_sub(obj, val) {
            if (event.keyCode == 13) {
                sub(obj, val);
            }
        }

        function huiche_sub2(obj, val, val2, val3, type) {
            if (event.keyCode == 13) {
                sub2(obj, val, val2, val3, type);
            }
        }

        function sub(obj, val) {
            document.getElementById(val).value = filtration($("#" + val).val());
            var val1 = $("#" + val).val();
            if (getUserCookie() == "") {
                loginOpen(0);
            } else {
                if (val1 != null && val1 != "") {
                    if (obj == "tab_serch_action_商标查询") {
                        if (document.getElementById("form_input_shangbiao").value == "请选择分类") {
                            alert("请选择分类");
                        } else {
                            check_word_without_char(val);
                            $("#" + obj).attr("onsubmit", "return true");
                            $("#" + obj).submit();
                        }
                    } else {
                        check_word_without_char(val);
                        $("#" + obj).attr("onsubmit", "return true");
                        $("#" + obj).submit();
                    }
                } else if (val1 == "") {
                    alert("请输入查询信息");
                }
            }
        }

        function sub2(obj, val, val2, val3, type) {
            document.getElementById(val).value = filtration($("#" + val).val());
            document.getElementById(val2).value = filtration($("#" + val2).val());
            document.getElementById(val3).value = filtration($("#" + val3).val());
            val = $("#" + val).val();
            val2 = $("#" + val2).val();
            val3 = $("#" + val3).val();
            var al2 = "请输入公司行业，如：科技";
            var al3 = "请输入公司组织形式";
            if (type == 2) {
                al2 = "请输入公司想使用的名字，如：汉唐";
                al3 = "请输入公司行业";
            }
            if (getUserCookie() == "") {
                loginOpen(0);
            } else {
                if (val == "" || val == null) {
                    alert("请输入公司所在城市，如：上海");
                } else if (val2 == "" || val2 == null) {
                    check_word(val);
                    alert(al2);
                } else if (val3 == "" || val3 == null) {
                    check_word(val2);
                    alert(al3);
                } else {
                    $("#" + obj).attr("onsubmit", "return true");
                    $("#" + obj).submit();
                }
            }
        }
    </script>
</div>
</script>

<!-- 热门推荐 -->
<div class="index-warp content">
    <div class="index-title clearfix">
    <i class="icon0 fl"></i>
    <div class="fl h2">热门推荐</div>
    </div>
    <div class="index-rmtj-list clearfix">
        @foreach($rementuijians as $p)
    <a href="{{$p->link}}" target="_blank" class="fl">
    <img src="{{asset("uploads/$p->image")}}">
    <h3 class="clearfix">
    <span class="name texthide fl">{{$p->name}}</span>
    <span style="border: 1px   #f4c650 solid;color:  #f4c650" class="type fl">热门</span>
    </h3>
    <div class="con">{{$p->content}}</div>
<div class="price"></div>
    </a>
        @endforeach
    </div>
    </div>
    <!-- 大拇指 -->
    <div class="index-cn content">
    <div class="index-cn-num1">  业务范围覆盖上海16个区县
    </div>
<div class="index-cn-num1">规模超过
    <span>50+</span>人的企业服务专家团队</div>
<div class="index-cn-num2 clearfix">
    <span class="fl">累计为</span>
    <span class="num posr fl">
    13000
<var class="posa"></var>
</span>
<span class="fl">家公司提供了优质的企业服务</span>
</div>
</div>
<!-- 企业服务 -->
<div class="js-tab-warp index-warp content">
    <div class="index-title clearfix">
        <i class="icon1 fl"></i>
        <div class="fl h2">企业服务</div>
    </div>
    <div data-index="0" class="js-index-body index-tyfa">
        <ul class="index-tyfa-tab posr clearfix">
            <li class="js-tyfa-tab posr fl select">
                <span>创业准备</span>
            </li>
            <li class="js-tyfa-tab posr fl">
                <span>成功之初</span>
            </li>
            <li class="js-tyfa-tab posr fl">
                <span>成熟稳定</span>
            </li>
            <i class="js-tyfa-icon icon posa"></i>
        </ul>
        <div class="js-tyfa-body index-tyfa-warp clearfix">
            @php
                $i =0;
            @endphp
            @foreach($chuangyezhunbeis as $p )
                @php
                    $i++;
                @endphp
                <a href="{{$p->link}}" target="_blank" style="background:url('{{asset("uploads/$p->image")}}') 0 0 no-repeat; "
               class="index-tyfa-list fl @if($i==1)link1 @elseif($i==2)  link2  @else  @endif">
                    <h3 class="texthide" >{{$p->name}}</h3>
                    <p>{{$p->content}}</p>
                </a>
            @endforeach
        </div>
        <div class="js-tyfa-body index-tyfa-warp clearfix hide">
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28093540oekq.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl link4">--}}
                {{--<h3 class="texthide">代理记账</h3>--}}
                {{--<p>会计核算不健全，公司宝解决您的记账问题</p>--}}
            {{--</a>--}}
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28095410inxl.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl link3">--}}
                {{--<h3 class="texthide">税控申请</h3>--}}
                {{--<p>小规模企业想要自己开具发票，公司宝轻松帮您申请办理</p>--}}
            {{--</a>--}}
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28095645k0bk.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl">--}}
                {{--<h3 class="texthide">一般纳税人认定</h3>--}}
                {{--<p>想被批准为一般纳税人，公司宝快速帮您解决</p>--}}
            {{--</a>--}}
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28095731goyt.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl">--}}
                {{--<h3 class="texthide">工位出租</h3>--}}
                {{--<p>创业无门槛，公司宝助力您的创业梦想</p>--}}
            {{--</a>--}}
            @php
                $i =0;
            @endphp
            @foreach($chenggongzhichus as $p )
                @php
                    $i++;
                @endphp
                <a href="{{$p->link}}" target="_blank" style="background:url('{{asset("uploads/$p->image")}}') 0 0 no-repeat; "
                   class="index-tyfa-list fl @if($i==1)link4 @elseif($i==2)  link3  @else  @endif">
                    <h3 class="texthide">{{$p->name}}</h3>
                    <p>{{$p->content}}</p>
                </a>
            @endforeach
        </div>
        <div class="js-tyfa-body index-tyfa-warp clearfix hide">
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28100304jv50.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl link4">--}}
                {{--<h3 class="texthide">新三板上市</h3>--}}
                {{--<p>轻松帮您在新三板挂牌，迈向腾飞</p>--}}
            {{--</a>--}}
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28100412ooyu.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl link2">--}}
                {{--<h3 class="texthide">VIE架构</h3>--}}
                {{--<p>您想进行海外上市，海外投资吗？并享受避税政策吗？公司宝为您做VIE架构</p>--}}
            {{--</a>--}}
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/28100757hm2j.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl">--}}
                {{--<h3 class="texthide">分公司设立</h3>--}}
                {{--<p>公司规模扩大，开展异地业务，公司宝来给您解决</p>--}}
            {{--</a>--}}
            {{--<a href="Cancellation.html" target="_blank" style="background:url('images/04182359nki6.jpg') 0 0 no-repeat;"--}}
               {{--class="index-tyfa-list fl">--}}
                {{--<h3 class="texthide">海外分公司注册</h3>--}}
                {{--<p>助你的企业拓展海外市场</p>--}}
            {{--</a>--}}
            @php
                $i =0;
            @endphp
            @foreach($chengshuwendings as $p )
                @php
                    $i++;
                @endphp
                <a href="{{$p->link}}" target="_blank" style="background:url('{{asset("uploads/$p->image")}}') 0 0 no-repeat;"
                   class="index-tyfa-list fl @if($i==1)link4 @elseif($i==2)  link2  @else  @endif">
                    <h3 class="texthide">{{$p->name}}</h3>
                    <p>{{$p->content}}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
<!-- 财会税务 -->
<div class="index-warp content">
    <div class="index-title clearfix">
        {{--<i class="icon2 fl" id="caihui"></i>--}}
        <img src="{{asset('images/shuiwu.png')}}" alt="" style="width: 35px;display: inline-block;margin-top: 8px;
    margin-right: 10px;    float: left;">
        <div class="fl h2">财会税务</div>
    </div>
    <div class="index-zscq clearfix">
        @php
            $i =0;
        @endphp
        @foreach($caikuaishuiwus as $p)
            @php
                $i++;
            @endphp
        <a href="{{$p->link}}" target="_blank" style="background:url('{{asset("uploads/$p->image")}}') 0 0 no-repeat; @if($i==4) width: 767px @endif"
           class="index-zscq-list fl  @if($i==1)link1 @else link2   @endif">
            <h3 class="texthide">{{$p->name}}</h3>
            <p>{{$p->content}}</p>
        </a>
        @endforeach
    </div>
</div>
<!-- 行政审批 -->
<div class="index-warp content">
    <div class="index-title clearfix">
        {{--<i class="icon3 fl"></i>--}}
        <img src="{{asset('images/xingzheng.png')}}" alt="" style="width: 35px;display: inline-block;margin-top: 8px;
    margin-right: 10px;    float: left;">
        <div class="fl h2">行政审批</div>
    </div>
    <div class="index-cksw clearfix">
        @foreach($xingzhengshenpis as $p)
        <a href="{{$p->link}}" target="_blank" style="background:url('{{asset("uploads/$p->image")}}') 0 0 no-repeat;"
           class="index-cksw-list fl">
            <h3 class="texthide">{{$p->name}}</h3>
            <p>{{$p->content}}</p>
        </a>
            @endforeach
    </div>
</div>
<!-- 金融公司 -->
<div class="index-warp content">
    <div class="index-title clearfix">
        {{--<i class="icon10 fl"></i>--}}
        <img src="{{asset('images/jinrong.png')}}" alt="" style="width: 35px;display: inline-block;margin-top: 8px;
    margin-right: 10px;    float: left;">
        <div class="fl h2">金融公司</div>
    </div>
    <div class="index-zscq clearfix">
        @php
            $i =0;
        @endphp
        @foreach($jinronggongsis as $p)
            @php
                $i++;
            @endphp
        <a href="{{$p->link}}" target="_blank" style="background:url('{{asset("uploads/$p->image")}}') 0 0 no-repeat; @if($i==4) width: 767px @endif"
           class="index-zscq-list fl  @if($i==1)link1 @else link2   @endif ">
            <h3 class="texthide">{{$p->name}}</h3>
            <p>{{$p->content}}</p>
        </a>
            @endforeach
    </div>
</div>
<!-- 新闻咨询 -->
<div class="js-tab-warp index-warp content">
    <div class="index-title clearfix">
        <i class="icon1 fl"></i>
        <div class="fl h2">新闻资讯</div>
        <div class="tab fl">
            @php
            $i = 0;
            @endphp
            @foreach($categorys as $p)
                @php
                    $i++;
                @endphp
                <a href="{{url("articlelist/$p->id")}}">
                    <span data-index="{{$i}}" class="js-index-tab " >{{$p->name}}</span>

                </a>
            @endforeach
        </div>
    </div>
    <div class="index-zthd clearfix">
        @php
            $num = count($news);
        if($num>6){
        $num = 6;
        }
        @endphp

        @for($i=0; $i<$num;$i++)
            @php
            $p = $news[$i];
            @endphp
        <a href="{{url("article/$p->id")}}" target="_blank" class="fl">
            <img src="{{asset("uploads/$p->image")}}" alt="">
            <div class="time">{{date('Y-m-d',$p->time)}}</div>
            <h3 class="texthide" style=" font-size: 15px;">{{$p->title}}</h3>
        </a>
        @endfor
    </div>

</div>

<!-- 客户反馈 -->
<div class="index-kehu content">
    <div id="index-kehu" class="kehu-swiper swiper-container">
        <div class="swiper-wrapper">
           @foreach($members as $p)
            <div class="swiper-slide index-kehu-list clearfix">
                <img src="{{asset("uploads/$p->image")}}" class="fl">
                <div class="con">
                    <div class="texthide h3">{{$p->company}}</div>
                    <div class="name">
                        <span>{{$p->job}}</span>
                        <em>|</em>
                        <span>{{$p->username}}</span>
                    </div>
                    <p>{{$p->motto}}</p>
                </div>
            </div>
           @endforeach
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>
<!-- 合作伙伴 -->
<div class="index-warp content">
    <div class="index-title clearfix">
        <i class="icon10 fl"></i>
        <div class="fl h2">合作伙伴</div>
    </div>
    <table class="index-hzhb">
        @php
            $num = count($hezuohuobans);
        if($num>12){
        $num =12;
        }
        @endphp
        <tr>
            @for($i=0;$i<$num;$i++)
                @php
                    $p = $hezuohuobans[$i];
                @endphp
                 @if($i>=6)
                    @break
                @endif
            <td>
                <img src="{{asset("uploads/$p->image")}}" style="width: 189px; height: 109px;">
            </td>
               
          @endfor
        </tr>
        @if($num>=6)
        <tr>
            @for($i=6;$i<$num;$i++)
                @php
                    $p = $hezuohuobans[$i];
                @endphp
                <td>
                    <img src="{{asset("uploads/$p->image")}}" style="width: 189px; height: 109px;">
                </td>
            @endfor
        </tr>
        @endif
    </table>
</div>
</div>
</div>

<!-- <a href="javascript:;" class="js-openchat2 fix-right fix-kf posf"></a>-->
<a id="js-gototop" href="javascript:;" class="fix-right fix-gototop posf"></a>

<!-- <script src="js/kefu.js"></script> -->
<script src="{{asset("js/index.js")}}"></script>
<script src="{{asset("js/assistant.js")}}"></script>
<script>
    $(function () {
        $("#index").addClass("select");
    })
</script>

<!--在线客服-->
{{--<aside class="consult">--}}
    {{--<div class="tit">--}}
        {{--<div class="img">--}}
            {{--<img src="{{asset("images/consult_tit.png")}}" alt="在线咨询">--}}
        {{--</div>--}}
        {{--<a href="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2211894228%22%2C%22userId%22%3A%227727567%22%2C%22pageId%22%3A0%7D">--}}
            {{--<h3>在线咨询</h3>--}}
        {{--</a>--}}
    {{--</div>--}}
    {{--<ul>--}}
        {{--@php--}}
            {{--$webkey = \App\Web::all();--}}
            {{--if(count($webkey)==0){--}}
            {{--$webkey = new \App\Web();--}}
            {{--}else{--}}
            {{--$webkey = $webkey->first();--}}
            {{--}--}}
        {{--@endphp--}}
        {{--<li style="padding-bottom: 10px;">--}}
            {{--<p style="font-size: 12px;padding: 0px;margin-left: -10px;">{{$webkey->member}}</p>--}}
            {{--<p style="font-size: 12px;padding: 0px;margin-left: -10px;">{{$webkey->memberphone}}</p>--}}
        {{--</li>--}}
    {{--</ul>--}}
{{--</aside>--}}


@endsection
