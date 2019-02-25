<!-- 头尾固定，中间内容自定义的类型-->
<!-- 包括： /about-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="">
    <meta name="description" content="巍诺商务股份有限公司私募基金公司注册,10年服务经验,为您解析私募基金公司注册需要注意什
        么？注册私募基金公司流程,等相关问题.公司宝,让企业没有难办的事!咨询热线:4006-798-999">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=0.3, maximum-scale=1.0, minimum-scale=0.3">

    <meta name="renderer" content="webkit">
    <meta name="applicable-device" content="pc">
    <title>巍诺商务股份有限公司私募基金公司注册,免费公司(工商)注册!</title>
    <link rel="stylesheet" type="text/css" href="http://static.gongsibao.com/css/1493282895537/gsb.css">
    <script src="http://static.gongsibao.com/lib/g.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="undefinedjs/html5.min.js" type="text/javascript"></script>
    <script src="undefinedjs/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{asset("css/page.css")}}" type="text/css">
    <script type="text/javascript" src="{{asset("js/page.js")}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/footer_style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">
    <style>
        .footer{
            width: 100%;
            background: #242830;
            padding:16px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 9999;
        }

        .f_wrap{
            width: 1132px;
            margin: 0 auto;
        }

        .f_wrap li{
            float: left;
        }
        .online,
        .mobile {
            display: block;
            font-size: 24px;
            color: #fff;
            padding-left: 42px;
            margin-top: 23px;
        }

        .online {
            background: url('{{asset('images/listen.png')}}') left center no-repeat;
        }
        .mobile {
            background: url('{{asset('images/dh.png')}}') left center no-repeat;
        }
        .footer_space .index-footer {
            margin-bottom: 55px;
        }

    </style>
</head>

<body>
<div id="js_loginPopup" tabindex="-1" role="dialog" class="hide">
    <div>
        <div class="modal-header">
            <i type="button" class="close"></i>
            <h4 id="myModalLabel" class="modal-title">巍诺商务股份有限公司会员登录</h4>
        </div>
        <div class="modal-body">
            <div id="login-popup-tab" data-tab-name="loginRegTab" data-tab-selcls="sp" class="login-popup">
                <!--a.login-activity.mb15(href='http://www.gongsibao.com/zhuanti/November/')-->
                <!-- i.pull-left-->
                <!-- | 活动：新老用户注册/登录就送100元优惠券-->
                <div class="switch">
                    <span data-index="0" class="pull-left sp js-tab-title-loginRegTab">登录</span>
                    <span data-index="1" class="pull-right js-tab-title-loginRegTab">注册</span>
                </div>
                <div class="login js-tab-body-loginRegTab">
                    <form id="loginForm" method="post">
                        <ul class="mb20">
                            <li class="clearfix login-name">
                                <i class="pull-left"></i>
                                <input type="text" placeholder="用户名/手机号/邮箱" autocomplete="off" name="username" class="pull-left pl15">
                            </li>
                            <li class="clearfix login-password">
                                <i class="pull-left"></i>
                                <input type="password" placeholder="密码" autocomplete="off" name="password" class="pull-left pl15">
                            </li>
                        </ul>
                        <div class="forget clearfix pb20">
                            <label class="pull-left">
                                <input type="checkbox" autocomplete="off" value="0" name="remember" class="pull-left">自动登录</label>
                            <a href="/findpwd" class="pull-right">忘记密码？</a>
                        </div>
                        <input type="hidden" name="dosubmit" value="1">
                        <input type="submit" name="dosubmit" value="登录" class="btn login-btn mb20">
                    </form>
                    <div class="other clearfix mb30">
                        <span class="pull-left">合作网站账号登录：</span>
                        <a href="https://api.weibo.com/oauth2/authorize?response_type=code&amp;client_id=3680441826&amp;redirect_uri=http%3a%2f%2fcrm.gongsibao.com%2faccount%2fOAuthLogin%3fIsBack%3dYes&amp;state=SinaWeiBo"
                           class="pull-left">
                            <i class="pull-left other-wb"></i>
                        </a>
                        <!--a.pull-left(href='https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101175409&redirect_uri=http%3a%2f%2fcrm.gongsibao.com%2faccount%2fOAuthLogin%3fIsBack%3dYes&state=QQ')-->
                        <!-- i.pull-left.other-qq-->
                        <a href="https://open.weixin.qq.com/connect/qrconnect?appid=wx5fdb66e2675948b0&amp;redirect_uri=http%3a%2f%2fcrm.gongsibao.com%2faccount%2fOAuthLogin%3fIsBack%3dYes&amp;response_type=code&amp;scope=snsapi_login&amp;state=WeiXin"
                           class="pull-left">
                            <i class="pull-left other-wx"></i>
                        </a>
                    </div>
                </div>
                <div style="display:none" class="register js-tab-body-loginRegTab">
                    <form id="registForm" method="post" action="javascript:;">
                        <ul>
                            <li class="clearfix mb20">
                                <input type="text" placeholder="手机号" name="mobile" class="pull-left mobile-num">
                            </li>
                            <li class="clearfix mb20">
                                <input type="text" placeholder="图片验证码" name="mobile-img-code" class="pull-left img-code">
                                <span class="pull-right code-img">
                                        <img id="reloadcode" src="" alt="验证码">
                                    </span>
                            </li>
                            <li class="clearfix mb20">
                                <input type="text" placeholder="短信验证码" name="mobile-code" class="pull-left message-code">
                                <span id="registGetPhoneCode" v="1" class="pull-right code-btn btn-gray">获取验证码</span>
                            </li>
                            <li class="clearfix mb20">
                                <input type="password" placeholder="密码" name="password" class="pull-left register-password">
                            </li>
                            <li class="clearfix mb20">
                                <input type="password" placeholder="确认密码" name="password1" class="pull-left confirm-password">
                            </li>
                        </ul>
                        <div class="forget clearfix pb20">
                            <label class="pull-left">
                                <input type="checkbox" checked="checked" name="protocol" class="pull-left">我已阅读并同意</label>
                            <a href="/duty/" class="pull-left">《公司宝服务协议》</a>
                        </div>
                        <input type="hidden" name="dosubmit" value="1">
                        <input type="submit" value="注册" class="btn register-btn mb30">
                    </form>
                </div>
            </div>
        </div>
        <!--.modal-footer-->
        <!-- button.btn.btn-default(type='button',data-dismiss='modal') Close-->
        <!-- button.btn.btn-primary(type='button') Save changes-->
    </div>
