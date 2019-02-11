/**
 * Created by Administrator on 2017/4/18.
 */
$(function () {
    $(".js-organization").on("click",function () {
        var obj=$(".organization");
        if(obj.attr("style")=="display:none;"){
            obj.attr("style","display:block;");
            $(".industry_qiming").attr("style","display:none;")
        }else{
            obj.attr("style","display:none;");
        }
    });
    $(".organization").mouseleave(function () {
        $(".organization").attr("style","display:none;");
    });

    $(".organization_input").mouseover(function () {
        $(this).addClass("select");
        $(this).removeClass("noselect");
    });

    $(".organization_input").mouseout(function () {
        $(this).addClass("noselect");
        $(this).removeClass("select");
    });

    $(".organization_input").on("click",function () {
        document.getElementById("organization").value=$(this).html();
        $(".organization").attr("style","display:none;");
    });

    $(".js-industry").on("click",function () {
        var obj=$(".industry");
        if(obj.attr("style")=="display:none;"){
            obj.attr("style","display:block;");
        }else{
            obj.attr("style","display:none;");
        }
    });

    $(".industry").mouseleave(function () {
        $(".industry").attr("style","display:none;");
    });

    $(".industry_input").mouseover(function () {
        $(this).addClass("select");
        $(this).removeClass("noselect");
    });

    $(".industry_input").mouseout(function () {
        $(this).addClass("noselect");
        $(this).removeClass("select");
    });

    $(".industry_input").on("click",function () {
        document.getElementById("industry").value=$(this).html();
        $(".industry").attr("style","display:none;");
    });

    $(".js-industry_qiming").on("click",function () {
        var obj=$(".industry_qiming");
        if(obj.attr("style")=="display:none;"){
            obj.attr("style","display:block;");
            $(".organization").attr("style","display:none;")
        }else{
            obj.attr("style","display:none;");
        }
    });

    $(".industry_qiming").mouseleave(function () {
        $(".industry_qiming").attr("style","display:none;");
    });

    $(".industry_qiming_input").mouseover(function () {
        $(this).addClass("select");
        $(this).removeClass("noselect");
    });

    $(".industry_qiming_input").mouseout(function () {
        $(this).addClass("noselect");
        $(this).removeClass("select");
    });

    $(".industry_qiming_input").on("click",function () {
        document.getElementById("industry_qiming").value=$(this).html();
        $(".industry_qiming").attr("style","display:none;");
    });

});


