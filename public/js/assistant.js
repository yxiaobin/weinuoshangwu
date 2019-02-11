$(".js-details-open-zhuanli").on("click", function () {
    var jyid = $(this).attr("id").split("=")[0];
    var id = $(this).attr("id").split("=")[1];
    var applicationNumber=$(this).attr("id").split("=")[2];
    var kindCodeDesc=$(this).attr("id").split("=")[3];
    $.ajax({
        url: "/cmsapi/getYjPatentById.api",
        data: {param: jyid,applicationNumber:applicationNumber,type:kindCodeDesc},
        async: false,
        success: function (content) {
            if(content.applicationDate!=null){
                var data_time=content.applicationDate.split(" ")[0];
            }else{
                var data_time ='';
            }
            var res_str = '<div class="details-pop-tit clearfix">';
            res_str += '<div class="tit">专利详情</div>';
            res_str += '<div class="data">申请日期：'+data_time+'</div>';
            res_str += '<div class="js-details-close fr close" onclick="js_details_close()">关闭</div>';
            res_str += '</div>';
            res_str += '<div class="details-pop-info clearfix">';
            res_str += '<div class="fl">';
            res_str += '<div class="details-img dtc"><img src="' + content.patentImage + '"></div>';
            res_str += '</div>';
            res_str += '<ul class="fl w350">';
            res_str += '<li class="texthide">专利名称：';
            res_str += '<var title="'+content.title+'">' + content.title + '</var>';
            res_str += '</li>';
            res_str += '<li class="texthide">类型：';
            res_str += '<var>' + content.kindCodeDesc + '</var>';
            res_str += '</li>';
            res_str += '<li class="texthide">申请号：';
            res_str += '<var>' + content.applicationNumber + '</var>';
            res_str += '</li>';
            res_str += '</ul>';
            res_str += '<ul class="fl w350 p0">';
            res_str += '<li class="texthide">申请/专利权人：';
            res_str += '<var>' + content.assigneestring + '</var>';
            res_str += '</li>';
            res_str += '<li class="texthide">发明/设计人：';
            res_str += '<var>' + content.inventorString + '</var>';
            res_str += '</li>';
            res_str += '<li class="texthide">公开/公告号：';
            res_str += '<var>' + content.publicationNumber + '</var>';
            res_str += '</li>';
            res_str += '<li class="texthide">公开/公告日：';
            if(content.publicationDate!=null){
                res_str += '<var>' + content.publicationDate.split(" ")[0] + '</var>';
            }
            res_str += '</li>';
            res_str += '</ul>';
            res_str += '</div>';
            res_str += '<div class="details-pop-con">';
            res_str += '<div class="details-pop-bg">';
            res_str += '<div class="details-pop-warp clearfix">';
            res_str += '<div class="zl-list fl">';
            res_str += '<div class="con-tit clearfix"><i class="fl"></i>摘要：</div>';
            res_str += '<p>' + content.abstractInfo + '</p>';
            res_str += '</div></div></div></div>';
            $("#zhuanli_" + jyid).html(res_str);
        }
    });
    $(this).parent().find(".js-details-pop-zhuanli").show();
    $(this).parent().find(".js-details-pop-zhuanli").stop().animate({"opacity": "1"});
    $(".js-details-make-zhuanli").show();
    $(".js-details-make-zhuanli").stop().animate({"opacity": "1"});
});
function js_details_close() {
    $(".js-details-pop").css({"opacity": "0"}).hide();
    $(".js-details-make").css({"opacity": "0"}).hide();
    $(".js-details-pop-zhuanli").css({"opacity": "0"}).hide();
    $(".js-details-make-zhuanli").css({"opacity": "0"}).hide();
}
$(".js-details-close-zhuanli").on("click", function () {
    $(".js-details-pop-zhuanli").css({"opacity": "0"}).hide();
    $(".js-details-make-zhuanli").css({"opacity": "0"}).hide();
});
$(".js-details-make-zhuanli").on("click", function () {
    $(".js-details-pop-zhuanli").css({"opacity": "0"}).hide();
    $(".js-details-make-zhuanli").css({"opacity": "0"}).hide();
});
/* 静态 tab */
$(".js-zs-screen-tab").hover(function () {
    $(".js-zs-screen-tab").removeClass("select");
    $(this).addClass("select");
});
function com_name_remove_select_img_over(obj) {
    obj.className = "img_selsect";
}
function com_name_remove_select_img_out(obj) {
    obj.className = "";
}

