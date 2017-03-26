$(document).ready(function(){
	$(window).scroll(function() {
		var top = $(".jumbotron").offset().top; //获取指定位置
		var scrollTop = $(window).scrollTop();  //获取当前滑动位置
		if(scrollTop > top){                 //滑动到该位置时执行代码
			$(".navbar").removeClass("transparent");
			$("#backtotop").removeClass("hide");
		}else{
			$(".navbar").addClass("transparent");
			$("#backtotop").addClass("hide");
		}
	});
});
function backtop(){$("body").animate({scrollTop:0})}
window.onload=function load(){
	$("#nav").removeClass('hide');
	$("#nav").addClass('animated fadeInDown');
	setTimeout("$('#headtwofirst').removeClass('hide');", 400);
	setTimeout("$('#headtwofirst').addClass('animated fadeInDown');", 400);
	setTimeout("$('#headtwosecond').removeClass('hide');", 600);
	setTimeout("$('#headtwosecond').addClass('animated fadeInDown');", 600);
	setTimeout("$('#headtwosecond').removeClass('hide');", 600);
	setTimeout("$('#headtwothird').removeClass('hide');", 800);
	setTimeout("$('#headtwothird').addClass('animated fadeInDown');", 800);
	setTimeout("$('#actionbtn').removeClass('hide');", 1000);
	setTimeout("$('#actionbtn').addClass('animated fadeInDown');", 1000);
}
function dispqrcode(){
	$("#qrcode").removeClass('hide');
	$("#qrcode").addClass('animated fadeInDown');
}
function hideqrcode(){
	$("#qrcode").removeClass('animated fadeInDown');
	$("#qrcode").addClass('hide');
}
function dispwx(){
	$("#wx").removeClass('hide');
	$("#wx").addClass('animated fadeInDown');
}
function hidewx(){
	$("#wx").removeClass('animated fadeInDown');
	$("#wx").addClass('hide');
}