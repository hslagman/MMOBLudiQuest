// JavaScript Document (jQuery)

	var lines = []; //Stores q's
	var lineLength = 0;
	var done = false;

$(document).ready(function(){
	

var answ = "";

	console.log(document.getElementById("test").children);

    $(".buddy").on("swiperight",function(){
      $(this).addClass('rotate-left').delay(700).fadeOut(1);
      $('.buddy').find('.status').remove();
      $(this).append('<div class="status like">Like!</div>');      
     // $(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
		console.log("Swiped right on: " + $(this).attr('id'));
		answ = answ.concat(($(this).attr('id')+"=yes&"));
		checkDone($(this).attr('id'));
    });  

   $(".buddy").on("swipeleft",function(){
    $(this).addClass('rotate-right').delay(700).fadeOut(1);
    $('.buddy').find('.status').remove();
    $(this).append('<div class="status dislike">Dislike!</div>');
    //$(this).next().removeClass('rotate-left rotate-right').fadeIn(400);
	console.log("Swiped left on:" + $(this).attr('id'));
	   answ = answ.concat(($(this).attr('id')+"=no&"));
	   if($(this).attr('id') == '1'){
		   		   $('#notice').remove();
		   console.log("Didnt understand");
		   $(this).removeClass('rotate-left rotate-right').fadeIn(400);
		   $('.status').remove();
		   $(this).append('<p id="notice"><br>Please swipe right if you understand</p>');
	   }
	checkDone($(this).attr('id'));
  	});

	$(".header").on("click", function(){
		if(answ.charAt(answ.length - 1) == "&"){
			console.log("=&");
		}
		answ = answ.slice(0,answ.length -1);
		console.log(answ);
		console.log(document.getElementById("test").children);
	});

	$('#nxt').on("click", function() {
	console.log("Click" + done);
	if(done){
		window.location.replace("./deminfo.php?task=1");
	}
	});

	function checkDone(id){
		console.log("Checking" + id);
		if(id == 0){
			done = true;
			console.log("Done, enabling button");
			$('#nxt').html("<button type=\"button\" class=\"btn btn-warning buttons \">Continue</button>");
		} 
	}

});