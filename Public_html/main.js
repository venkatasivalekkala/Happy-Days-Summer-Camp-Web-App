$(document).ready(function(){
  $("#Home").slideDown('fast');
 $("#Basketball_Camp").hide('fast');
  $("#Baseball_Camp").hide('fast');
  $("#Physical_Training").hide('fast');
  $("#Band_Camp").hide('fast');
  $("#Swimming").hide('fast');
  $("#Nature_Discovery").hide('fast');
  
		  $( "#hm" ).click(function() {
				  $( "#Home" ).slideDown( "fast", function() {
					  $("#Basketball_Camp").hide('fast');
					  $("#Baseball_Camp").hide('fast');
					  $("#Physical_Training").hide('fast');
					  $("#Band_Camp").hide('fast');
					  $("#Swimming").hide('fast');
					  $("#Nature_Discovery").hide('fast');
				  });
			});
  
  
  
			$( "#bsc" ).click(function() {
				  $( "#Basketball_Camp" ).slideDown( "fast", function() {
					  $("#Home").hide('fast');
					  $("#Baseball_Camp").hide('fast');
					  $("#Physical_Training").hide('fast');
					  $("#Band_Camp").hide('fast');
					  $("#Swimming").hide('fast');
					  $("#Nature_Discovery").hide('fast');
				  });
			});
				  
			$( "#bbc" ).click(function() {
				  $( "#Baseball_Camp" ).slideDown( "fast", function() {
					  $("#Home").hide('fast');
					  $("#Basketball_Camp").hide('fast');
					  $("#Physical_Training").hide('fast');
					  $("#Band_Camp").hide('fast');
					  $("#Swimming").hide('fast');
					  $("#Nature_Discovery").hide('fast');
				  });
			 });	  
			$( "#pt" ).click(function() {
				  $( "#Physical_Training" ).slideDown( "fast", function() {
					  $("#Home").hide('fast');
					  $("#Baseball_Camp").hide('fast');
					  $("#Basketball_Camp").hide('fast');
					  $("#Band_Camp").hide('fast');
					  $("#Swimming").hide('fast');
					  $("#Nature_Discovery").hide('fast');
				  });
			 });
			$( "#bc" ).click(function() {
				  $( "#Band_Camp" ).slideDown( "fast", function() {
					  $("#Home").hide('fast');
					  $("#Baseball_Camp").hide('fast');
					  $("#Physical_Training").hide('fast');
					  $("#Basketball_Camp").hide('fast');
					  $("#Swimming").hide('fast');
					  $("#Nature_Discovery").hide('fast');
				  });
			 });
			$( "#swim" ).click(function() {
				  $( "#Swimming" ).slideDown( "fast", function() {
					  $("#Home").hide('fast');
					  $("#Baseball_Camp").hide('fast');
					  $("#Physical_Training").hide('fast');
					  $("#Band_Camp").hide('fast');
					  $("#Basketball_Camp").hide('fast');
					  $("#Nature_Discovery").hide('fast');
				  });
			 });
			$( "#nd" ).click(function() {
				  $( "#Nature_Discovery" ).slideDown( "fast", function() {
					  $("#Home").hide('fast');
					  $("#Baseball_Camp").hide('fast');
					  $("#Physical_Training").hide('fast');
					  $("#Band_Camp").hide('fast');
					  $("#Swimming").hide('fast');
					  $("#Basketball_Camp").hide('fast');
				  });
			  
				  
			});
			
	
		 $("#hm,#nd,#bsc,#bbc,#pt,#bc,#swim").bind("mouseover", function(){
            var color  = $(this).css("background");

            $(this).css("background", "linear-gradient(#aaa, #ddd,#fff,#eee,#bbb)");

            $(this).bind("mouseout", function(){
                $(this).css("background", color);
            })    
        });
		
		
		
		$("#su").bind("mouseover", function(){
            var color  = $(this).css("background");

            $(this).css("background", "linear-gradient(to bottom, rgba(30,51,154,0) 0%,rgba(30,51,154,0.59) 11%,rgba(31,55,161,0.8) 15%,rgba(32,59,167,1) 19%,rgba(42,86,216,1) 49%,rgba(32,58,166,1) 81%,rgba(31,55,160,0.8) 85%,rgba(30,51,154,0.59) 89%,rgba(30,51,154,0) 100%)");

            $(this).bind("mouseout", function(){
                $(this).css("background", color);
            })    
        });
		
  });
  