</div>
<!--Created by LiuFei on 2016/4/19.-->
<div class="index-navbar min-list-navbar">
    <div class="min-navbar min-navbar" style="height: 36px;">
        <div class="container clearfix topbar">
            <div class="pull-left clearfix">
                <!--<img src="images/logo.jpg" style="height: 22px">-->
                <!--<a href="/" class="min-logo pull-left"></a>-->
                <a href="{{url('/')}}">
                    <img src="{{asset("images/logo.jpg")}}" style="height: 22px;">
                </a>
                <!-- <a href="/" class="pull-left ml10">返回首页</a>-->
                <div class="site-nav pull-left clearfix ml10">
                    <!--<div class="pull-left line-1">|</div>网站导航<i></i>
                        <ul class="site-con">
                        <li>
                        <a href="/combo/detail/3.html">服务套餐</a></li>
                        <li>
                        <a href="/product/2018">工商服务</a></li>
                        <li>
                        <a href="/product/2016">知识产权</a></li>
                        <li>
                        <a href="/product/2017">财会税务</a></li>
                        <li>
                        <a href="/product/2011">行政审批</a></li>
                        <li>
                        <a href="/product/2020">增值服务</a></li>
                        <li>
                        <a href="/product/20120">海外注册</a></li>
                        </ul>-->
                </div>
            </div>
            <div class="pull-right clearfix">
                <div class="topbar-right user-info pull-right clearfix">
                    <div class="pull-left">
                        <span>欢迎来到巍诺商务股份有限公司！</span>
                    </div>
                    <i class="pull-left"></i>
                    <!--<span class="topbar-tel pull-left pl10 pr10">4006-798-999</span>-->
                    <div class="pull-left">|</div>
                    <div id="personal-list-index" class="js-already-login is-login hide pull-left posr ml10">
                        <a href="/my/order_list.html" class="js-topState-userName"></a>
                        <div class="personal-list-index posa">
                            <i class="personal-list-top posa"></i>
                            <ul class="pt10 pb10">
                                <li class="pl10 pr10">
                                    <a href="/my/order_list.html" title="我的订单" class="show p0 m0">
                                        <i class="personal-list-ico0"></i>我的订单</a>
                                </li>
                                <li class="pl10 pr10">
                                    <a href="/my/coupon.html" title="我的优惠券" class="show p0 m0">
                                        <i class="personal-list-ico1"></i>我的优惠券</a>
                                </li>
                                <li class="pl10 pr10">
                                    <a href="/my/account.html" title="安全设置" class="show p0 m0">
                                        <i class="personal-list-ico3"></i>安全设置</a>
                                </li>
                                <li class="js-already-login js-logout pl10 pr10">
                                    <a href="javascript:void(0);" title="安全退出" rel="nofollow" class="show p0 m0">
                                        <i class="personal-list-ico8"></i>安全退出</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="js-no-login pull-left ml10">
                        <!-- <a _href="/?m=member&amp;c=index&amp;a=login" rel="nofollow" class="login pull-left js-loginPopup mr10">登录</a>
                            <div class="pull-left">|</div>
                            <a _href="/?m=member&amp;c=index&amp;a=register" rel="nofollow" class="register sp pull-left js-registPopup ml10">注册</a>-->
                    </div>
                    <!--<div class="pull-left ml10">|</div>-->
                    <a href="{{url("list/4")}}" rel="nofollow" target="_blank" class="pull-left ml10">企业服务</a>
                    <div class="pull-left ml10">|</div>
                    <a href="{{url('/factory')}}" rel="nofollow" target="_blank" class="pull-left ml10">商业保理</a>
                    <!--<div class="pull-left ml10">|</div>
                        <a href="/item/1824.html" rel="nofollow" target="_blank" class="pull-left ml10">专家问诊</a>--></div>
            </div>
        </div>
    </div>
