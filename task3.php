<?php
$servername = "localhost";
$username = "XXX";
$password = "XXX";
$dbname = "XXX";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `MMOBTracker`(`task`) VALUES (3)";
$result = $conn->query($sql);
$conn->close(); 
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet"> 
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
	<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
</head>
<body>
<div class="header">
	<div class="row">
		<div class="col">
			<img src="image/logo.png" class="img-fluid rounded float-left" alt="Logo UU">
			<img src="image/LogoLudi.png" class="img-fluid rounded float-left" alt="ludiLogo">
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
	  <div class="col-2 sidepadding"></div>
	  <div class="col-8 centerContent"> 
			  <div class="centerTitle">
				  <h2 id="Qbox">Carousel Questions Introduction. Select an emoticon that matches your opinion, and press "Next Question" to start.</h2>
				  <hr>
				  <p> 
				  </p>
			  	    <div class="swiper-container mySwiper text-center">
    				    <div class="swiper-wrapper">
        					<div class="swiper-slide"><div class="text-center"><img src="./image/LikertSD.png"></div></div>
        					<div class="swiper-slide"><div class="text-center"><img src="./image/LikertD.png"></div></div>
        					<div class="swiper-slide"><div class="text-center"><img src="./image/LikertNO.png"></div></div>
        					<div class="swiper-slide"><div class="text-center"><img src="./image/LikertA.png"></div></div>
        					<div class="swiper-slide"><div class="text-center"><img src="./image/LikertSA.png"></div></div>
      					</div>
      					<br><br>
      				<div class="swiper-pagination"></div>
   				</div>
   					<div class="text-center buttons">
				  		<button type="button" id="nxtQ" class="btn btn-warning buttons">Next Question</button>
				  </div>
			  </div>
		</div>
		<div class="col-2 sidepadding"></div>
	</div>
</div>
<footer class="py-5 bg-warning"></footer>
	   <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        centeredSlides: true,
        centeredSlidesBounds: true,
        autoHeight: true,
        initialSlide: 2,
        centeredSlides: true,
        spaceBetween: 20,
        grabCursor: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
	<script type="text/javascript">
	(function(){
		if($(window).width() < 600){
			document.getElementsByClassName('centerContent')[0].className = "col-12 centerContent";
		}
	})();
		$(window).resize(function(){
			if($(window).width() < 600){
			document.getElementsByClassName('centerContent')[0].className = "col-12 centerContent";
		}
			else{
				document.getElementsByClassName('centerContent')[0].className = "col-8 centerContent";
			}
		});


	var lines = []; //Stores q's
		
$(document).ready(function() {
   	$.ajax({
       	type: "GET",
       	url: "./questions.txt",
       	dataType: "text",
       	success: function(data) {processData(data);}
   	});
	if(sessionStorage.getItem('currentQ') == null || sessionStorage.getItem('currentQ') != 0){
		sessionStorage.setItem('currentQ', 0);
	}
});
		
function processData(allText) {
    var allTextLines = allText.split(/\r\n|\n/);
    var headers = allTextLines[0].split(',');
    console.log("processing");
    console.log(allTextLines);
    for (var i=1; i<allTextLines.length; i++) {
        var data = allTextLines[i].split(',');
        if (data.length == headers.length) {
            var tarr = [];
            for (var j=0; j<headers.length; j++) {
                tarr.push(data[j]);
            }
          //  console.log(tarr);
            lines.push(tarr);
       		console.log(lines);
        }
    }
}

function nextQ(qFetch){
	console.log(qFetch);
	if(qFetch == 60){  // <--- SET QUESTION AMOUNT
		window.location.replace("./deminfo.php?task=3");
	}
	else{
		sessionStorage.setItem('currentQ', qFetch);
		$('#Qbox').html("" + lines[qFetch][0]);
	}
}

		$('#nxtQ').on('click tap', function(){
			nextQ(parseInt(sessionStorage.getItem('currentQ')) + 1);
			swiper.slideTo(2, 800, false)
		});

	</script>