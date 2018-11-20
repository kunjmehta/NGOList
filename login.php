<?php include ('connect.php'); 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>NGOList-Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
	<script src="list.js"></script>
	<script src="hide.js"></script>
</head>

<body>
	<!--NAVBAR STARTS -->
	<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
		<div class="container" id="navbar">

			<!--Create logo and collapsible nav-->
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-collapse" aria-expanded="false">
					<!--create hamburger icon-->
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="homepage.php">NGOList</a>
			</div>

			<!--Collect the nav links for toggling-->
			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="homepage.php"><b>Home</b></a>
					</li>
					<li>
						<a href="locate.php"><b>Locate</b></a>
					</li>
					<li>
						<a href="volunteer.php"><b>Volunteer</b></a>
					</li>
					<li>
						<a href="donate.php"><b>Donate</b></a>
					</li>
					<li>
						<a href="#"><b>Login</b></a>
					</li>
				</ul>
			</div>
			<!--navbar collapse ends-->
		</div>
		<!--container ends-->
	</nav>
	<!--NAVBAR ENDS -->

	<!-- FORM STARTS -->
	<div class="container">
		<div class="col-md-3 col-xs-1 col-sm-3">
		</div>

		<div class="col-md-6 col-xs-10 col-sm-6 form">
			<div class="row text-center" id="php-validation">
			</div>

			<div class="row form-title">
				<span>Login</span></br>Are you an NGO? Login into your account 
			</div>

			<form method="post" action="login.php">
				<div class="form-group col-md-12">
			      	<input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
				</div>

				<div class="form-group col-md-12">
					<input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
				</div>

			    <div class="button-container">
				    <div class="form-group col-md-12 col-xs-12 col-sm-12 text-center">
				    	<button type="submit" class="btn btn-lg col-md-12 col-xs-12 col-sm-12" name="login_button">Login</button>
				    </div>
				</div>
		  	</form>

		  	<div class="row form-footer">
		  		Did you <a class="forgot-link" href="#">forget your password</a>
		  		or that you are <a class="forgot-link" href="register.php">not a regular user?</a>
		  	</div>
		<div class="col-md-3 col-sm-3 col-xs-1">
		</div>

	</div>

<?php
	$username='';
	$password='';

	if (isset($_POST['login_button'])) {
		$username = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);

		$password_encrypt = md5($password);
		$query_user = "SELECT * FROM ngocredentials WHERE username='$username'";
		$query_pass = "SELECT * FROM ngocredentials WHERE password='$password_encrypt'";
		$result_user = mysqli_query($conn, $query_user);
		$result_pass = mysqli_query($conn, $query_pass);

		if(mysqli_num_rows($result_user)==0){
			echo '
           	<script>
            document.getElementById("php-validation").innerHTML = "Username not found";
            document.getElementById("username").setAttribute("style","border-color:red;");
            </script>
            ';
		}
		else{
			if (mysqli_num_rows($result_pass)==0){
			echo '	
			<script>
            document.getElementById("php-validation").innerHTML = "Wrong password";
            document.getElementById("password").setAttribute("style","border-color:red;")
            </script>
            ';
			}
			else{
				$_SESSION["username"] = $username;
				header("location: account.php");
			}
		}
	}
?>
</body>
</html>