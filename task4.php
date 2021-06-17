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

$sql = "INSERT INTO `MMOBTracker`(`task`) VALUES (4)";
$result = $conn->query($sql);
$conn->close(); ;
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
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
			  <h2> Traditional Questionnaire</h2>
			  <p> This is a traditional questionnaire, please fill it out.</p>
			  <hr>
			  		<form method="GET" action="./redirect.php">
	  					<?php 
	  					    $csvFile = file('./questions.csv');
    						$data = [];
    						foreach ($csvFile as $line) {
    							$current = $line;
    							array_unshift($data, $current);
    						}
    						echo "<div class=\"row\"><label for=\"main\" class=\"col-sm-5 col-form-label\">Available options: (1: Strongly Disagree, 5: Strongly Agree)</label>
									<div class=\"col-sm-7\"><p> 1&nbsp;&nbsp; -&nbsp;&nbsp; 2&nbsp;&nbsp; -&nbsp;&nbsp; 3&nbsp;&nbsp; -&nbsp;&nbsp 4&nbsp;&nbsp;-  &nbsp;&nbsp;5</p></div></div>";
    						for($a = 0; $a < count($data)-1; $a++){
    							echo "<div class=\"form-group row\">
									<label for=\"mainq".$a."\" class=\"col-sm-5 col-form-label\">" . $data[$a] . "</label>
									<div class=\"col-sm-7\">
										<div class=\"form-check form-check-inline\">
  											<input class=\"form-check-input\" type=\"radio\" id=\"". ("q".$a."1")  ."\" name=\"v".$a."\" value=\"1\" required>
										</div>
										<div class=\"form-check form-check-inline\">
  											<input class=\"form-check-input\" type=\"radio\"id=\"". ("q".$a."2") ."\" required name=\"v".$a."\" value=\"2\">
										</div>
										<div class=\"form-check form-check-inline\">
  											<input class=\"form-check-input\" type=\"radio\"id=\"". ("q".$a."3") ."\" name=\"v".$a."\" required value=\"3\">
										</div>
										<div class=\"form-check form-check-inline\">
  											<input class=\"form-check-input\" type=\"radio\" id=\"". ("q".$a."4") ."\" name=\"v".$a."\" required value=\"4\">
										</div>
										<div class=\"form-check form-check-inline\">
  											<input class=\"form-check-input\" type=\"radio\" id=\"". ("q".$a."5") ."\" name=\"v".$a."\" required value=\"5\">
										</div>
									</div>
								</div>";
    						}
	  					?>
	  					<div class="form-group row">
							<div class="col-sm-5 col-form-label">
								<a href="./redirect.php"><button type="submit" class="btn btn-warning">Submit </button></a>
							</div>
						</div>
					</form>
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
