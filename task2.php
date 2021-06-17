<!doctype html>

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

$sql = "INSERT INTO `MMOBTracker`(`task`) VALUES (2)";
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
				  <h2 id="Qbox">Introduction </h2>
				  <hr>
				  <p id="inst"> Tap and hold the bar to fill it to the desired label. The bar will snap to the next closest label, so you dont have to have pin point accuracy. Reset by pressing the reset button below the bar. </p>
			  </div>
			  <div class="barholder">
				  <div class="bar" id="barDiv"></div>
				  <div class="resetBtn" id="rst1">
					  <img src="image/reset-icon-6.png" class="img-fluid" alt="rst">
				  </div>
				  <div class="labelOffset">
					  <h5> -- Strongly Agree </h5>
					  <br><br><br>
					  <h5> -- Agree </h5>
					  <br><br><br>
					  <h5> -- No opinion </h5>
					  <br><br><br>
					  <h5> -- Disagree </h5>
					  <br><br><br>
					  <h5> -- Strongly Disagree </h5>
					  <div class="btnholder">
					  	<button type="button" class="btn btn-warning buttons" id="nxtQ">Next Question</button>
					  </div>
				  </div>
			  </div>
		  <div class="bottompadding"></div>
		</div>
		<div class="col-2 sidepadding"></div>
	</div>
</div>
	<footer class="py-5 bg-warning"></footer>
	<script type="text/javascript">
		
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

    for (var i=1; i<allTextLines.length; i++) {
        var data = allTextLines[i].split(',');
        if (data.length == headers.length) {

            var tarr = [];
            for (var j=0; j<headers.length; j++) {
                tarr.push(data[j]);
            }
            lines.push(tarr);
        }
    }
}
		
function nextQ(qFetch){
	console.log(qFetch);
	if(qFetch == 60){  // <--- SET QUESTION AMOUNT
		window.location.replace("./deminfo.php?task=2");
	}
	else{
		sessionStorage.setItem('currentQ', qFetch);
		$('#Qbox').html("" + lines[qFetch][0]);
	}
}
		
		
		
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
		
		//BAR
		var i = 0, timeOut = 0;
		let root = document.documentElement;
		$(document).ready(function(){
			$('#barDiv').on('mousedown touchstart', function(e){
				timeOut = setInterval(function(){
					var cLength = parseInt(getComputedStyle(document.documentElement).getPropertyValue('--length').slice(0,-2));
					if(cLength < 450){
						root.style.setProperty('--length', cLength + 105 + "px");
						console.log(i++ + " : " + cLength);
					}
				}, 500);
			}).bind('mouseup mouseleave touchend', function(){
				console.log("Clickhold ended at: " + i);
				clearInterval(timeOut);
			});
			
		});
		
		$('#rst1').on('click tap', function(){
			i = 0;
			timeOut = 0;
			console.log("Reset: " + i)
			root.style.setProperty('--length', 50 + "px");
			$(this).addClass('animate-rst');
		}).on("animationend", function(){
      		$(this).removeClass('animate-rst');
		});
		
		$('#nxtQ').on('click tap', function(){
			i = 0;
			timeOut = 0;
			root.style.setProperty('--length', 50 + "px");
			nextQ(parseInt(sessionStorage.getItem('currentQ')) + 1);
			$('#inst').html("");
		});
		
	</script>
</body>
</html>
