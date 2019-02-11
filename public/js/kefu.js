document.write(
    "<script language=javascript>"
    + "var LiveAutoInvite0='您好，来自%IP%的朋友';"
    + "var LiveAutoInvite1='来自公司宝的对话';"
    + "var LiveAutoInvite2='公司宝-一站式企业服务平台<br><strong>如果您有任何问题请接受此邀请以开始即时沟通</strong>';"
    + "</script>"
    + "<script language='javascript' src='http://swt.gongsibao.com/JS/LsJS.aspx?siteid=MGF22027130&float=1&lng=cn'></script>");

$(".js-openchat").on("click" , function () {
    window.open("http://swt.gongsibao.com/LR/Chatpre.aspx?id=MGF22027130&lng=cn");
});
$(".js-openchat2").on("click" , function () {
    window.open("http://swt.gongsibao.com/LR/Chatpre.aspx?id=MGF22027130&lng=cn&p=www.gongsibao.com&oname=%e5%85%ac%e5%8f%b8%e5%ae%9d%e5%94%ae%e5%90%8e");
});

document.write(
    "<script language=javascript>" +
    "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');ga('create', 'UA-94112410-1', 'auto');ga('send', 'pageview');</script>");
function LR_submit(msg) {
    LR_explain='来自网页内嵌文本框的对话,客人输入的内容如下:'+msg;
    LR_msg=msg;
    openZoosUrl('chatwin');
}