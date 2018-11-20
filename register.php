<?php include('connect.php'); 
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>NGOList-Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="register.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
	<script src="list.js"></script>
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
						<a href="login.php"><b>Login</b></a>
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
		<div class="col-md-3 col-sm-3 col-xs-1">
		</div>

		<div class="col-md-6 col-sm-6 col-xs-10 form">
			<div class="row text-center" id="php-validation">
			</div>
			
			<div class="row form-title">
				<span>Register</span></br>Register to keep track of your volunteers and donors (for NGOs only!)  
			</div>

			<form method="post" action="register.php">
				<div class="form-group col-md-12">
			      	<input type="text" class="form-control" id="NGOname" placeholder="Enter NGO name" name="NGOname" required>
				</div>
				
				<div class="form-group col-md-12">
			      	<input type="text" class="form-control" id="username" placeholder="Enter new username" name="username" required>
				</div>

				<div class="form-group col-md-12">
					<input type="password" class="form-control" id="password" placeholder="Enter new password" name="password" required>
				</div>

				<div class="form-group col-md-12">
					<input type="password" class="form-control" id="password2" placeholder="Re-enter password" name="password2" required>
				</div>

			    <div>
			    	<div class="col-md-9 col-sm-0 col-xs-0">
			    	</div>
				    <div class="form-group col-md-3 col-xs-12 col-sm-12 text-center clearfix button-container">
				    	<button type="submit" class="btn btn-lg pull-right col-xs-12 col-sm-12" name="reg_next">Next</button>
				    </div>
				</div>
		  	</form>

		  	<div class="row form-footer">
		  		Already an user? <a class="forgot-link" href="login.php">Login</a>
		  	</div>
		</div>

		<div class="col-md-3 col-sm-3 col-xs-1">
		</div>

	</div>

<?php
	$NGOname = '';
	$username = '';
	$password = '';
	$password2 = '';
	if (isset($_POST["reg_next"])) {
		$NGOname = mysqli_real_escape_string($conn, $_POST["NGOname"]);
		$username = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$password2 = mysqli_real_escape_string($conn, $_POST["password2"]);

		$password = md5($password);
		$password2 = md5($password2);

		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;
		$_SESSION["NGOname"] = $NGOname;

		$query_user = "SELECT * FROM ngocredentials WHERE username='$username'";
		$result_user = mysqli_query($conn, $query_user);

		if(mysqli_num_rows($result_user)>0){
			echo '
           	<script>
            document.getElementById("php-validation").innerHTML = "Username already exists";
            document.getElementById("username").setAttribute("style","border-color:red;");
            </script>
            ';
		}
		else{
			if(strlen($password)<8){
				echo '
				<script>
				document.getElementById("php-validation").innerHTML = "Enter a password with more than 8 characters";
	            document.getElementById("password").setAttribute("style","border-color:red;");
	            </script>
	            ';
			}
			else{
				if($password != $password2){
				echo '	
				<script>
	            document.getElementById("php-validation").innerHTML = "The passwords do not match";
	            document.getElementById("password").setAttribute("style","border-color:red;");
	            document.getElementById("password2").setAttribute("style","border-color:red;");
	            </script>
	            ';
				}
				else{
					header("location: regdetails.php");
				}
			}
		}
	}
?>
</body>
</html>