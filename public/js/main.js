// main.js

// (function(window, $) {
//     $(function() {
//         var $tab = $('.ngb-tab');
//         var $tabPanel = $('.ngb-tab-panel')

//         $tab.find('li').on("mouseover", function(event) {
//             var $this = $(this);
//             var $target;
//             if ($this.hasClass('active')) return;
//             $target = $($this.attr('data-target'));
//             $this.parent().find('.active').removeClass('active');
//             $this.addClass('active');
//             $target.parent().find('.active').removeClass('active');
//             $target.addClass('active')
//         })
//     })
// })(window, jQuery);

(function(window, $) {
    $(function(){
        $('.con-lease h3 a').hover(function(){
            $(this).siblings().removeClass('on');
            $(this).addClass('on');
            var i = $(this).index();
            var index = $('.con-lease h3 a').index($(this));
            $('.con-block').hide();
            $('.con-block').eq(index).show();
        });
    })
})(window, jQuery);


