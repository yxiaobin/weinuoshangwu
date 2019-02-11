
@extends("layout.home")
@section("css")
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer_style.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="css/swiper.min.css">
    <script src="js/swiper-3.3.1.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/click_event.js"></script>

    <link rel="stylesheet" href="/r/cms/w3/w3/css/top_style.css">
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
    </style>
@endsection
@section("js")
    <script>
        function search() {
            document.getElementById("screen").submit();
        }
    </script>
    <script src="js/common.js"></script>
    <link rel="stylesheet" href="css/footer_style.css">
    <!-- 这个js是新增的 -->
    <script src="js/screen.js"></script>
@endsection


@section("content")
    <div class="screen-warp content" id="jctj">
        <script>
            var jctj = 0;
        </script>
        <div class="screen-title clearfix">
            <h2 class="fl">精品推荐</h2>
        </div>
        <div class="screen-recommend">
            <a href="http://wn.budgroup.cn/factory" style="background:url('{{asset("images/jing1.jpg")}}') 0 0 no-repeat;" class="posr clearfix" target="_blank">
                <div class="fr">
                    <i class="posa hide"></i>
                    <h3 class="texthide">商业保理公司注册</h3>
                    <p>
                        <var class="fl">一站式代理服务，全程办理服务，更高效快捷!</var>
                    </p>
                    <script>
                        jctj++;
                    </script>
                </div>
            </a>
            <a href="http://wn.budgroup.cn/private" style="background:url('{{asset("images/jing2.jpg")}}') 0 0 no-repeat;" class="posr clearfix" target="_blank">
                <div class="fr">
                    <i class="posa hide"></i>
                    <h3 class="texthide">私募基金公司注册</h3>
                    <p>
                        <var class="fl">深度调研资产配置领域、解析投资策略、规避投资风险规避投资风向</var>
                    </p>
                    <script>
                        jctj++;
                    </script>
                </div>
            </a>
            <a href="http://wn.budgroup.cn/investment" style="background:url('{{asset("images/jing3.jpg")}}') 0 0 no-repeat;" class="posr clearfix" target="_blank">
                <div class="fr">
                    <i class="posa hide"></i>
                    <h3 class="texthide">企业境外投资备案</h3>
                    <p>
                        <var class="fl">把握政策脉搏，理解政策变化</var>
                    </p>
                    <script>
                        jctj++;
                    </script>
                </div>
            </a>
            <a href="http://wn.budgroup.cn/gongsizhuxiao" style="background:url('{{asset("images/jing4.jpg")}}') 0 0 no-repeat;" class="posr clearfix" target="_blank">
                <div class="fr">
                    <i class="posa hide"></i>
                    <h3 class="texthide">公司注销</h3>
                    <p>
                        <var class="fl">一站式代理服务，全程办理服务，更高效快捷!</var>
                    </p>
                    <!-- <div class="price">
                      ￥<span>8997</span>元起
                    </div> -->
                    <script>
                        jctj++;
                    </script>
                </div>
            </a>
        </div>
        <script>
            if (jctj == 0) {
                document.getElementById("jctj").style.display = "none";
            }
        </script>
    </div>


    <div class="screen-warp content" id="sreen_170">
        <script>
            var srca = 0;
        </script>
        <div class="screen-title clearfix">
            <h2 class="fl">行政审批</h2><a href="http://wn.budgroup.cn/list/25" class="fr" target="_blank">查看更多</a>
        </div>
        <div class="js-list-swiper screen-list swiper-container clearfix">
            <div class="swiper-wrapper">
                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/icp" class="posr fl" target="_blank"><img src="{{asset("images/xing1.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">ICP经营许可证</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>
                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/yljx" class="posr fl" target="_blank"><img src="{{asset("images/xing2.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">食品经营许可证</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>
                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/spjy" class="posr fl" target="_blank"><img src="{{asset("images/xing3.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">医疗器械经营许可证</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script>
            if (srca == 0) {
                document.getElementById("sreen_170").style.display = "none";
            }
        </script>
    </div>

    <div class="screen-warp content" id="sreen_167">
        <script>
            var srca = 0;
        </script>
        <div class="screen-title clearfix">
            <h2 class="fl">企业登记</h2><a href="http://wn.budgroup.cn/list/5" class="fr" target="_blank">查看更多</a>
        </div>
        <div class="js-list-swiper screen-list swiper-container clearfix">
            <div class="swiper-wrapper">

                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/neizizhuce" class="posr fl" target="_blank"><img src="{{asset("images/dengji.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">内资有限公司注册</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>

                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/waizizhuce" class="posr fl" target="_blank"><img src="{{asset("images/dengji.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">外资有限公司注册</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>

                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/gerenduzi" class="posr fl" target="_blank"><img src="{{asset("images/dengji.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">个人独资企业注册</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script>
            if (srca == 0) {
                document.getElementById("sreen_167").style.display = "none";
            }
        </script>
    </div>


    <div class="screen-warp content" id="sreen_169">
        <script>
            var srca = 0;
        </script>
        <div class="screen-title clearfix">
            <h2 class="fl">财会税务</h2><a href="http://wn.budgroup.cn/list/29" class="fr" target="_blank">查看更多</a>
        </div>
        <div class="js-list-swiper screen-list swiper-container clearfix">
            <div class="swiper-wrapper">
                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/ckts" class="posr fl" target="_blank"><img src="{{asset("images/cai1.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">出口退税</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>
                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/fmba" class="posr fl" target="_blank"><img src="{{asset("images/cai2.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">非贸备案</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>
                <div class="swiper-slide fl">
                    <a href="http://wn.budgroup.cn/ybnsrjz" class="posr fl" target="_blank"><img src="{{asset("images/cai3.jpg")}}">
                        <div class="con posa">
                            <h3 class="texthide">一般纳税人企业代理记账</h3>
                            <div class="btn">查看详情</div>
                        </div></a>
                    <script>
                        srca++;
                    </script>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script>
            if (srca == 0) {
                document.getElementById("sreen_169").style.display = "none";
            }
        </script>
    </div>
    <div class="screen-warp content" id="sreen_171">
        <script>
            var srca = 0;
        </script>
        <div class="screen-title clearfix">
            <h2 class="fl">增值服务</h2><a href="/product/2020" class="fr" target="_blank">查看更多</a>
        </div>
        <div class="js-list-swiper screen-list swiper-container clearfix">
            <div class="swiper-wrapper">
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <script>
            if (srca == 0) {
                document.getElementById("sreen_171").style.display = "none";
            }
        </script>
    </div>



@endsection
