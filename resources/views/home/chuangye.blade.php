@extends("layout.home")
@section("css")
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="css/swiper.min.css">
    <script src="js/swiper-3.3.1.min.js"></script>
    <script src="js/common.js"></script>
    <script src="js/click_event.js"></script>
    <link rel="stylesheet" href="css/top_style.css">
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
    <link rel="stylesheet" href="css/footer_style.css">
    <script src="js/assistant.js"></script>
    <script src="js/new_assistant.js"></script>
@endsection
@section("js")

@endsection


@section("content")
    <div class="header mb20"></div>
    <div class="assistant-nav">
        <div class="content clearfix">
            <input type="hidden" id="cs" value="/statics/zzgsqm/index.jhtml">
            <a href="{{url('chuangye1')}}" class="fl select">自助公司起名
            </a>
            <a href="{{url('chuangye2')}}" class="fl ">自助核准公司名
            </a>
        </div>
    </div>
    <div class="com_name_line"></div>
    <div class="com_name_serch">
        <form onsubmit="return false">
            <div class="com_name_content">
                <div class="fl com_name_element">
                    <p class="com_name_element_text">请输入公司所在城市，如：上海</p>
                    <p><input name="cityname" onkeypress="huiche('cityname')" id="cityname" type="text" value="上海" onchange="check_word('cityname')" onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''" onFocus="if (value =='上海'){value =''}" onBlur="if (value ==''){value='上海'}"></p>
                </div>
                <div class="fl com_name_element">
                    <p class="com_name_element_text">请输入公司行业，如：科技</p>
                    <p><input type="text" onkeypress="huiche('btname')" name="btname" id="btname" value="咨询" onchange="check_word('btname')" onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''" onFocus="if (value =='咨询'){value =''}" onBlur="if (value ==''){value='咨询'}" autocomplete="off" onclick="industry_open_btname()">
                    <div class="fl arr_bottom_icon arr_bottom_icon_position_inside"></div>
                    </p>
                    <div class="industry_result" id="industry_result_btname" style="display: none;" onmouseleave="industry_close_btname('')">
                        <div class="title">
                            热门行业
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('科技')">
                            科技
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('信息技术')">
                            信息技术
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('互联网')">
                            互联网
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('网络科技')">
                            网络科技
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('电子商务')">
                            电子商务
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('国际贸易')">
                            国际贸易
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('贸易')">
                            贸易
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('销售')">
                            销售
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('实业')">
                            实业
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('工贸')">
                            工贸
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('广告')">
                            广告
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('设计')">
                            设计
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('传媒')">
                            传媒
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('文化传播')">
                            文化传播
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('文化传媒')">
                            文化传媒
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('建筑')">
                            建筑
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('装饰装潢')">
                            装饰装潢
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('工程')">
                            工程
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('房地产中介')">
                            房地产中介
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('物业管理')">
                            物业管理
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('管理咨询')">
                            管理咨询
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('投资管理')">
                            投资管理
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('企业管理')">
                            企业管理
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('餐饮管理')">
                            餐饮管理
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('酒店管理')">
                            酒店管理
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('农业')">
                            农业
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('化妆品')">
                            化妆品
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('教育培训')">
                            教育培训
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('美容美发')">
                            美容美发
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('电子')">
                            电子
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('制造')">
                            制造
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('游戏')">
                            游戏
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('医疗')">
                            医疗
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('服饰')">
                            服饰
                        </div>
                        <div class="industry_element fl" onclick="industry_close_btname('物流')">
                            物流
                        </div>
                    </div>
                </div>
                <div class="fl com_name_element">
                    <p class="com_name_element_text">请选择公司组织形式</p>
                    <p>
                        <input  readonly="readonly" type="text"  onkeypress="huiche('triangle_value')" onclick="industry_qiming_open()" style="display: block;border-right:none;" name="organizational" id="triangle_value" onchange="check_word('triangle_value')" value="有限公司" onmouseover="this.style.borderColor='#ff5a86'" onmouseout="this.style.borderColor=''" onFocus="if (value =='有限公司'){value =''}" onBlur="if (value ==''){value='有限公司'}" autocomplete="off">
                    <div class="fl arr_bottom_icon arr_bottom_icon_position_inside"></div>
                    </p>
                    <div class="industry_result" id="industry_result" style="display: none;" onmouseleave="industry_close('')">
                        <div class="title">
                            常见组织形式
                        </div>
                        <div class="industry_element fl" onclick="industry_close('有限公司')">
                            有限公司
                        </div>
                        <div class="industry_element fl" onclick="industry_close(' 有限合伙公司')">
                            有限合伙公司
                        </div>
                    </div>
                </div>
                <input type="button" value="查看推荐公司名" onclick="sub()" class="com_name_submit">
            </div>
        </form>
    </div>
    <div class="cnm_name_create_res" id="cnm_name_create_res" style="display: none;">
        <div class="title">推荐名称</div>
        <div class="title_line"></div>
        <div class="loading" id="loading" style="display: none;">加载中...</div>
        <div class="label_space" id="label_names">
        </div>
        <div class="title">已选名称</div>
        <div class="title_line"></div>
        <div class="select_space" id="selspa">
        </div>
        <div class="select_space_all" style="display: none;">
        </div>
        <div class="submit_button"><input type="button" value="咨询选中的名字" onclick="com_name_submit();"></div>
    </div>
    <div class="cnm_name_audit_bottom" id="cnm_name_audit_bottom" style="display: none;"></div>
    <div class="com_name_cautions" style="display: block;">
        <div class="dqm_start"></div>
        <div class="dqm_end"></div>
        <div id="cautions_select_0" class="com_name_cautions_left fl" style="display: none;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                企业名称应当使用汉字，民族自治地方的企业名称可以同时使用本民族自治地方通用的民族文字。企业使用外文名称的，其外文名称应当与中文名称相一致，并报登记主管机关登记注册。
            </div>
        </div>
        <div id="cautions_select_1" class="com_name_cautions_left fl" style="display: block;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                <em>企</em>业名称应当使用汉字，民族自治地方的企业名称可以同时使用本民族自治地方通用的民族文字。企业使用外文名称的，其外文名称应当与中文名称相一致，并报登记主管机关登记注册。
            </div>
        </div>
        <div id="cautions_select_2" class="com_name_cautions_left fl" style="display: none;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                《<em>企</em>业名称登记管理规定》第六条规定：“企业只准许用一个名称，在登记主管机关辖区内不得与已登记注册的同行业企业名称相同或者近似”。
            </div>
        </div>
        <div id="cautions_select_3" class="com_name_cautions_left fl" style="display: none;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                <em>通</em>用词语是指特定种类的商品或服务约定成俗的、普遍使用的词语。如“好吃堡”中的“好吃”为通用词，因此不能作为名称来注册公司。
            </div>
        </div>
        <div id="cautions_select_4" class="com_name_cautions_left fl" style="display: none;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                <em>字</em>号的字音相同或字号的字形近似，行业表述文字相同或者含义相同，足以造成公众误解的。所以避免与知名公司相近。
            </div>
        </div>
        <div id="cautions_select_5" class="com_name_cautions_left fl" style="display: none;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                <em>驰</em>名商标本身蕴含着无限的商业价值，事实上存在有些企业有意或者无意将他人的驰名商标作为自己的企业名称使用。《商标法实施条例》和《保护规定》明确规定，当事人认为他人将其驰名商标作为企业名称登记，可能欺骗公众或者对公众造成误解的，可以向企业名称登记主管机关申请撤销该企业名称，企业登记主管机关应当依照《企业名称登记管理规定》处理。
            </div>
        </div>
        <div id="cautions_select_6" class="com_name_cautions_left fl" style="display: none;">
            <div style="height: 60px;"></div>
            <div class="left_text">
                <div class="bod"></div>
                <em>企</em>业有正当理由可以使用本地或者异地地名作字号，但不得使用县以上行政区划名称作字号。
            </div>
        </div>
        <div class="com_name_cautions_right fl">
            <div style="height: 60px;"></div>
            <div class="right_text">
                <div class="title">
                    公司起名注意事项
                </div>
                <div class="elements">
                    <div id="element_select_1" class="element_select" onmouseover="cautions_omover(1)">
                        <div id="number_select_1" class="number_select fl">1</div>
                        只能使用简体中文
                    </div>
                    <div id="element_select_2" class="element" onmouseover="cautions_omover(2)">
                        <div id="number_select_2" class="number fl">2</div>
                        不能使用已存在的名称
                    </div>
                    <div id="element_select_3" class="element" onmouseover="cautions_omover(3)">
                        <div id="number_select_3" class="number fl">3</div>
                        不使用行业通用词汇
                    </div>
                    <div id="element_select_4" class="element" onmouseover="cautions_omover(4)">
                        <div id="number_select_4" class="number fl">4</div>
                        避免与知名公司相近
                    </div>
                    <div id="element_select_5" class="element" onmouseover="cautions_omover(5)">
                        <div id="number_select_5" class="number fl">5</div>
                        避免与驰名商标相同或相近
                    </div>
                    <div id="element_select_6" class="element" onmouseover="cautions_omover(6)">
                        <div id="number_select_6" class="number fl">6</div>
                        避免使用地区全称或简称
                    </div>
                </div>
            </div>
        </div>
        <script>
            function check_word(obj) {
                var cw = document.getElementById(obj).value;
                if(!/^[\u4e00-\u9fa5]+$/gi.test(cw)){
                    alert("请输入汉字");
                    document.getElementById(obj).value = "";
                }else{
                    $.ajax({
                        url: "/cmsapi/judgSenExp.jspx",
                        async:false,
                        data: {str:cw},
                        success: function (data) {
                            if(!data.isGreat){
                                alert(data.msg);
                                document.getElementById(obj).value = "";
                            }
                        }
                    });
                }
            }
            function huiche(obj) {
                if(event.keyCode==13){
                    var cw = document.getElementById(obj).value;
                    if(!/^[\u4e00-\u9fa5]+$/gi.test(cw)){
                        alert("请输入汉字");
                        document.getElementById(obj).value = "";
                    }else {
                        $.ajax({
                            url: "/cmsapi/judgSenExp.jspx",
                            async:false,
                            data: {str:cw},
                            success: function (data) {
                                if(!data.isGreat){
                                    alert(data.msg);
                                    document.getElementById(obj).value = "";
                                }else{
                                    sub();
                                }
                            }
                        });
                    }
                }
            }
            function cautions_omover(val) {
                $("#element_select_" + val).parent().find(".element_select").attr("class","element");
                $("#number_select_" + val).parent().parent().find(".number_select").attr("class","number fl");
                $("#element_select_" + val).attr("class", "element_select");
                $("#number_select_" + val).attr("class", "number_select fl");
                $("#cautions_select_" + val).parent().find(".com_name_cautions_left").hide();
                document.getElementById("cautions_select_" + val).style.display = "block";
            }

            function remove(id) {
                $("#remove" + id).remove();
            }
            function getUserCookie(){
                var arr, reg = new RegExp("(^| )COOKIE_ACCOUNT_LOGIN_TICKET=([^;]*)(;|$)");
                if (arr = document.cookie.match(reg))
                    return unescape(arr[2]);
                else
                    return "";
            }
            function sub() {
                if (getUserCookie() == "") {
                    document.getElementById("cnm_name_create_res").style.display = "none";
                    document.getElementById("cnm_name_audit_bottom").style.display = "none";
                    loginOpen(0);
                } else {
                    document.getElementById("cnm_name_audit_bottom").style.display = "block";
                    document.getElementById("cnm_name_create_res").style.display = "block";
                    $("#label_names").html("");
                    document.getElementById("loading").style.display = "block";
                    var cityname = $("#cityname").val().replace(/(^\s*)|(\s*$)/g,"");
                    cityname=filtration(cityname);
                    if(cityname==""){
                        alert("请输入公司所在城市，如：北京！！！")
                        return false
                    }
                    document.getElementById("cityname").value=cityname;
                    var btname = $("#btname").val().replace(/(^\s*)|(\s*$)/g,"");
                    btname=filtration(btname);
                    if(btname==""){
                        alert("请输入公司行业，如：科技！！！")
                        return false
                    }
                    document.getElementById("btname").value=btname;
                    var organizational = $("#triangle_value").val().replace(/(^\s*)|(\s*$)/g,"");
                    organizational=filtration(organizational);
                    if(organizational==""){
                        alert("请选择公司组织形式！！！")
                        return false
                    }
                    document.getElementById("triangle_value").value=organizational;
                    $.get("/cmsapi/createCompanyName.jspx", {cityname: cityname, btname: btname, organizational: organizational}, function (data) {
                        var htm = '';
                        if (data.msg == "查询完成") {
                            var obj = new Object();
                            history.replaceState(obj,'','?'+'city='+cityname+'&industry_qiming='+btname+'&organization='+organizational);

                            for (var i in data.names) {
                                htm += '<label class="noselect">';
                                htm += '<div class="red_triangle_lt" style="display: none;"></div>';
                                htm += '<div class="red_triangle_rb" style="display: none;"></div>';
                                htm += '<input type="checkbox" name="recommend_name" class="js_checkbox_select" value="' + data.names[i] + '">' + data.names[i] + '</label>';
                            }
                            htm += '<label class="huanyipi" onclick="sub_repeat()"><img src="/r/cms/w3/w3/img/CompanyName/16.jpg">换一批</label>';
                            document.getElementById("loading").style.display = "none";
                            $("#label_names").html(htm);
                            $("#selspa").html($(".select_space_all").html());
                            $.getScript("/r/cms/w3/w3/js/assistant.js");
                        } else if (data.msg == "请重新登陆") {
                            alert(data.msg);
                            window.location.href = "http://www.gongsibao.com/login.html?redirect=" + window.location.toString();
                        } else {
                            alert(data.msg);
                        }
                    });
                }
            }
        </script>
    </div>
    <div class="com_name_im">
        <div class="com_name_im_1">
            <div class="bubble" id="bubble">
                <div class="title">
                    有利于企业外部推广
                </div>
                <div class="im_content">
                    企业宣传作为一种沟通企业与社会、企业与消费者的桥梁，在现代商战中的重要作用已显而易见。可以说，企业的生存和发展与宣传密切相关，因为，有效的宣传已经成为企业促进的生产销售并提高竞争力的有效途径。
                </div>
            </div>
            <div class="triangle_right" id="triangle_right">
            </div>
        </div>
        <div class="com_name_im_2">
            <div class="com_name_im_2_1">
                <div class="bubble">
                    <div class="title">
                        有利于树立企业形象
                    </div>
                    <div class="im_content" style="width: 145px;">
                        企业形象是企业重要的软性资产，企业形象宣传是企业发展壮大必不可少的重要组成部分。 要想达到预期的宣传效果，最关键的是要充分认识企业形象宣传的重要性。
                    </div>
                </div>
                <div class="triangle_right"></div>
            </div>
            <div class="com_name_im_2_2">
            </div>
            <div class="com_name_im_2_2_1">
                <div class="title">有利于建立企业文化氛围</div>
                <div class="im_content">随着知识经济和经济全球化的发展，企业之间的竞争越来越表现为文化的竞争。企业文化就是企业成员的共同价值观念和行为规范，就是每位员</div>
            </div>
            <div class="triangle_left"></div>
            <div class="com_name_im_2_3">
                <div class="bubble">
                    <div class="title">
                        有利于客户留下良好印象
                    </div>
                    <div class="im_content">
                        它实施于企业的市场营销、销售、服务与技术支持等与客户有关的领域。任何一家企业，无论其所提供的产品是量化的物，还是无形的服务，最终都将受到市场和普通消费者的检验。
                    </div>
                </div>
                <div class="triangle_left"></div>
            </div>
        </div>
        <div class="com_name_im_3">
            <div class="bubble">
                <div class="title">
                    有利于办理各种审批手续
                </div>
                <div class="im_content">
                    在企业的日常工作中，绝大多数属于流程类工作，比如业务的分级审批工作、各类申请表单、公文签审、业务处理等。通过现代的技术手段将企业内诸多繁琐复杂的业务流程自动化，并对其进行有效地管理便是工作流需要解决的问题。
                </div>
            </div>
            <div class="triangle_right">
            </div>
        </div>
        <div class="com_name_im_3_2">
            <div class="bubble">
                <div class="title">
                    有利于企业运势发展
                </div>
                <div class="im_content">
                    不论你是身处“潜龙勿用”阶段，还是已达“飞龙在天”，在不同的人生阶段，不同的境遇下都要懂得适时调整和应对。乾卦的卦辞其实很简单，就是四个字：元、亨、利贞，从这简单的四个字里，我感悟到成为一个卓越的领导者不仅要有好的品格，还要懂得创新，在创新的基础上懂得固本培元，同时还要具有良好的执行能力和控制能力。
                </div>
            </div>
            <div class="triangle_left"></div>
        </div>
    </div>

    <div class="js-guanggao footer-guanggao">
        {{--<div class="guanggao posr">--}}
            {{--<a href="" target="_blank"><img src="http://gsb-public.oss-cn-beijing.aliyuncs.com/cms/00fc50d3aca0933105f696728cfdb22c.jpg"></a>--}}
        {{--</div>--}}
    </div>

    <div class="js-details-make details-make posf"></div>


@endsection
