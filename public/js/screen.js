/* 经营年限 */
$(".js-jynx-tab").each(function (i,e) {
    if ( $(e).hasClass("select") ) {
        $(".js-jynx-icon").css({"display" : "block" , "left" : 1080/5 * $(this).index() + "px"});
    }
});
$(".js-jynx-tab").on("click" , function () {
    var _this = $(this);
    if ( !_this.hasClass("select") ) {
        $(".js-jynx-tab").removeClass("select");
        $(".js-jynx-icon").css({"display" : "block"});
        $(".js-jynx-icon").stop().animate({"left" : 1080/5 * $(this).index() + "px"},300);
        setTimeout(function () {
            _this.addClass("select");
        },200);
    }
});
/* 列表分页 */
$(".js-list-swiper").each(function ( i,e ) {
    if ( $(e).find(".swiper-slide").length <= 6 ) {
        $(e).find(".swiper-pagination").hide();
    }
});
var mySwiperList = new Swiper('.js-list-swiper', {
    slidesPerView: 3,
    slidesPerColumn: 2,
    slidesPerColumnFill: 'row',
    slidesPerGroup: 3,
    pagination: ".swiper-pagination",
    paginationClickable: true,
    simulateTouch: false
});