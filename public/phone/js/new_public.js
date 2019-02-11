// if ((navigator.userAgent.indexOf('MSIE') >= 0) && (navigator.userAgent.indexOf('Opera') < 0)){alert('你是使用IE')}else
// if (navigator.userAgent.indexOf('Firefox') >= 0){alert('你是使用Firefox')}else
// if (navigator.userAgent.indexOf('Opera') >= 0){alert('你是使用Opera')}else
// if (navigator.userAgent.indexOf('Chrome') >= 0){alert('你是使用Chrome')}else
// {alert('你是使用其他的浏览器浏览网页！')}
$(function () {
    var font_s=100/750*document.body.clientWidth;
    $("html").css("font-size",font_s+"px");
});
$(document).resize(function () {
    var font_s=100/750*document.body.clientWidth;
    $("html").css("font-size",font_s+"px");
});
function login(){
    window.location.href = "http://m.gongsibao.com/log/login.html?redirect=" + window.location.toString();
}