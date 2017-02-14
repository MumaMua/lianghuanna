$(function()
{
 $("#txt1").mouseover(function(){
 $(this).append("<p class='weizhi'>　Protal</p>");
 
 });
 $("#txt1").mouseout(function(){
	$("#txt1 p").remove(); 
	 
 });
})

$(function(){
	$("#txt2").mouseover(function(){
		$(this).append("<p class='weizhi'>Learning</p>");
		});
		$("#txt2").mouseout(function(){
		$("#txt2 p").remove();
		});
	});
$(function(){
	$("#txt3").mouseover(function(){
		$(this).append("<p class='weizhi'>Happiness</p>");
		});
		$("#txt3").mouseout(function(){
		$("#txt3 p").remove();
		});
	});
$(function(){
	$("#txt4").mouseover(function(){
		$(this).append("<p class='weizhi'>Doing</p>");
		});
		$("#txt4").mouseout(function(){
		$("#txt4 p").remove();
		});
	});
	$(function(){
	$("#txt5").mouseover(function(){
		$(this).append("<p class='weizhi'>Resume</p>");
		});
		$("#txt5").mouseout(function(){
		$("#txt5 p").remove();
		});
	});
	$(function(){
	$("#txt6").mouseover(function(){
		$(this).append("<p class='weizhi'>Call me</p>");
		});
		$("#txt6").mouseout(function(){
		$("#txt6 p").remove();
		});
	});
	$(function(){
	$("#txt7").mouseover(function(){
		$(this).append("<p class='weizhi'>Guestbook</p>");
		});
		$("#txt7").mouseout(function(){
		$("#txt7 p").remove();
		});
	});
$(function(){
	$(".sc1").hide();
	$(".gl1").hide();
	$(".gl").show();
	/*$(".sc").mouseover(function(){
		$(".sc").hide();
		$(".sc1").show();
		$(".sc1").mouseout(function(){
			$(".sc1").hide();
		$(".sc").show();
			})
		})*/
	$(".gl").mouseover(function(){
		$(".gl").hide();
		$(".gl1").show();
		$(".gl1").mouseout(function(){
			$(".gl1").hide();
		$(".gl").show();
			})
		
		})
	})