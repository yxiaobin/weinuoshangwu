/**
 * 公共JS
 * @author liuhaoyue
 * @email 202683457@qq.com
 * @campany QiYing
 * @time 2018/4/2
 */

$(function () {
    // 返回顶部
    $("#back-to-top").click(function(){
        $("body,html").animate({scrollTop:0},800);
        return false;
    });
    $(window).scroll(function(){
        if ($(window).scrollTop() > 500){
            $("#back-to-top").css("right","0.32rem");
        } else {
            $("#back-to-top").css("right","-0.52rem");
        }
    });

    /**
     * 产品详情页面的相关JS
     */

    // 给产品详情页面的底部操作栏绑定点击效果
    $('.operate a').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    });
    // 选择类型
    $('.action-choose .one').click(function () {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(this).parent().parent().attr('hy-attr',$(this).attr('hy-attr'));
        // 查询原始价格
        if($(this).attr('hy-attr'))
        {
            if('undefined' == typeof (priceUrl))
            {
                actionShowPrice('.main','/Mobile/Public/custom.html');
            }
            else
            {
                actionShowPrice('.main',priceUrl);
            }

        }
    });
    // 数量提醒标识的闪动
    if($('.header-num-box').length > 0)
    {
        setInterval(function () {
            $('.header-num-box').hide();
            setTimeout(function () {
                $('.header-num-box').show();
            },600)
        },4000)
    }

    if($('.footer-num-box').length > 0)
    {
        setInterval(function () {
            $('.footer-num-box').hide();
            setTimeout(function () {
                $('.footer-num-box').show();
            },600)
        },2000)
    }

});

/**
 * 选择套餐
 * @param obj
 * @param price
 */
function actionChoose(obj,price) {
    $(obj).siblings().removeClass('active');
    $(obj).addClass('active');
    $('.action .action-type-ret').html('&yen; '+price+'元');
}

/**
 * 查询自定义价格
 * @author Aihy
 * @time 2018/5/23
 */
function actionShowPrice(obj,url) {
    var ids = '';
    $(obj).find('.action-attr-price').each(function () {
        var hyAttr = $(this).attr('hy-attr');
        if('undefined' == typeof hyAttr)
        {
            var hyAttr = $(this).find('.active').attr('hy-attr');
        }
        if(ids)
        {
            ids = ids + ',' + hyAttr;
        } else {
            ids = hyAttr;
        }
    });
    // 查询页面ID
    var pa_id = $('input[name=pa_id]').val();
    if(!pa_id)
    {
        layer.msg('网络异常，请尝试刷新后重试',{time : 1500});
        return false;
    }
    $.ajax({
        type: "POST",
        url: url,
        data: {
            'pa_id': pa_id,
            'ids': ids
        },
        dataType: "json",
        success: function(data){
            if(data.status == 1) {
                // 成功,显示组合价格
                $(obj).find('.action-price-ret').html('&yen; '+data.data.cu_now_price);
                if(data.data.cu_now_price)
                {
                    if(data.data.cu_old_price)
                    {
                        $(obj).find('.action-price-ret-extra').html('原价：'+data.data.cu_old_price);
                    }
                    if(data.data.cu_name)
                    {
                        $('.unit-title').html(data.data.cu_name)
                    }
                    if(data.data.cu_info)
                    {
                        $('#show-content').empty();
                        var str = '<div class="product-descript">'+data.data.cu_info+'</div>';
                        $('#show-content').append(str);
                    }
                }else {
                    $(obj).find('.action-price-ret-extra').html(' ');
                }
            }else {
                layer.msg(data.message,{time : 1500});
                $(obj).find('.action-price-ret').html('未定价');
                $(obj).find('.action-price-ret-extra').html('');
            }
        },
        error: function () {
            layer.msg('网络异常，请尝试刷新后重试',{time : 1500});
        }
    });
}

/**
 * 防止子元素的滚动影响到父级
 * @author Aihy
 * @time 2018/5/4
 * @company Qiying
 * @returns {*|jQuery}
 *
 * @action $().scrollUnique();
 */
$.fn.scrollUnique = function() {
    return $(this).each(function() {
        // 鼠标滚动
        var eventType = 'mousewheel';
        if (document.mozHidden !== undefined) {
            eventType = 'DOMMouseScroll';
        }
        $(this).on(eventType, function(event) {
            // 一些数据
            var scrollTop = this.scrollTop,
                scrollHeight = this.scrollHeight,
                height = this.clientHeight;

            var delta = (event.originalEvent.wheelDelta) ? event.originalEvent.wheelDelta : -(event.originalEvent.detail || 0);
            if ((delta > 0 && scrollTop <= delta) || (delta < 0 && scrollHeight - height - scrollTop <= -1 * delta)) {
                // IE浏览器下滚动会跨越边界直接影响父级滚动，因此，临界时候手动边界滚动定位
                this.scrollTop = delta > 0? 0: scrollHeight;
                // 向上滚 || 向下滚
                event.preventDefault();
            }
        });

        // 移动端手指滚动
        moveflag = 'down';
        $(this).bind("touchstart",function(event){
            movestart = event.originalEvent.changedTouches[0].clientY;
        });
        $(this).on('touchmove', function(event) {
            moveend = event.originalEvent.changedTouches[0].clientY;

            if(movestart-moveend > 0){
                moveflag = 'down';
            }else if (movestart-moveend < 0) {
                moveflag = 'up';
            }
            var scrollTop = this.scrollTop;
            var scrollHeight = this.scrollHeight;
            var height = this.clientHeight;
            if ((scrollTop === 0 && moveflag === 'up') || ((scrollTop + height) >= scrollHeight) && (moveflag === 'down')) {
                event.preventDefault();
            }
        });
    });
};
