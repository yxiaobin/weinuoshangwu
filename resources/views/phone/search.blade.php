
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="" />
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <!-- 优先使用 IE 最新版本和 Chrome -->
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'/>
    <!-- 为移动设备添加 viewport -->
    <meta name='viewport' content='width=device-width,initial-scale=0.5,maximum-scale=1,minimum-scale=1,user-scalable=yes'/>
    <title>上海公司注册_上海注册公司代理_营业执照办理-企盈注册公司</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <!-- css -->
    <link rel="stylesheet" href="{{asset("phone/Public/Mobile/css/common.css")}}"/>
    <link rel="stylesheet" href="{{asset("phone/Public/Mobile/css/product-all.css")}}"/>
    <!-- 文字图标 -->
    <link rel="stylesheet" href="{{asset("phone/Public/Plugs/Font-Awesome-3.2.1/css/font-awesome.min.css")}}" />

    <!-- <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css"> -->
    <!--[if IE 7]>
    <link rel="stylesheet" href="{{asset("phone/Public/Plugs/Font-Awesome-3.2.1/css/font-awesome-ie7.min.css")}}" />
    <![endif]-->
    <!-- 轮播图 -->
    <link rel="stylesheet" href="{{asset("phone/Public/Plugs/Swiper/swiper-3.4.2.min.css")}}" />
    <!-- js -->
    <script src="{{asset("phone/Public/Plugs/jquery-2.1.4.js")}}" type="text/javascript"></script>
    <script>
        // 响应屏幕大小
        window.onresize = function () {
            // 获取屏幕字体大小的基值
            changeFontSzie();
        };
        $(document).ready(function () {
            changeFontSzie();
        });
        function changeFontSzie() {
            // 获取屏幕字体大小的基值
            var htmlWidth = document.documentElement.clientWidth || document.body.clientWidth;
            // 屏幕宽度大于780，不在放大
            htmlWidth = htmlWidth < 780 ? htmlWidth : 780;
            var htmlDom = document.getElementsByTagName('html')[0];
            htmlDom.style.fontSize = htmlWidth / 375 * 100 + 'px';
        }
    </script>

    <link rel="stylesheet" href="{{asset("phone/Public/Mobile/css/index.css")}}"/>

</head>
<body class="hy-theme-red">

<!-- 内容 -->
<div class="container">
    <div class="search-box">
        <div class="search-all">
            <div class="search-info">
                <div class="row">
                    <div class="r" onclick="javascript:history.go(-1)"><i class="icon-angle-left"></i></div>
                    <div class="c">
                        <form id="form" method="post" action="/Index/searchContent.html">
                            <input name="search"  class="search-info" type="text" placeholder="找专业人做专业事">
                        </form>
                    </div>
                    <div class="l" onclick="javascript:$('#form').submit();"><img src="{{asset("phone/Public/Mobile/img/common/search.png")}}" alt=""></div>
                </div>
            </div>
        </div>
        <div class="push">
            <div>
                <h1>热门推荐</h1>
                <div class="flex">
                    @foreach($rementuijians as $p)
                    <div class="one"><a href="#">{{$p->name}}</a></div>
                    @endforeach

                    </div>
                </div>
            </div>
        </div>        </div>
</div>

</body>
<script src="{{asset("phone/Public/Mobile/js/common.js")}}" type="text/javascript"></script>

<!-- 商务通-->
<script language="javascript" src="http://pgt.zoosnet.net/JS/LsJS.aspx?siteid=PGT56393568&float=1&lng=cn"></script>
<!-- 百度统计 -->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?a98297ade62b9d3261e60d3fcae3a7f6";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
</html>
