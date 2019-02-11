lastScrollY = 0;

function heartBeat() {
    var diffY;
    percent = .1 * (diffY - lastScrollY);
    if (percent > 0) percent = Math.ceil(percent);
    else percent = Math.floor(percent);
    document.getElementById("lovexin12").style.top = parseInt(document.getElementById("lovexin12").style.top) + percent + "px";

    lastScrollY = lastScrollY + percent;
}


suspendcode12 = "<div id=\"lovexin12\" " +
    "style='left:22px;POSITION:fixed;TOP:200px;z-index: 999'>" +
    "<a href='http://www.gongsibao.com/zt/mkt/gsb/' target='_blank'>" +
    "<img border=0 src=/r/cms/w3/w3/img/LeftAD.jpg><br>" +
    "<a href=JavaScript:; onclick=\"lovexin12.style.visibility='hidden';return false\" target='_self'>" +
    "<img border=0 src=/r/cms/w3/w3/img/LeftADClose.gif></a>" +
    "</div>"

document.write(suspendcode12);

setTimeout(function () {
    document.getElementById("lovexin12").style.display = "none";
}, 30000);

