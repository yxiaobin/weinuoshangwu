//轮播滑动
$(function () {
    swipe_add($(".banner").find("ul"),"","mlr_10",0.1);
});
$(function () {
    window.setInterval(function () {
        var obj=$(".banner");
        banner_loop(obj,0,"mlr_10");
    },5000);
});
$(".banner").on("swipeleft",function () {
    swipe_left($(this),0,"mlr_10",0);
});
$(".banner").on("swiperight",function () {
    swipe_right($(this),0,"mlr_10");
});
//导航滑动
$(function () {
    swipe_add($(".menus").find("ul"),"25%","","");
});
$(".menus").on("swipeleft",function () {
    var move_width =parseInt($(this).find("ul").find("li").css("width"))*4;
    swipe_left($(this),move_width,"",0);
});
$(".menus").on("swiperight",function () {
    var move_width =parseInt($(this).find("ul").find("li").css("width"))*4;
    swipe_right($(this),move_width,"");
});
//热门推荐滑动
$(function () {
    swipe_add($(".hot_content").find("ul"),"40%","","");
});
$(".hot_content").on("swipeleft",function () {
    var move_width =parseInt($(this).find("ul").find("li").css("width"))*2;
    swipe_left($(this),move_width,"",8);
});
$(".hot_content").on("swiperight",function () {
    var move_width =parseInt($(this).find("ul").find("li").css("width"))*2;
    swipe_right($(this),move_width,"");
});
//专题活动
$(function () {
    swipe_add_padding($(".img_group").find("ul"),3.23*100/7.5,0.15*100/7.5);
});
$(".img_group").on("swipeleft",function () {
    var move_width =parseInt($(this).find("ul").find("li").css("width"))*2;
    swipe_left($(this),move_width,"",0);
});
$(".img_group").on("swiperight",function () {
    var move_width =parseInt($(this).find("ul").find("li").css("width"))*2;
    swipe_right($(this),move_width,"");
});
//客户声音
$(function () {
    swipe_add($(".content").find("ul"),"","mlr_10",0.1);
});
$(".content").on("swipeleft",function () {
    swipe_left($(this),0,"mlr_10",0);
});
$(".content").on("swiperight",function () {
    swipe_right($(this),0,"mlr_10");
});