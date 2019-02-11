/* 右侧导航 */
if ( $("#fixNavZk").length > 0 && $("#fixNavSq").length > 0 ) {
    $("#fixNavSq").on("click" , function () {
        $(this).stop().animate({"opacity" : "0"});
        $("#fixNavZk").parent().stop().animate({"right" : "0" , "opacity" : "1"});
    });
    $("#fixNavZk").on("click" , function () {
        $("#fixNavSq").stop().animate({"opacity" : "1"});
        $(this).parent().stop().animate({"right" : "-154px" , "opacity" : "0"});
    });
}
/* 首页banner */
if ( $("#banner").length > 0 ) {
    var bannerSwiper = new Swiper('#banner', {
        autoplay: 5000,//可选选项，自动滑动
        simulateTouch: false,
        loop : true,
        effect : 'fade',
        fade: {
            crossFade: true,
        },
        pagination : '.swiper-pagination',
        paginationClickable :true
    })
}
var navH = 450/$(".nav-tit").length - 30;
$(".nav-tit").css({"padding" : navH/2 + "px 0"});
/* 切换 */
$(".js-tab-warp").on("click" , ".js-index-tab" , function () {
    if ( !$(this).hasClass("select") ) {
        var _warp = $(this).parents(".js-tab-warp");
        _warp.find(".js-index-tab").removeClass("select");
        $(this).addClass("select");
        _warp.find(".js-index-body").hide();
        _warp.find(".js-index-body").eq($(this).attr("data-index")).fadeIn();
    }
});
/* 企业服务 */
var tyfa;
$(".js-tyfa-tab span").hover(function () {
    var _this = $(this).parent();
    if ( !_this.hasClass("select") ) {
        clearTimeout(tyfa);
        $(".js-tyfa-tab").removeClass("select");
        $(".js-tyfa-icon").css({"left" : 1160/4 * _this.index() + "px"});
        _this.addClass("select");
        $(".js-tyfa-body").hide();
        $(".js-tyfa-body").eq(_this.index()).show();
    }
});
/* 专家问诊 */
if ( $("#index-zjwz").length > 0 ) {
    var zjwzSwiper = new Swiper('#index-zjwz', {
        simulateTouch: false,
        slidesPerView: 5,
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next'
    })
}
/* 客户的声音 */
if ( $("#index-kehu").length > 0 ) {
    var kehuSwiper = new Swiper('#index-kehu', {
        loop: true,
        simulateTouch: false,
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next'
    })
}
