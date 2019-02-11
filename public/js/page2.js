$(function(){
	$(".tab1 li").mouseover(function(){
		$(".tab1 li").removeClass("aaa");
		$(this).addClass("aaa");
		$(".qiehuan1").css("display","none");
		$("#tab_"+$(this).index()).css("display","block");
	}); 
	$(".center4_list li").mouseover(function(){
		$(".center4_list li").removeClass("bbb");
		$(this).addClass("bbb");
		$(".center4_div").css("display","none");
		$("#list_"+$(this).index()).css("display","block");
	}); 
	$(".center5_ul li").mouseover(function(){
		$(".center5_ul li").removeClass("ddd");
		$(this).addClass("ddd");
		$(".center5_div").css("display","none");
		$("#qie_"+$(this).index()).css("display","block");
	}); 
	$(".center_l_ul li").mouseover(function(){
		$(".center_l_ul li").removeClass("fff");
		$(this).addClass("fff");
		$(".guo").css("display","none");
		$("#xiao_"+$(this).index()).css("display","block");
	});
	$(".center_h_ul li").mouseover(function(){
		$(".center_h_ul li").removeClass("eee");
		$(this).addClass("eee");
		$(".huan_x").css("display","none");
		$("#huan_"+$(this).index()).css("display","block");
	});
	$(".center6_list1 li").mouseover(function(){
		$(".center6_list1 li a").removeClass("ccc");
		$(this).find("a").addClass("ccc");
	}); 
})