</div>
<div class="banner">
    <div class="banner1">私募基金公司备案</div>
    <!--<div class="banner2"><img src="images/yuan.png" style="width: 20px;height: 20px">十年经验政策全掌握</div>-->
    <div class="banner2">
        <img src="{{asset("images/dian.png")}}" style="width: 20px;height: 20px;display: inline-block;">十年办理经验</div>
    <div class="banner3" style="margin-left: 449px;">
        <img src="{{asset("images/dian.png")}}" style="width: 20px;height: 20px;display: inline-block;">政策全掌握</div>
    <div class="banner4">
        <img src="{{asset("images/dian.png")}}" style="width: 20px;height: 20px;display: inline-block;">一站式办理更方便</div>
    <div class="banner3" style="margin-left: 449px;">
        <img src="{{asset("images/dian.png")}}" style="width: 20px;height: 20px;display: inline-block;">千余家客户案例</div>
    <!--<a href="javascript:;" class="zixun_a js-openchat">立即咨询</a>-->
</div>
</div>
<div class="center1">
    <h3>
        <span class="left_bg"></span>什么是私募基金
        <span class="right_bg"></span>
    </h3>
    <p>私募基金是一种利益共享、风险共担的集合投资制度，由众多不确定投资者自愿将不同的出资份额汇集起来，交由专业基金管理
        <br>机构和人员管理投资，所得收益由投资者按出资比例分享的一种金融组织。</p>
    <ul>
        <li class="img_bg">公司型基金
            <img src="{{asset("images/left_t.png")}}">
        </li>
        <li>有限合伙型基金</li>
        <li>契约式基金</li>
        <li>虚拟式基金</li>
        <li>组合式基金</li>
        <li class="img_bg1">信托制基金
            <img src="{{asset("images/right_b.png")}}">
        </li>
    </ul>
</div>
<div class="center2">
    <h3>
        <span class="left_bg"></span>注册私募基金公司条件
        <span class="right_bg"></span>
    </h3>
    <p class="tit">私募基金公司是指对基金的募集、基金份额的申购和赎回、基金财产的投资、收益分配等基金运作活动进行管理的公司</p>
    <ul class="tab1 tab0 tablewd">
        <li class="aaa">投资型基金公司</li>
        <li>管理型基金公司</li>
    </ul>
    <div id="tab_0" class="list">
        <b>投资型基金公司注册条件</b>
        <p>经营范围：非证券业
            <br>务的投资、投资管理，
            <br>咨询</p>
        <p>注册资金5亿，设立时
            <br>可以实缴至少1亿元</p>
        <p>单个出资人出资不得
            <br>少于1000万元</p>
        <p>组织形式：有限公司
            <br>有限合伙</p>
        <p>可为风险投资基金、
            <br>股权投资基金、投资
            <br>基金等字样</p>
        <p class="last">经国务院批准的中国
            <br>证券基金业协会规定
            <br>的其他条件</p>
    </div>
    <div id="tab_1" class="list">
        <b>管理型基金公司注册条件</b>
        <p>经营范围：非证券业
            <br>务的投资管理、咨询</p>
        <p>注册资金3000万元以
            <br>上，所有股东单个出
            <br>资不少于100万元</p>
        <p>至少三名高管具备股
            <br>权投资管理经验或者
            <br>相关业务的管理经验</p>
        <p>企业设立后可到相关
            <br>的监管机构进行备案
            <br>接受监管</p>
        <p>组织形式：有限合伙
            <br>有限公司</p>
        <p class="last">可为基金管理公司等
            <br>字样</p>
    </div>
    <a href="javascript:;" class="whrite_bg1 js-openchat">咨询一下 是否符合条件</a>
</div>
<div class="center3">
    <h3>
        <span class="left_bg"></span>注册私募基金公司流程
        <span class="right_bg"></span>
    </h3>
    <div class="xian_t">
        <ul>
            <li>
                <img src="{{asset("images/liu-cheng0.jpg")}}">
                <span>核名</span></li>
            <img src="{{asset("images/position.jpg")}}" class="poster">
            <li>
                <img src="{{asset("images/liu-cheng1.jpg")}}">
                <span>工商信息</span></li>
            <img src="{{asset("images/position.jpg")}}" class="poster">
            <li>
                <img src="{{asset("images/liu-cheng2.jpg")}}">
                <span>预约交件</span></li>
            <img src="{{asset("images/position.jpg")}}" class="poster">
            <li>
                <img src="{{asset("images/liu-cheng3.jpg")}}">
                <span>出执照</span></li>
            <img src="{{asset("images/position.jpg")}}" class="poster">
            <li>
                <img src="{{asset("images/liu-cheng4.jpg")}}">
                <span>刻章</span></li>
            <img src="{{asset("images/position.jpg")}}" class="poster">
            <li>
                <img src="{{asset("images/liu-cheng5.jpg")}}">
                <span>银行开户许可证</span></li>
            <img src="{{asset("images/position.jpg")}}" class="poster">
            {{--<li>--}}
                {{--<img src="{{asset("images/liu-cheng6.jpg")}}">--}}
                {{--<span>入资、验资报告</span></li>--}}
        </ul>
    </div>
