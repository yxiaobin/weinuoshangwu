(function (w) {
    var gsb=function () {
        return new gsb.prototype.init();
    };
    gsb.prototype.init=function () {
};
    gsb.prototype.glide_add=function (obj,num) {
        var obj_ul=obj.find("ul");
        var obj_li=obj.find("li");
        var ele_le=obj_li.length;
        var ele_wid=parseFloat(obj_li.css("width").replace("px",""))+parseFloat(obj_li.css("border-left-width").replace("px",""))+parseFloat(obj_li.css("border-right-width").replace("px",""));
        if(num!=undefined&&num!=""){
            var nums=(num+"").split("-");
            if(nums.length==1){
                num=parseInt(num);
            }else if(nums[1]==""){
                num=parseInt(nums[0]);
            }else{
                if(ele_le>parseInt(nums[1])){
                    num=parseInt(nums[1]);
                }else{
                    num=ele_le;
                }
            }
            ele_wid=parseFloat(obj_ul.css("width").replace("px",""))/num-parseFloat(obj_li.css("margin-left").replace("px",""))-parseFloat(obj_li.css("margin-right").replace("px",""));
        }
        obj_li.css("float","left");
        obj_li.css("width",ele_wid);
        obj_li.css("box-sizing","border-box");
        obj_ul.css("width",ele_wid*ele_le+(parseFloat(obj_li.css("margin-left").replace("px",""))+parseFloat(obj_li.css("margin-right").replace("px","")))*ele_le+"px");
        obj.append('<div style="clear: both;"></div>');
    };
    gsb.prototype.turn_left=function (obj,width){
        if(parseFloat(obj.find("ul").css("width").replace("px",""))<=parseFloat(obj.css("width").replace("px",""))){
            return
        }
        var move_w=0;
        if(width==undefined||width==""){
            move_w=parseFloat(obj.css("width").replace("px",""));
        }else{
            move_w=parseFloat(obj.css("width").replace("px",""))*width/100;
        }
        var oml =parseFloat(obj.find("ul").css("margin-left").replace("px",""))-move_w;
        if(oml%move_w!=0){
            oml=move_w*(parseInt(oml/move_w)-1);
        }
        if(oml*-1>parseFloat(obj.find("ul").css("width").replace("px",""))-parseFloat(obj.css("width").replace("px",""))){
            oml=(parseFloat(obj.find("ul").css("width").replace("px",""))-parseFloat(obj.css("width").replace("px","")))*-1
        }
        oml+="px";
        var omr =obj.find("ul").css("margin-right");
        var omt =obj.find("ul").css("margin-top");
        var omb =obj.find("ul").css("margin-bottom");
        obj.find("ul").animate({
            margin:omt+" "+omr+" "+omb+" "+oml
        });
    };
    gsb.prototype.turn_right=function (obj,width) {
        if(parseFloat(obj.find("ul").css("width").replace("px",""))<=parseFloat(obj.css("width").replace("px",""))){
            return
        }
        var move_w=0;
        if(width==undefined||width==""){
            move_w=parseFloat(obj.css("width").replace("px",""));
        }else{
            move_w=parseFloat(obj.css("width").replace("px",""))*width/100;
        }
        var oml =parseFloat(obj.find("ul").css("margin-left").replace("px",""));
        var om_r=parseFloat(obj.find("ul").css("width").replace("px",""))+oml-parseFloat(obj.css("width").replace("px",""));
        if(om_r%move_w!=0){
            om_r=move_w*parseInt(om_r/move_w+1);
        }
        oml=parseFloat(obj.find("ul").css("width").replace("px",""))-om_r-parseFloat(obj.css("width").replace("px",""))-move_w;
        if(oml<0){
            oml=0;
        }else{
            oml=oml*-1
        }
        oml+="px";
        var omr =obj.find("ul").css("margin-right");
        var omt =obj.find("ul").css("margin-top");
        var omb =obj.find("ul").css("margin-bottom");
        obj.find("ul").animate({
            margin:omt+" "+omr+" "+omb+" "+oml
        });
    };
    gsb.prototype.glide=function (obj,width,direction) {
        if(direction=="left"||direction==undefined||direction==""){
                obj[0].addEventListener("touchstart",function (event_start) {
                    var start,end=0;
                    start=event_start.touches[0].clientX;
                    var w=0;
                    obj[0].ontouchmove=function (event_end){
                        var obj_position_left=parseFloat(obj.find("ul").css("margin-left").replace("px",""));
                        end=event_end.changedTouches[0].clientX;
                        obj_position_left=obj_position_left+end-start-w;
                        w=end-start;
                        if(obj_position_left>0){
                            obj.find("ul").css("margin-left","0px");
                        }else if(obj_position_left<(parseFloat(obj.find("ul").css("width").replace("px",""))-parseFloat(obj.css("width").replace("px","")))*-1){
                            obj.find("ul").css("margin-left",(parseFloat(obj.find("ul").css("width").replace("px",""))-parseFloat(obj.css("width").replace("px","")))*-1+"px");
                        }else{
                            obj.find("ul").css("margin-left",obj_position_left+"px");
                        }
                    };
                    obj[0].ontouchend=function () {
                        if(width!=undefined&&width!=""&&end!=0){
                            var obj_position_left=parseFloat(obj.find("ul").css("margin-left").replace("px",""));
                            var oml =parseFloat(obj.find("ul").css("margin-left").replace("px",""));
                            var omr =obj.find("ul").css("margin-right");
                            var omt =obj.find("ul").css("margin-top");
                            var omb =obj.find("ul").css("margin-bottom");
                            var obj_width;
                            obj_width=parseFloat(obj.css("width").replace("px",""))*width/100;
                            var obj_num=parseInt(parseFloat(obj.find("ul").css("margin-left").replace("px",""))/obj_width);
                            if(end-start<0){
                                obj_position_left=obj_width*(obj_num-1);
                            }else{
                                var om_r=parseFloat(obj.find("ul").css("width").replace("px",""))+oml-parseFloat(obj.css("width").replace("px",""));
                                if(om_r%obj_width!=0){
                                    om_r=obj_width*parseInt(om_r/obj_width+1);
                                }
                                obj_position_left=parseFloat(obj.find("ul").css("width").replace("px",""))-om_r-parseFloat(obj.css("width").replace("px",""));
                                obj_position_left=obj_position_left*-1;
                            }
                            if(obj_position_left>0){
                                oml="0px";
                            }else if(obj_position_left<(parseFloat(obj.find("ul").css("width").replace("px",""))-parseFloat(obj.css("width").replace("px","")))*-1){
                                oml=(parseFloat(obj.find("ul").css("width").replace("px",""))-parseFloat(obj.css("width").replace("px","")))*-1+"px";
                            }else{
                                oml=obj_position_left+"px";
                            }
                            obj.find("ul").animate({
                                margin:omt+" "+omr+" "+omb+" "+oml
                            });
                        }
                    };
                });
        }
    };
    gsb.prototype.init.prototype=gsb.prototype;
w.g=w.gsb=gsb();
})(window);