function omover() {
    document.getElementById("bubble").style.display = "block";
    document.getElementById("triangle_right").style.display = "block";
}
function omout() {
    document.getElementById("bubble").style.display = "none";
    document.getElementById("triangle_right").style.display = "none";
}
$(".js_checkbox_select").on("click", function () {
    var obj = $(this).parent();
    if ($(this).is(":checked")) {
        obj.find(".red_triangle_lt").css("display", "block");
        obj.find(".red_triangle_rb").css("display", "block");
        obj.removeClass("noselect");
        obj.addClass("select");
        obj.addClass(this.value);
    } else {
        obj.find(".red_triangle_lt").css("display", "none");
        obj.find(".red_triangle_rb").css("display", "none");
        obj.removeClass("select");
        obj.addClass("noselect");
        obj.removeClass(this.value);
    }
    var checkbox_str = $(".select_space_all").html();
    var checkboxs = document.getElementsByName("recommend_name");
    for (var i = 0; i < checkboxs.length; i++) {
        if (checkboxs[i].checked) {
            checkbox_str += '<label class="com_name_remove_select" id="' + checkboxs[i].value + '"><div class="red_triangle_lt"></div><div class="red_triangle_rb"></div><img onmouseover="com_name_remove_select_img_over(this)" onmouseout="com_name_remove_select_img_out(this)" onclick="remove_select(this)" id="' + checkboxs[i].value + '">'+checkboxs[i].value+'</label>';
        }
    }
    $(".select_space").html(checkbox_str);
});
function sub_repeat() {
    var str = $(".select_space").html();
    $(".select_space_all").html(str);
    sub();
}
function remove_select(val) {
    var ele_str = val.id;
    var obj_son = $("." + ele_str);
    var obj = obj_son.parent();
    $(".select_space_all").find("#"+ele_str).remove();
    obj = obj.find("." + ele_str);
    obj.find(".red_triangle_lt").css("display", "none");
    obj.find(".red_triangle_rb").css("display", "none");
    obj.removeClass("select");
    obj.addClass("noselect");
    obj.removeClass(ele_str);
    obj.find(".js_checkbox_select").prop("checked", false);
    var checkbox_str = $(".select_space_all").html();
    var checkboxs = document.getElementsByName("recommend_name");
    for (var i = 0; i < checkboxs.length; i++) {
        if (checkboxs[i].checked) {
            checkbox_str += '<label class="com_name_remove_select" id="' + checkboxs[i].value + '"><div class="red_triangle_lt"></div><div class="red_triangle_rb"></div><img onmouseover="com_name_remove_select_img_over(this)" onmouseout="com_name_remove_select_img_out(this)" class="com_name_remove_select_img" onclick="remove_select(this)" id="' + checkboxs[i].value + '">' + checkboxs[i].value + '</label>';
        }
    }
    $(".select_space").html(checkbox_str);
}
function industry_open() {
    if (document.getElementById("industry_result").style.display == "none") {
        document.getElementById("industry_result").style.display = "block";
    } else {
        document.getElementById("industry_result").style.display = "none";
    }
}
function industry_qiming_open() {
    if (document.getElementById("industry_result").style.display == "none") {
        document.getElementById("industry_result").style.display = "block";
        document.getElementById("industry_result_btname").style.display = "none";
    } else {
        document.getElementById("industry_result").style.display = "none";
    }
}
function industry_close(obj) {
    document.getElementById("industry_result").style.display = "none";
    if (obj != "") {
        document.getElementById("triangle_value").value = obj;
    }
}