</div>
<div class="center4">
    <h3>
        <span class="left_bg"></span>如果您准备同我们合作 您需要准备
        <span class="right_bg"></span>
    </h3>
    <ul>
        <li class="t2">《企业设立登记申请书》</li>
        <li class="t2">公司章程</li>
        <li class="t1">法人身份证.1份
            <br>个人简历.1份
            <br>一寸照片.2张</li>
        <li class="t1">股东的法人资格证明
            <br>或者自然人身份证明</li>
        <li class="t2">股东出资人身份证明</li>
        <li class="last t2">工商注册登记
            <br>要求的其他材料</li>
    </ul>
    <a href="javascript:;" class="whrite_bg1 js-openchat">立即咨询 获取材料清单</a>
</div>
<div class="center5">
    <h3>
        <span class="left_bg"></span>私募基金 我们还能为您做
        <span class="right_bg"></span>
    </h3>
    <ul class="tab1 tab2">
        <li class="aaa">法律意见书</li>
        <li>私募基金管理人备案</li>
        <li>私募基金产品备案</li>
    </ul>
    <div id="huan_0" class="list2 fn-clear">
        <p>自2016年2月5日起，新申请私募基金管理人登记机构，需通过私募基金登记备案系统提交《私募基金管理人登记法律意见书》作为必备申请材料</p>
        <ul class="list0_ul1 fn-clear">
            <li class="li0">法律意见书
                <br>具体适用情形</li>
            <li class="li1">
                <div class="d1">《公告》发布后新申请登记的</div>
                <div class="d2">已登记且尚未备案基金产品的</div>
                <div class="d3">已登记且备案私募产品的</div>
                <div class="d4">已登记的私募基金管理人有重大事项变更的</div>
                <div class="d5">需将法律意见书作为必备的申请材料</div>
                <div class="d6">应在首次私募基金产品时补提</div>
                <div class="d7">中国基金业协会将视具体情形要求补提</div>
                <div class="d8">提交《重大事项变更专项法律意见书》</div>
            </li>
        </ul>
        <ul class="list0_ul2 fn-clear">
            <h3>法律意见书内容要求</h3>
            <li>◇登记申请材料</li>
            <li>◇工商登记情况</li>
            <li>◇专业化经营情况</li>
            <li>◇股权结构</li>
            <li>◇实际控制人</li>
            <li>◇关联方及分支机构情况</li>
            <li>◇运营基本设施和条件</li>
            <li>◇风险管理制度和</li>
            <li>◇内部控制制度</li>
            <li>◇外包情况</li>
            <li>◇合法合规情况</li>
            <li>◇高管人员资质情况</li>
        </ul>
    </div>
    <div id="huan_1" class="list2">
        <p>根据中国证券投资基金业协会相关规定，私募基金管理人应当向基金业协会履行基金管理人登记手续并申请成为基金业协会会员</p>
        <ul class="list_ul1">
            <b>私募基金管理人备案流程</b>
            <li>
                <span>1</span>注册账号</li>
            <li>
                <span>2</span>填写会员代表信息</li>
            <li>
                <span>3</span>管理人登记</li>
            <p class="p1">暂缓登记</p>
            <li>
                <span>4</span>填写管理人基本信息</li>
            <li>
                <span>5</span>协会处理</li>
            <li>
                <span>6</span>补充信息</li>
            <p class="p2">20个工作日内
                <br>完成登记</p>
        </ul>
        <ul class="list_ul2">
            <b>私募基金管理人备案材料</b>
            <p class="p1">工商登记
                <br>营业执照正副本复印件</p>
            <p class="p2">高级管理人员
                <br>的基本信息</p>
            <li>公司章程或者
                <br>合伙协议</li>
            <li>主要股东或者
                <br>合伙人名单</li>
            <li class="last">基金业协会规定
                <br>的其他信息</li>
        </ul>
    </div>
    <div id="huan_2" class="list2">
        <p>私募基金管理人应当在私募基金募集完毕后20个工作日内，通过私募基金登记备案系统进行备案，并根据私募基金的主要投资
            <br>方向注明基金类别，如实填报基金名称、资本规模、投资者、基金合同等基本信息。</p>
        <div class="list2_div_left">
            <b>私募基金产品备案的必要性</b>
            <ul class="list2_div_ul1">
                <li>提高投资者利益保障</li>
                <li>明确投资者投资方向</li>
                <li class="last">保障金融市场健康运作</li>
            </ul>
            <ul class="list2_div_ul2">
                <li>提升公司的
                    <br>可信度</li>
                <li>增强产品的
                    <br>真实性</li>
                <li>规范化运作
                    <br>基金产品</li>
                <li class="last">更好的发行和
                    <br>募集资金</li>
            </ul>
        </div>
        <div class="list2_div_right">
            <b>私募基金产品备案流程和材料</b>
            <ul class="list2_div_ul3">
                <strong>流程</strong>
                <li>
                    <span>1</span>管理人登录系统</li>
                <li>
                    <span>2</span>填写基金基本信息</li>
                <li>
                    <span>3</span>协会处理</li>
                <li class="last">
                    <span>4</span>20个工作日内
                    <br>公示完成备案</li>
            </ul>
            <ul class="list2_div_ul4">
                <strong>材料</strong>
                <li>基金类别</li>
                <li>基金合同</li>
                <li class="last">公司章程合伙协议</li>
                <li>招募说明书</li>
                <li>托管协议</li>
                <li class="last">基金业规定的其他信息</li>
            </ul>
        </div>
    </div>
    <!-- <a href="javascript:;" class="hei_bg1 js-openchat">立即咨询 获取材料清单</a> -->
