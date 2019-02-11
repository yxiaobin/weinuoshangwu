<!--蜜宝头条-->
function mbtt() {
    var fist = 5;
    var count = 5;
    $('#mbtt-slide').dropload({
        scrollArea: window,
        loadDownFn: function (me) {
            $.ajax({
                url: "/cmsapi/content/list.jspx",
                dataType: 'json',
                data: {
                    channelIds: 516,
                    channelOption: '1',
                    format: '0',
                    first: fist + '',
                    count: count + '',
                    orderBy: 4
                },
                async: false,
                success: function (data) {
                    var html = '';
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var title = data[i].title;
                            var url = data[i].url;
                            var typeImg = data[i].typeImg;
                            var description = data[i].description;
                            if(description.length>50) description=description.slice(0,49).concat("...");
                            var mobileUrl = data[i].mobileUrl;
                            if (description == undefined) description = ' ';
                            html += '<div class="Industry_information opacity">';
                            html += '<div class="Industry_information-img">';
                            html += '<img src="' + typeImg + '"/>';
                            html += '</div>';
                            html += '<div class="Industry_information-content">';
                            html += '<a target="_top" href="' + mobileUrl + '">' + title + '</a>';
                            html += '<span>' + description + '</span>';
                            html += '</div>';
                            html += '</div>';
                            if ((i + 1) >= data.length) {
                                me.noData();
                                break;
                            }
                        }
                    } else {
                        me.noData();
                    }
                    setTimeout(function () {
                        fist = fist + count;
                        $("#mbtt").append(html);
                        $(".swiper-container").css("height", "auto");
                        me.resetload();
                    }, 1000);
                }, error: function (xhr, type) {
                    me.resetload();
                    me.noData();
                }
            })
        }
    });
}

$(function () {
    // 返回顶部
    if ($("#js-gototop").length > 0) {
        $(window).scroll(function () {
            if ($(window).scrollTop() > 0) {
                $("#js-gototop").show();
            } else {
                $("#js-gototop").hide();
            }
        });
        $("#js-gototop").on("click", function () {
            $("html,body").animate({
                scrollTop: 0
            });
        });
    }
})
