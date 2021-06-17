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

$sql = "INSERT INTO `MMOBTracker`(`task`) VALUES (1)";
$result = $conn->query($sql);
$conn->close(); ;
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://code.jquery.com/mobile/1.4.4/jquery.mobile-1.4.4.min.js"></script>
	<script type="text/javascript" src="swipe.js"></script>
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
			  <h2> Swiping cards</h2>
			  <p> This is the swiping cards input page. By swiping left, you disagree with a statement, and by swiping right you agree. Try it out!</p>
			  <hr>
			  <div id="container">
			  	 <div class="row">
	  				<div class="col" id="test">
	  					<?php 
	  					    $csvFile = file('./questions.csv');
    						$data = [];
    						foreach ($csvFile as $line) {
    							$current = $line;
    							array_unshift($data, $current);
    						}
    						for($a = 0; $a < count($data)-1; $a++){
    							if($a == 1){
									echo "<div class=\"buddy\" id=\"plch\" style=\"display: block;\">" . $data[$a] . "</div>";
    							}else{
    								echo "<div class=\"buddy\" id=\"" . $a . "\" style=\"display: block;\">" . $data[$a] . "</div>";
    							}
    						}
	  					?>
	  					<div class="buddy" id="1" style="display: block;">Introduction question <br> Swipe right if you understand the mechanics</div>
	    			</div>
	 			 </div>
			  </div>
		  	  <div class="text-center buttons" id="nxt">
				  <a href = "#faq"><button type="button" class="btn btn-warning buttons disabled" disabled="true">Continue When Done</button></a>
		      </div>
	</div>
	<div class="col-2 sidepadding"></div>
	</div>
</div>
	<footer class="py-5 bg-warning"></footer>
	<script type="text/javascript">
	

	$(document).ready(function() {
	});


			
	
		
		
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
		})
	</script>
</body>
</html>