</div>
<div class="center6">
    <h3>
        <span class="left_bg"></span>巍诺服务保障
        <span class="right_bg"></span>
    </h3>

    <ul class="center6_list" style="">
        <li class="color1">
            <!-- <img src="images/11_03.jpg"> -->
            <span>经验丰富</span>
            <p>10年经验为您保驾护航</p>
        </li>
        <li class="color2">
            <!-- <img src="images/11_05.jpg"> -->
            <span>一站式服务</span>
            <p>各个环节保障服务顺畅</p>
        </li>
        <li class="last color1">
            <!-- <img src="images/11_08.jpg"> -->
            <span>一对一高效服务</span>
            <p>专业对接人员,帮你节省不必要环节</p>
        </li>
        <li class="color2">
            <!-- <img src="images/11_20.jpg"> -->
            <span>信息保密</span>
            <p>自有服务器保障客户数据安全
                <br>专人保障客户资料免遭外泄</p>
        </li>
        <li class="color1">
            <!-- <img src="images/11_16.jpg"> -->
            <span>专业品质</span>
            <p>服务均由3年以上资深人士操作保障品质</p>
        </li>
        <li class="last color2">
            <!-- <img src="images/11_18.jpg"> -->
            <span>全程服务</span>
            <p>售前咨询，关键环节100%提醒</p>
        </li>
    </ul>
</div>

<!--您可能还需要-->
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
<!--<div class="index-warp content">
    <div class="index-title clearfix">
    <i class="icon10 fl"></i>
    <div class="fl h2">
    <img src="images/left_bg.png">
    合作伙伴
    <img src="images/right_bg.png"></div>
    <table class="index-hzhb">
    <tr>
    <tr>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    </tr>
    <tr>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    <td>
    <img src="images/29105614g0zz.jpg"></td>
    </tr>
    </table>
    </div>-->
<!--<div class="box8">
    <h3>合作伙伴</h3>
    <img src="images/rzzl_img15.jpg"></div>
    <div style="display:none;">
    <script language="javascript" type="text/javascript" src="http://js.users.51.la/17456573.js"></script>
    <noscript>
    <a href="http://www.51.la/?17456573" target="_blank">
    <img alt="我要啦免费统计" src="http://img.users.51.la/17456573.asp" style="border:none"></a>
    </noscript>
    </div>
    -->
