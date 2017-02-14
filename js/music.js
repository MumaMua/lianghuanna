$(function(){
	
	$(".music").css("left","-360px");
	
	var expanded = true;
	
	$(".music_but").click(function(){
		if(expanded){
			$(".music").animate({left:"0"},500);
			$(".music_but").css("background-position","-25px 0px");
		}else{
			$(".music").animate({left:"-360px"},500);
			$(".music_but").css("background-position","-0px 0px");
		}
		expanded = !expanded;
	});

});