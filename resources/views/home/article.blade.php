@extends('layout.home')
        @section("key")
            <meta name="keywords" content="{{$new->href}}">
        @endsection
        @section("css")
            <link href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
            <link href="http://www.sinohefa.com/assets/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="{{asset("css/base.css")}}">
            <link href="http://www.sinohefa.com/assets/css/style.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,400i" rel="stylesheet">
            <link href="http://www.sinohefa.com/assets/css/font-awesome.min.css" rel="stylesheet">
            <link href="http://www.sinohefa.com/assets/css/slick.css" rel="stylesheet">
            <link href="http://www.sinohefa.com/assets/css/settings.css" rel="stylesheet">
            <link href="http://www.sinohefa.com/assets/css/animate.css" rel="stylesheet">
            <link href="http://www.sinohefa.com/assets/css/jquery.mCustomScrollbar.min.css" rel="stylesheet">
            <style>
                .fl{
                    line-height: 14px;
                }
            </style>

            <style>

                .submenu {
                    display: none;
                    position: absolute;
                    margin-top: 20px;
                }

                .has-submenu:hover .submenu {
                    display: inline-block;
                    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                    background-color: #f9f9f9;
                    min-width: 120px;
                    z-index: 999;
                }

                .submenu li {
                    padding: 10px 5px;
                    margin: 10px;
                    display: block;
                }

                .submenu a {
                    text-transform: uppercase;
                    font-size: 16px;
                    color: #404040;
                    line-height: 1;
                    font-weight: 600;
                }

                .submenu a:hover {
                    color: #25bff2;

                }

                .topSec {
                    font-size: 12px;
                    line-height: .8;
                    display: inline-block;
                    margin-right: 12px;
                }

                .flagList {
                    position: absolute;
                    background: #fff;
                    top: 20px;
                    z-index: 1;
                    display: none;
                    border: 1px solid #F1F1F1;
                    color: black;
                    width: 100px;
                }

                .flagList li {
                    padding: 10px 10px;
                    text-align: left;

                }

                .topSec a {
                    color: #939393 !important;
                }

                .countryFlug img {
                    margin-right: 5px;
                    margin-top: -2px;
                }

                .flagList li:hover {
                    background-color: rgb(255, 166, 10);
                }

                /*footer*/

                .footer_space {
                    background: #f1eff0;
                    bottom: 0;
                    left: 0;
                    min-width: 100%;
                }

                .footer_space .index-footer {
                    background-color: #333;
                    padding: 30px 0 20px;
                }

                .footer_space .index-footer .friendly-link {
                    border: none;
                }

                .footer_space .index-footer .friendly-link h5 {
                    height: 40px;
                    line-height: 40px;
                    color: #999;
                }

                .footer_space .index-footer .friendly-link h5 a {
                    color: #999;
                    font-size: 14px;
                }

                .footer_space .index-footer .friendly-link p a {
                    height: 28px;
                    line-height: 28px;
                    color: #999;
                    font-size: 12px;
                    margin-right: 0;
                }

                .footer_space .index-footer .footer-bq {
                    color: #666;
                    height: 41px;
                    padding: 12px 0 9px;
                    text-align: left;
                    background: none;
                    font-size: 12px;
                }

                .footer_space .index-footer .footer-bq a {
                    background: url("../images/xin.png") 0 0 no-repeat;
                    display: inline-block;
                    vertical-align: top;
                    color: #666;
                    width: 24px;
                    height: 24px;
                    margin: 8px 0 0 0;
                    float: left;
                }

                .footer_space .index-footer .footer-bq span {
                    display: inline-block;
                    height: 41px;
                    line-height: 41px;
                    vertical-align: top;
                }

                .footer_space .footer-info {
                    border-bottom: 1px #dcdcdc solid;
                }

                .footer_space .footer-info div {
                    width: 20%;
                }

                .footer_space .footer-info div i {
                    background: url("../images/gs-common-icon.png") no-repeat;
                    height: 42px;
                    width: 42px;
                }

                .footer_space .footer-info div i.fi-icon1 {
                    background-position: 0 -24px;
                }

                .footer_space .footer-info div i.fi-icon2 {
                    background-position: -42px -24px;
                }

                .footer_space .footer-info div i.fi-icon3 {
                    background-position: -84px -24px;
                }

                .footer_space .footer-info div i.fi-icon4 {
                    background-position: -126px -24px;
                }

                .footer_space .footer-info div i.fi-icon5 {
                    background-position: -168px -24px;
                }

                .footer_space .footer-info div span {
                    color: #393939;
                    font-size: 18px;
                    max-width: 158px;
                }

                .footer_space .footer-info div em {
                    color: #999;
                    max-width: 158px;
                    font-size: 12px;
                }

                .footer_space .footer-nav li {
                    width: 50%;
                    padding: 30px 40px;
                    margin-top: 20px;
                }

                .footer_space .footer-nav li span {
                    font-size: 14px;
                }

                .footer_space .footer-nav li span,
                .footer_space .footer-nav li a {
                    display: block;
                    height: 28px;
                    line-height: 28px;
                    color: black;
                }

                .footer_space .footer-nav li a {
                    font-size: 14px;
                }

                .footer_space .footer-nav li a i {
                    background-position: -174px -12px;
                    height: 7px;
                    width: 5px;
                }

                .footer_space .footer-nav li a:hover {
                    color: #00afdb;
                    text-decoration: none;
                }

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

            <style>
                .btn-btm {
                    border-radius: 2px;
                    border: 1px solid #e4e4e4;
                    display: inline-block;
                    font-size: 11px;
                    line-height: .5px;
                    line-height: 2.09;
                    color: #202020;
                    padding: 7px 28px;
                    font-weight: 700;
                }

                .btn-btm :hover {
                    background-color: rgb(43, 91, 55) !important;
                    color: #000;
                }

                .btn-up {
                    position: relative;
                    top: -20px;
                }
                .widget-title:before{
                    background: #25bff2!important;
                }
            </style>
        @endsection
        @section("js")
            <script language="JavaScript" src="http://www.sinohefa.com/assets/js/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery-3.1.1.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery-ui.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.easing.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/bootstrap.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/imagesloaded.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.isotope.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.matchHeight.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.themepunch.revolution.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.unveilEffects.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/jquery.themepunch.tools.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/revolution.extension.navigation.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/revolution.extension.slideanims.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/revolution.extension.layeranimation.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/slick.min.js"></script>
            <script type="text/javascript" src="http://www.sinohefa.com/assets/js/opton.js"></script>

        @endsection