<!-- topicBody的block只用作兼容老版本，新的专题页面不要用，请使用content-->
<!--Created by liliy_000 on 2016/6/27.-->
<!-- <footer class="bt0 fp-auto-height fp-section">
    <div class="container pb30"><div class="min-container">
    <div class="footer-info pt30 pb30 clearfix">
    <div class="pull-left">
    <i class="pull-left mr10 fi-icon1"></i>
    <span class="pull-left">全程服务</span>
    <em class="pull-left">售前咨询，下单24小时内响应，关键环节100%提醒</em></div>
    <div class="pull-left">
    <i class="pull-left mr10 fi-icon2"></i>
    <span class="pull-left">品质保障</span>
    <em class="pull-left">所有产品保证服务质量由专业人士进行操作</em></div>
    <div class="pull-left"><i class="pull-left mr10 fi-icon3"></i>
    <span class="pull-left">多元产品</span>
    <em class="pull-left">提供TMT/文创等20多项领域服务支持</em></div>
    <div class="pull-left">
    <i class="pull-left mr10 fi-icon4"></i>
    <span class="pull-left">安全送到</span>
    <em class="pull-left">办理完成后所有材料精心包装，快递直达</em></div>
    <div class="pull-left">
    <i class="pull-left mr10 fi-icon5"></i>
    <span class="pull-left">信息保密</span>
    <em class="pull-left">所有客户信息严格保密，保护客户信息免遭外泄</em></div>
    </div>
    <div class="footer-nav pt30 clearfix">
    <ul class="col-xs-7">
    <li class="pull-left">
    <span class="pb10">公司宝</span>
    <a href="/zxdt/ " target="_blank">最新动态</a>
    <a href="/about/ " target="_blank" rel="nofollow">关于我们</a>
    <a href="/about/lxwm/ " target="_blank" rel="nofollow">联系我们</a>
    <a href="/about/jrwm/ " target="_blank" rel="nofollow">加入我们</a>
    <a href="/zhishiku/ " target="_blank">知识库</a></li>
    <li class="pull-left">
    <span class="pb10">订单服务</span>
    <a href="/help/ddfw/detail/14.html " target="_blank" rel="nofollow">购买流程</a>
    <a href="/help/ddfw/detail/8.html " target="_blank" rel="nofollow">索取发票</a>
    <a href="/help/ddfw/detail/7.html " target="_blank" rel="nofollow">退款说明</a>
    <a href="/help/ddfw/detail/6.html " target="_blank" rel="nofollow">支付方式</a></li>
    <li class="pull-left">
    <span class="pb10">特色服务</span>
    <a href="/help/tsfw/detail/11.html " target="_blank" rel="nofollow">精英团队</a>
    <a href="/help/tsfw/detail/10.html " target="_blank" rel="nofollow">一对一贴心服务</a>
    <a href="/help/tsfw/detail/9.html " target="_blank" rel="nofollow">精美包装</a></li>
    <li class="pull-left">
    <span class="pb10">售后服务</span>
    <a href="/help/shff/detail/12.html " target="_blank" rel="nofollow">售后服务政策</a>
    <a href="/help/shff/detail/13.html " target="_blank" rel="nofollow">线下服务中心</a>
    <a href="/ask_3/1.html " target="_blank">问答</a><a href="/wiki/ " target="_blank">百科</a>
    <a href="/case/ " target="_blank">成功案例</a></li><li class="pull-left">
    <span class="pb10">热门产品</span>
    <a href="/search/result.html?keywords= " target="_blank" rel="nofollow">服务搜索</a>
    <a href="http://www.gongsibao.com/item/75.html?catid=200 " target="_blank">公司注册</a>
    <a href="/product/20162 " target="_blank">增值电信</a><a href="/product/2016 " target="_blank">知识产权</a>
    <a href="/zt/project/neeq/index.html " target="_blank">新三板上市</a></li>
    </ul>
    -->
