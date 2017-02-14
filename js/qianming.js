//心情签名js代码
$(function(){
	
		$(".1  p1").hide();
		$(".1  p2").hide();
		$(".1  p3").hide();
		$(".1  p4").hide();
		$(".1  p5").hide();
		$(".1  p6").hide();
		$(".1  p7").hide();
		

       
		$(".1  p1").show(2000);
		$(".1  p2").delay(2000).show(2000);
		$(".1  p3").delay(4000).show(2000);		
		$(".1  p4").delay(6000).show(2000);		
		$(".1  p5").delay(8000).show(2000);
		$(".1  p6").delay(10000).show(2000);		
		$(".1  p7").delay(12000).show(2000);
		
		
		$("#bt3").click(function(){
			$(".2").hide();
			$(".3").hide();		 
         $(".1").show();
	    $(".1  p1").hide();
		$(".1  p2").hide();
		$(".1  p3").hide();
		$(".1  p4").hide();
		$(".1  p5").hide();
		$(".1  p6").hide();
		$(".1  p7").hide();
       
		$(".1  p1").show(2000);
		$(".1  p2").delay(2000).show(2000);
		$(".1  p3").delay(4000).show(2000);		
		$(".1  p4").delay(6000).show(2000);		
		$(".1  p5").delay(8000).show(2000);
		$(".1  p6").delay(10000).show(2000);		
		$(".1  p7").delay(12000).show(2000);
		 })

		
		$(".2").hide();
		$("#bt1").click(function(){
			$(".1").hide();
			$(".2").show();
			$(".2 a1").hide();
			$(".2 a2").hide();
			$(".2 a3").hide();
			$(".2 a1").show(2000);
			$(".2 a2").delay(2000).show(2000);
			$(".2 a3").delay(4000).show(2000);
			 $(".3").hide();	
		})
		
		    $(".3").hide();
			$("#bt2").click(function(){
            $(".1").hide();
			$(".2").hide();
			$(".3").show();
			$(".3 span1").hide();
			$(".3 span2").hide();
			$(".3 span3").hide();
			$(".3 span4").hide();
			$(".3 span5").hide();
			$(".3 span6").hide();
			$(".3 span1").show(2000);
			$(".3 span2").delay(2000).show(2000);
			$(".3 span3").delay(4000).show(2000);
			$(".3 span4").delay(6000).show(2000);
			$(".3 span5").delay(8000).show(2000);
			$(".3 span6").delay(10000).show(2000);			
		})
		 

	});
		


