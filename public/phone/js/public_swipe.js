function swipe_add(obj, li_size,point_margin,point_margin_num) {
    var num = obj.find("li").length;
    if (li_size != "") {
        li_size = parseInt(li_size);
        obj.css("width", li_size * num + "%");
    } else {
        obj.css("width", 100 * num + "%");
    }
    obj.find("li").css("width", 100 / num + "%");
    obj.parent().css("position", "relative");
    obj.css("position", "relative");
    obj.css("left", "0");
    var point_group=obj.parent().find(".point_group");
    if(point_margin!=""){
        var point_str = '';
        for (var i = 0; i < num; i++) {
            if(i==0){
                point_str += '<div class="point fl select"></div>';
            }else{
                point_str += '<div class="point fl '+point_margin+'"></div>';
            }
        }
        point_group.html(point_str);
    }
    var mal=(0.12*num+point_margin_num*(num-1))/2*-1;
    point_group.css("margin-left",mal+"rem");
}
function swipe_add_padding(obj, li_size, padding_size) {
    var num = obj.children("li").length;
    obj.css("width", li_size * num + "%");
    obj.find("li").css("width", 100 / num-padding_size + "%");
    obj.parent().css("position", "relative");
    obj.css("position", "relative");
    obj.css("left", "0");
}
function swipe_left(obj, move_width, point_margin, reight_margin) {
    var point_group = obj.find(".point_group");
    var point_num = obj.find("ul").children("li").length;
    obj = obj.find("ul");
    if (move_width == 0) {
        move_width = parseInt(obj.find("li").css("width"));
    }
    var now_left = parseInt(obj.css("left"));
    var right_size = parseInt(obj.css("width")) - move_width - (now_left * -1);
    var tag_left = parseInt((now_left - move_width) / move_width) * move_width;
    if (right_size < document.body.clientWidth) {
        obj.animate({left: (parseInt(obj.css("width")) - document.body.clientWidth + reight_margin) * -1 + "px"});
    } else {
        obj.animate({left: tag_left + "px"});
        if (point_margin != "") {
            var point_str = '';
            var point_num_now = parseInt((now_left * -1) / move_width);
            for (var i = 0; i < point_num; i++) {
                var select = '';
                if (i == point_num_now + 1) {
                    select = 'select';
                }
                if (i == 0) {
                    point_str += '<div class="point fl ' + select + '"></div>';
                } else {
                    point_str += '<div class="point fl ' + point_margin + ' ' + select + '"></div>';
                }
            }
            point_group.html(point_str);
        }
    }
}
function swipe_right(obj, move_width, point_margin) {
    var point_group = obj.find(".point_group");
    var point_num = obj.find("ul").children("li").length;
    obj = obj.find("ul");
    if (move_width == 0) {
        move_width = parseInt(obj.find("li").css("width"));
    }
    var now_left = parseInt(obj.css("left"));
    var tag_left = parseInt((now_left + move_width) / move_width) * move_width;
    if (now_left * -1 < move_width) {
        obj.animate({left: "0"});
    } else {
        obj.animate({left: tag_left + "px"});
        if (point_margin != "") {
            var point_str = '';
            var point_num_now = parseInt((now_left * -1) / move_width);
            for (var i = 0; i < point_num; i++) {
                var select = '';
                if (i == point_num_now - 1) {
                    select = 'select';
                }
                if (i == 0) {
                    point_str += '<div class="point fl ' + select + '"></div>';
                } else {
                    point_str += '<div class="point fl ' + point_margin + ' ' + select + '"></div>';
                }
            }
            point_group.html(point_str);
        }
    }
}
function banner_loop(obj, move_width, point_margin) {
    var point_num = obj.find("ul").children("li").length;
    var point_group = obj.find(".point_group");
    obj = obj.find("ul");
    if (move_width == 0) {
        move_width = parseInt(obj.find("li").css("width"));
    }
    var now_left = parseInt(obj.css("left"));
    var right_size = parseInt(obj.css("width")) - move_width - (now_left * -1);
    if (right_size == 0) {
        obj.animate({left: "0"});
        if (point_margin != "") {
            var point_str = '';
            for (var i = 0; i < point_num; i++) {
                if (i == 0) {
                    point_str += '<div class="point fl select"></div>';
                } else {
                    point_str += '<div class="point fl ' + point_margin + '"></div>';
                }
            }
            point_group.html(point_str);
        }
    } else {
        swipe_left(obj.parent(), move_width, point_margin);
    }
}