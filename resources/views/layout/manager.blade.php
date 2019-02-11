<!DOCTYPE html>
<html>
<head>
    <title>后台管理系统</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/vendor.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/flat-admin.css")}}">
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/blue-sky.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/blue.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/red.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("/assets/css/theme/yellow.css")}}">
    <style type="text/css">
        th::after{
            content: "" !important;
        }
    </style>
    @yield("css")
</head>
<body>
<div class="app app-default">
    <?php
    $member = \App\Member::find(session('id'));
    ?>
    <aside class="app-sidebar" id="sidebar" style="height: auto">
        <div class="sidebar-header">
            <a class="sidebar-brand" href="{{url('/ ')}}"><span class="highlight">后台管理</span></a>
            <button type="button" class="sidebar-toggle">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="sidebar-menu">
            <ul class="sidebar-nav">
                <li >
                    <a href="{{route('adminindex')}}">
                        <div class="icon">
                            <i class="fa fa-tasks" aria-hidden="true"></i>
                        </div>
                        <div class="title">控制台首页</div>
                    </a>
                </li>
                {{--菜单管理--}}
                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                        </div>
                        <div class="title">主页管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{route('ppt')}}">幻灯片管理</a></li>
                            <li><a href="{{route("topmenu")}}">上部菜单栏管理</a></li>
                            <li><a href="{{route("sidemenu")}}">侧边菜单栏管理</a></li>
                            <li><a href="{{route("addfun")}}">列表内容管理</a></li>

                        </ul>
                    </div>
                </li>
                {{--专题活动--}}
                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                        </div>
                        <div class="title">内容管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{route("webinfo")}}">网站基本信息</a></li>
                            <li><a href="{{route("page")}}">所有页面</a></li>
                            <li><a href="{{route("pagelist")}}">所有列表</a></li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                        </div>
                        <div class="title">推荐管理</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{url("show/1")}}">热门推荐</a></li>
                            <li><a href="{{url("show/2")}}">企业服务-创业准备</a></li>
                            <li><a href="{{url("show/3")}}">企业服务-成功之初</a></li>
                            <li><a href="{{url("show/4")}}">企业服务-成熟稳定</a></li>
                            <li><a href="{{url("show/5")}}">财会税务</a></li>
                            <li><a href="{{url("show/6")}}">行政审批</a></li>
                            <li><a href="{{url("show/7")}}">金融公司</a></li>
                        </ul>
                    </div>
                </li>

                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-sliders" aria-hidden="true"></i>
                        </div>
                        <div class="title">新闻资讯</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{route("category")}}">资讯类型</a></li>
                            <li><a href="{{route("artical")}}">新闻列表</a></li>

                        </ul>
                    </div>
                </li>

                {{--人员管理--}}
                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>
                        <div class="title">用户管理</div>
                    </a>
                    <div class="dropdown-menu">
                    <ul>
                    <li><a href="{{route('memberadmin')}}">管理员</a></li>
                    <li><a href="{{route('membershow')}}">用户反馈</a></li>
                    </ul>
                    </div>
                </li>
                {{--合作伙伴--}}
                <li class="dropdown">
                    <a href="#">
                        <div class="icon">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                        </div>
                        <div class="title">商务合作</div>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="{{route('friends')}}">合作伙伴</a></li>
                            <li><a href="{{route('friendlink')}}">友情链接</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </aside>
    <script type="text/ng-template" id="sidebar-dropdown.tpl.html">
        <div class="dropdown-background">
            <div class="bg"></div>
        </div>
        <div class="dropdown-container">
        </div>
    </script>

    <div class="app-container">

        <nav class="navbar navbar-default" id="navbar">
            <div class="container-fluid">
                <div class="navbar-collapse collapse in">
                    <ul class="nav navbar-nav navbar-mobile">
                        <li>
                            <button type="button" class="sidebar-toggle">
                                <i class="fa fa-bars"></i>
                            </button>
                        </li>
                        <li class="logo">
                            <a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
                        </li>
                        <li>
                            <button type="button" class="navbar-toggle">
                                <img class="profile-img" src="">
                            </button>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-left">
                        <li class="navbar-brand">
                            <img src="" width="200px">
                        </li>
                        <li class="navbar-title">后台管理系统</li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown profile">
                            <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
                                <p>设置</p>
                                <div class="title">Profile</div>
                            </a>
                            <div class="dropdown-menu">
                                <div class="profile-info">
                                    <h4 class="username">管理员您好</h4>
                                </div>
                                <ul class="action">
                                    <li>
                                        @php
                                            $adminid = session('id');
                                        @endphp
                                        <a href="{{url("memberinfo/$adminid")}}">
                                            信息修改
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('logout')}}">
                                            退出
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield("content")
    </div>
</div>
<script type="text/javascript" src="{{asset("/assets/js/vendor.js")}}"></script>
<script type="text/javascript" src="{{asset("/assets/js/app.js")}}"></script>
@yield('js')
</body>
</html>