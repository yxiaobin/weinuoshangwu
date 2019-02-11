$(function(){
	$(".tab0 li").mouseover(function(){
		$(".tab0 li").removeClass("aaa");
		$(this).addClass("aaa");
		$(".list").css("display","none");
		$("#tab_"+$(this).index()).css("display","block");
	}); 
	$(".tab2 li").mouseover(function(){
		$(".tab2 li").removeClass("aaa");
		$(this).addClass("aaa");
		$(".list2").css("display","none");
		$("#huan_"+$(this).index()).css("display","block");
	}); 
	$(".center7_list1 li").mouseover(function(){
		$(".center7_list1 li a").removeClass("ccc");
		$(this).find("a").addClass("ccc");
	}); 
})