function industry_open_btname() {
    if (document.getElementById("industry_result_btname").style.display == "none") {
        document.getElementById("industry_result_btname").style.display = "block";
        document.getElementById("industry_result").style.display = "none";
    } else {
        document.getElementById("industry_result_btname").style.display = "none";
    }
}
function industry_close_btname(obj) {
    document.getElementById("industry_result_btname").style.display = "none";
    if (obj != "") {
        document.getElementById("btname").value = obj;
    }
}

function com_name_submit() {
    var checkbox_str = '';
    var checkboxs = document.getElementsByName("recommend_name");
    for (var i = 0; i < checkboxs.length; i++) {
        if (checkboxs[i].checked) {
            if (checkbox_str == "") {
                checkbox_str += checkboxs[i].value;
            } else {
                checkbox_str += "、" + checkboxs[i].value;
            }
        }
    }
    if(checkboxs.length==1){
        checkbox_str="我想注册"+checkbox_str+"这个公司。";
    }else if(checkboxs.length>1){
        checkbox_str="我想注册"+checkbox_str+"这几个公司。";
    }
    LR_submit(checkbox_str);
}

function filtration(str) {
    var pattern = new RegExp("[`~!@#$%^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]")
    var rs = "";
    for (var i = 0; i < str.length; i++) {
        if(str.substr(i, 1)!=" "){
            rs +=str.substr(i, 1).replace(pattern, '');
        }
    }
    return rs;
}

function com_name_input_button() {
    document.getElementById("industry_result").style.display = "none";
    $("#triangle_value").html($("#com_name_input_button").val());
}

function hongse(str,tag_str) {
    var res_str="";
    for(var i=0;i<tag_str.length;i++){
        var mark=false;
        for(var j=0;j<str.length;j++){
            if(tag_str[i]==str[j].toUpperCase()){
                mark=true;
            }
        }
        if(mark){
            res_str+="<i>"+tag_str[i]+"</i>"
        }else{
            res_str+=tag_str[i]
        }
    }
    return res_str;
}
$("#form_input_shangbiao").on("click",function () {
    if($(".js-shangbiao").attr("style")=="display:none;"){
        $(".js-shangbiao").attr("style","display:block;");
    }else{
        $(".js-shangbiao").attr("style","display:none;");
    }
});
$(".js-shangbiao").mouseleave(function () {
    $(".js-shangbiao").attr("style","display:none;");
});
$(".js-shangbiao_input").mouseover(function () {
    $(this).attr("class","js-shangbiao_input selete") ;
});
$(".js-shangbiao_input").mouseout(function () {
    $(this).attr("class","js-shangbiao_input") ;
});

$(".js-shangbiao_input").on("click",function () {
    document.getElementById("form_input_shangbiao").value=$(this).html();
    $(".js-shangbiao").attr("style","display:none;");
});

$("#inside_input_shangbiao").on("click",function () {
    if($(".js-inside-shangbiao").attr("style")=="display:none;"){
        $(".js-inside-shangbiao").attr("style","display:block;");
    }else{
        $(".js-inside-shangbiao").attr("style","display:none;");
    }
});

$(".js-inside-shangbiao").mouseleave(function () {
    $(".js-inside-shangbiao").attr("style","display:none;");
});
$(".js-inside-shangbiao_input").mouseover(function () {
    $(this).attr("class","js-inside-shangbiao_input selete") ;
});
$(".js-inside-shangbiao_input").mouseout(function () {
    $(this).attr("class","js-inside-shangbiao_input") ;
});

$(".js-inside-shangbiao_input").on("click",function () {
    document.getElementById("inside_input_shangbiao").value=$(this).html();
    $(".js-inside-shangbiao").attr("style","display:none;");
});