@section("content")
    <div class="blog-posts-std-list blog-std-page blog-page-single" style="padding-top: 0px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                            <div class="blog-box">
                                <div id="blog-img-slider" class="">

                                </div>

                                <div class="blog-content">
                                    <h3>{{$new->title}}</h3>
                                    <div class="blog-meta">
                                        <p>
                                            <span class="meta-date">{{date('Y-m-d' , $new->time)}}</span>
                                        </p>
                                    </div>
                                    <p>
                                    {!! $new->content !!}
                                    </p>

                                    <p>
                                        <br/>
                                    </p>
                                    <p>
                                        <br/>
                                    </p>
                                </div>
                                <div class="blog-share-box clearfix">
                                    <div class="agency">
                                <span>

                                </span>
                                    </div>
                                    <div class="share-box ">













                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="">
                                <div class="widget-title">
                                    <h3 class="text-uppercase" style="font-size: 20px;display: inline-block"> 最新动态 </h3>
                                    <a href="#" target="_self" class="pull-right" style="display: inline-block;padding-top: 5px">More+</a>
                                </div>
                                @php
                                    $tuijians = \App\News::where('id','<>',$new->id)->orderby('time','dsc')->get();
                                    $num = count($tuijians);
                                    if($num>5){
                                        $num = 5;
                                    }
                                @endphp
                                @for($i=0; $i<$num; $i++)
                                    @php
                                        $tuijian = $tuijians[$i];
                                    @endphp
                                <div class="widget-body">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="{{url("article/$tuijian->id")}}">

                                                <img src="{{asset("uploads/$tuijian->image")}}" class="media-object" alt="blog-author"
                                                     style="width: 80px;height: 80px;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <a href="{{url("article/$tuijian->id")}}">{{$tuijian->title}}</a>
                                            <div class="recent-post-date">

                                                <p class="pull-right">{{date('Y-m-d', $tuijian->time)}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endfor

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endsection












