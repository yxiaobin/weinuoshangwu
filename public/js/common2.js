
$(function () {
    $(document).on("touchstart",function(){});
    //导航服务鼠标移上
    $('.service-menu').hover(function () {
        if ($(this).hasClass('no-hover')) { return };
        $(this).find('.menu').fadeIn(100);
    }, function () {
        $('#nav-menu-main').fadeOut(100);
        $('#nav-menu li').removeClass('on');
        if ($(this).hasClass('no-hover')) { return };
        $(this).find('.menu').fadeOut(100);
    });

    // 导航左侧移上
    $('#nav-menu li').hover(function(){
        $('#nav-menu li').removeClass('on');
        $(this).addClass('on');
        var index = $(this).index();
        $('#nav-menu-main').show().children('section').hide().eq(index).show();
    })

    //自定义select
    $(document).on('click','.select-box', function () {
        var $self = $(this);
        if($self.hasClass('no-event')){return};
        $('.select-box .select-list').stop().slideUp(200);
        $self.find('.select-list').stop().slideToggle(200);
        $self.find('li').on('click.sel', function () {
            $(this).addClass('on').siblings().removeClass('on');
            $self.find('.val').html($(this).text());
            $self.find('.val').attr('data-id',$(this).attr('data-id'));
            $self.find('.select-list').stop().slideUp(200);
            $(document).off('click.select');
            $self.find('li').off('click.sel')
            return false;
        });
        $(document).off('click.select').one('click.select',function(){
            $self.find('.select-list').stop().slideUp(200);
        })
        return false;
    })

    //地区选择
    $('.address-list a').on('click',function(){
        $('.address>span').html($(this).html()).data('id', $(this).attr('data-id'));
        var tel = $(this).attr('data-tel');
        if (tel && tel.length > 2) {
            $('.header .tel span').html(tel);
        } else {
            $('.header .tel span').html($('.header .tel span').attr('tel'));
        }
        var tel = $(this).attr('tel');
        if (!tel || tel.length < 2) {
            tel = $('.header .tel span').attr('tel');
        }
        sessionStorage.setItem('city', $(this).html());
        sessionStorage.setItem('cityId',$(this).attr('data-id'));
        sessionStorage.setItem('tel',tel);
    })
});

function ajaxJson(type, url, data, ok) {
    $.ajax({
        type: type,
        url: url,
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function (res) {
            ok(res);
        },
        complete: function () {
        }
    });
}