<!-- <div class="col-xs-5">
    <div class="contact-way pull-right">
    <div class="clearfix pb15">
    <i class="pull-left mr15 c-icon1"></i>
    <span class="pull-left italic">4006-798-999</span>
    <em class="pull-left">客服电话</em></div>
    <div class="clearfix pb15">
    <i class="pull-left mr15 c-icon4"></i>
    <span class="pull-left italic">总经理邮箱</span>
    <em class="pull-left">kefu@gongsibao.com</em></div>
    <div class="clearfix pb15 btm-zixun js-openchat">
    <i class="pull-left mr10 c-icon2"></i>
    <span class="pull-left italic">在线客服</span>
    <em class="pull-left">服务时段 8:00-20:00</em></div>
    <div class="clearfix pb10">
    <i class="pull-left mr10 c-icon3"></i>
    <span class="pull-left italic">商务合作</span>
    <em class="pull-left">hezuo@gongsibao.com</em></div>
    </div>
    <div class="code-warp clearfix">
    <span class="code pull-left clearfix">
    <span>关注服务号</span>
    <div class="codes">
    <img src="http://gsb-public.oss-cn-beijing.aliyuncs.com/www/ewm-up.png"></div>
    </span>
    <span class="code pull-right clearfix">
    <span>关注订阅号</span>
    <div class="codes">
    <img src="http://gsb-public.oss-cn-beijing.aliyuncs.com/www/ewm-down.jpg"></div>
    </span>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="index-footer">
    <div class="container">
    <div class="min-container">
    <div class="friendly-link pb20">
    <h5>
    <a href="/zt/project/friend/index.html" target="_blank" style="font-weight:700">友情链接</a></h5>
    <p class="clearfix">
    <a href="http://www.chykw.gov.cn/Default.aspx" rel="nofollow" title="北京市朝阳区科委" target="_blank" class="pull-left pr30">北京市朝阳区科委</a>
    <a href="http://www.sinotone.net.cn" rel="nofollow" title="汉唐咨询" target="_blank" class="pull-left pr30">汉唐咨询</a>
    <a href="http://www.sinotone.net.cn/" rel="nofollow" title="汉唐企业加速器" target="_blank" class="pull-left pr30">汉唐企业加速器</a>
    <a href="http://www.callcentermkt.com" rel="nofollow" title="呼叫中心" target="_blank" class="pull-left pr30">呼叫中心</a>
    <a href="/zt/project/neeq/index.html" rel="nofollow" title="中国新三板" target="_blank" class="pull-left pr30">中国新三板</a>
    <a href="http://www.sinotone.cc/" rel="nofollow" title="网络游戏" target="_blank" class="pull-left pr30">网络游戏</a>
    <a href="http://www.dianxinzengzhi.com/" rel="nofollow" title="增值电信" target="_blank" class="pull-left pr30">增值电信</a>
    <a href="/item/15.html" rel="nofollow" title="增值电信经营许可证" target="_blank" class="pull-left pr30">增值电信经营许可证</a>
    <a href="http://www.wenwangwendb.com" rel="nofollow" title="网络文化经营许可证" target="_blank" class="pull-left pr30">网络文化经营许可证</a>
    <a href="http://www.icpbeijing.com/" rel="nofollow" title="北京ICP" target="_blank" class="pull-left pr30">北京ICP</a>
    <a href="http://www.sinoccnt.com/" rel="nofollow" title="游戏备案" target="_blank" class="pull-left pr30">游戏备案</a>
    <a href="http://www.nash.work/" rel="nofollow" title="纳什空间" target="_blank" class="pull-left pr30">纳什空间</a>
    <a href="http://www.wezgc.com" rel="nofollow" title="创新创业中关村" target="_blank" class="pull-left pr30">创新创业中关村</a>
    <a href="http://www.430001.com/" rel="nofollow" title="登陆新三板" target="_blank" class="pull-left pr30">登陆新三板</a>
    <a href="http://www.dmlei.com" rel="nofollow" title="数字营销" target="_blank" class="pull-left pr30">数字营销</a>
    <a href="http://yiqihecheng.cc" rel="nofollow" title="一气呵成" target="_blank" class="pull-left pr30">一气呵成</a>
    <a href="http://www.2cyj.com/" rel="nofollow" title="二次元界" target="_blank" class="pull-left pr30">二次元界</a>
    <a href="http://www.falvxiaoba.com" rel="nofollow" title="法律小巴" target="_blank" class="pull-left pr30">法律小巴</a>
    <a href="http://www.qifengle.com" rel="nofollow" title="起风了" target="_blank" class="pull-left pr30">起风了</a>
    <a href="http://www.apicloud.com" rel="nofollow" title="APICloud" target="_blank" class="pull-left pr30">APICloud</a>
    <a href="http://www.315pr.com" rel="nofollow" title="三点一刻" target="_blank" class="pull-left pr30">三点一刻</a>
    <a href="http://pku.pkusp.com.cn" rel="nofollow" title="北大科技园" target="_blank" class="pull-left pr30">北大科技园</a>
    <a href="http://www.prguanjia.com" rel="nofollow" title="传播管家" target="_blank" class="pull-left pr30">传播管家</a></p>
    </div>
    <div class="footer-bq clearfix">
    <a id="___szfw_logo___" href="https://credit.szfw.org/CX20150907011230080181.html" target="_blank"></a>
    <span class="pl10">Copyright © 1998-2017 gongsibao All Rights Reserved 版权所有：汉唐信通（北京）科技有限公司 京ICP证150505号 京ICP备14043829号-2 Beta 3.0</span></div>
    </div>
    </div>
    </div>
    </footer>
    -->
@php
    $webkey = \App\Web::all();
    if(count($webkey)==0){
        $webkey = new \App\Web();
    }else{
    $webkey = $webkey->first();
    }
@endphp
<div class="footer_space">
    <div class="content pb30">
        <div class="footer-nav pt30 clearfix">
            <ul class="col-xs-3">
                <li class="fl" style="width: 33%;padding: 0px">
                    <span class="pb10"></span>
                    <a href="http://wn.budgroup.cn/about" target="_blank">关于我们</a>
                    <a href="http://wn.budgroup.cn/contact" target="_blank">联系我们</a>
                    <a href="http://wn.budgroup.cn/articlelist/5" target="_blank">最新动态</a>
                </li>
                <li class="fl" style="width: 33%;padding: 0px"><span class="pb10">特色服务</span>
                    <a>一对一贴心服务</a>
                    <a>精英团队</a>
                </li>
                <li class="fl" style="width: 33%;padding: 0px"><span class="pb10">热门产品</span>
                    <a href="http://wn.budgroup.cn/investment">境外投资</a>
                    <a href="http://wn.budgroup.cn/financing">融资租赁</a>
                    <a href="http://wn.budgroup.cn/list/5">公司注册</a>
                    <a href="http://wn.budgroup.cn/gongsizhuxiao">注销公司</a>
                    <a href="http://wn.budgroup.cn/ckts">出口退税</a>
                </li>
            </ul>
            <div class="col-xs-5">
                <div class="contact-way pull-right">
                    <div class="clearfix pb15"><i class="fl mr10 c-icon1"></i><span class="fl italic" style="padding-bottom: 5px;">客服电话</span><em class="fl">400-628-2203</em></div>
                    <div class="clearfix pb15"><i class="fl mr15 c-icon4"></i><span class="fl italic" style="padding-bottom: 5px;">总经理邮箱</span><em class="fl">tomzhong@winnerchina.biz</em></div>
                    <div class="clearfix pb15 btm-zixun js-openchat2"><i class="fl mr10 c-icon2"></i><span class="fl italic" style="padding-bottom: 5px;">投诉建议</span><em class="fl">服务时段 8:45-5:15</em></div>
                    <div class="clearfix pb10"><i class="fl mr10 c-icon3"></i><span class="fl italic" style="padding-bottom: 5px;">商务合作</span><em class="fl">bensonzhong@winnerchina.biz</em></div>
                </div>
                <div class="" style="margin-left: 0px;">
                        <span class="fl" style="text-align: center;margin-right: 10px;">
                        <span>关注服务号</span>
                        <div class="codes"><img src="{{asset("uploads/$webkey->fuwu")}}" style="height: 121px;width: 121px;"></div>
                        </span>
                </div>
                <div class="" style="margin-left: 0px">
                       <span class="f1" >
                        <span style="padding-left: 26px;">关注订阅号</span>
                        <div class="codes"><img src="{{asset("uploads/$webkey->dingyue")}}" style="height: 121px;width: 121px;"></div>
                        </span>
                </div>

                {{--<div class="codes"></div></span>--}}
            </div>
            <div class="col-xs-4">
                {{--<img src="{{asset("images/logo.png")}}" style="position: absolute ;top: 50px;left: -40px;width: 483px">--}}
                {{--<img src="{{asset("images/slogo.png")}}" width="400px" style="    width: 150px;--}}
    {{--margin-left: 140px;margin-top: 50px">--}}
            </div>
        </div>
    </div>

    <!-- 页脚的友链 -->
    <div class="index-footer">
        <div class="content">
            <div class="friendly-link pb20">
                <h5>
                    <a style="font-weight:700">友情链接</a>
                </h5>
                @php
                $yqljs = \App\Friend::where('status','=','1')->get();
                @endphp
                <p class="clearfix">
                    @foreach($yqljs as $p)
                        <a href="{{$p->link}}" rel="nofollow" title="" target="_blank" class="fl pr30">{{$p->name}}</a>
                    @endforeach
                </p>
            </div>
            <div class="footer-bq clearfix">
                    <span class="pl10">
                        <p style="display: inline-block">{{$webkey->allright}}</p>
                          技术支持：
                        <a href="https://www.mengyakeji.com/" style="width: auto;float: initial;margin: 0;background: none">萌芽科技</a>
                    </span>

            </div>
        </div>
    </div>
    <div class="footer" style="background-color:#5185b7 ">
        <div class="f_wrap">
            <ul class="clearfix">
                <li style="margin-right: 134px;margin-left: 140px;">
                    <span class="mobile">卢经理：021-58690080  18017387002</span>
                </li>
                <li style="margin-right: 205px;">
                    <a style="color: #fff;" target="_blank" href="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2211894228%22%2C%22userId%22%3A%227727567%22%2C%22pageId%22%3A0%7D" class="online">联系在线客服</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<footer class="bt0 fp-auto-height fp-section">

    <div id="gototop" data-toggle="gototop" class="hide"></div>

    <!--小助手-->
    <!--<div class="float-assistant posf">
        <div class="posa assistant-jiao"></div>
        <div class="posa assistant-warp">
        <div class="assistant-tab">
        <a href="/zzgsqm/index.jhtml">自助公司起名</a>
        <a href="/zzhzgsm/index.jhtml">自助核准公司名</a>
        <a href="/sbcx/index.jhtml">商标查询</a>
        <a href="/zlcx/index.jhtml">专利查询<span></span></a>
        <a href="/zzqcx/index.jhtml">著作权查询<span></span></a></div>
        </div>
        </div>-->
    <div class="float-ewm">
        <span></span>
    </div>
    <!--在线客服-->
    {{--<aside class="consult">--}}
        {{--<div class="tit">--}}
            {{--<div class="img">--}}
                {{--<img src="{{asset("images/consult_tit.png")}}" alt="在线咨询">--}}
            {{--</div>--}}
            {{--<a href="http://p.qiao.baidu.com/cps2/chatIndex?reqParam=%7B%22from%22%3A0%2C%22sid%22%3A%22-100%22%2C%22tid%22%3A%22-1%22%2C%22ttype%22%3A1%2C%22siteId%22%3A%2211894228%22%2C%22userId%22%3A%227727567%22%2C%22pageId%22%3A0%7D">--}}
                {{--<h3 style="margin-top: -10px;">在线咨询</h3>--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--<ul>--}}
            {{--<li>--}}
                {{--<p style="font-size: 12px;padding: 0px;margin-left: -10px;">021-58690080</p>--}}
                {{--<p style="font-size: 12px;padding: 0px;margin-left: -10px;">18017387002</p>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</aside>--}}
    <div class="js-openchat float-kefu"></div>
    <!--Created by shenshen on 16/1/8.-->
    <script>
        var _hmt = _hmt || [];
        (function () {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?96e0e530c77719ca647dcaeea13678fb";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <script type="text/javascript" src="http://static.gongsibao.com/js/4279288306afb2d647e3/common.js"></script>
{!! $webkey->shangqiao !!}
</body>

</html>