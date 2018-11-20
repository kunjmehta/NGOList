<?php 
	include ('connect.php');
	session_start();
	ob_start();
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

			<form method="post" action="regdetails.php">
				<div class="form-group col-md-12">
			      	<input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
				</div>
				
				<div class="form-group col-md-12">
			      	<input type="text" class="form-control" id="number" placeholder="Mobile number : 9862624323" name="number" maxlength="10" required>
				</div>

				<div class="form-group col-md-4 col-sm-4 col-xs-12">
					<input type="textarea" class="form-control" id="address" placeholder="Address Line 1" name="address1" required>
				</div>

				<div class="form-group col-md-4 col-sm-4 col-xs-12">
					<input type="textarea" class="form-control" id="address" placeholder="Address Line 2" name="address2" required>
				</div>

				<div class="form-group col-md-4 col-sm-4 col-xs-12">
					<input type="textarea" class="form-control" id="address" placeholder="Address Line 3" name="address3" required>
				</div>

				<div class="form-group col-md-12">
					<input type="text" class="form-control" id="contact_person" placeholder="Contact person" name="contact_person" required>
				</div>

				<div class="form-group col-md-12">
					<input type="text" class="form-control" id="website" placeholder="Website : https://www.abc.com" name="website" required>
				</div>

			    <div class="form-group col-md-12">
			    	<select class="form-control select" multiple size="3" id="ngo_purpose" name="ngo_purpose[]" required>
    					<option class="option" style="color:gray" value="null" selected disabled>Select Purpose</option>
    					<option class="option" style="color:gray" value="Education">Education</option>
    					<option class="option" style="color:gray" value="Children">Children</option>
    					<option class="option" style="color:gray" value="Environment">Environment</option>
    					<option class="option" style="color:gray" value="Women">Women</option>
    					<option class="option" style="color:gray" value="Elderly">ELderly</option>
    					<option class="option" style="color:gray" value="Human Rights">Human Rights</option>
    					<option class="option" style="color:gray" value="Grants">Grants/Aids</option>
    					<option class="option" style="color:gray" value="Poverty">Poverty</option>
    				</select>
			    </div>

			    <div class="form-group col-md-12">
					<input type="textarea" class="form-control" id="desc" placeholder="Description/Aim" name="desc" required>
				</div>

			    <div>
			    	<div class="form-group col-md-4 col-sm-6 col-xs-12 text-center clearfix button-container">
				    	<a class="btn btn-lg pull-left col-md-12 col-xs-12 col-sm-12" href="register.php">Prev</a>
				    </div>

				    <div class="col-md-4 col-sm-0 col-xs-0">
				    </div>

			    	</div>
				    <div class="form-group col-md-4 col-sm-6 col-xs-12 text-center clearfix button-container">
				    	<button type="submit" name ="reg_button" class="btn btn-lg pull-right col-md-12 col-xs-12 col-sm-12">Register</button>
				    </div>
				</div>
		  	</form>
		</div>

		<div class="col-md-3 col-sm-3 col-xs-1">
		</div>
	</div>

<?php
	$email = '';
	$contact_number ='';
	$address1 = '';
	$address2 = '';
	$address3 = '';
	$contact_person = '';
	$website = '';
	$purpose = '';
	$desc = '';
	$purpose_string = '';
	if (isset($_POST['reg_button'])) {
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$contact_number = mysqli_real_escape_string($conn, $_POST["number"]);
		$address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
		$address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
		$address3 = mysqli_real_escape_string($conn, $_POST["address3"]);
		$contact_person = mysqli_real_escape_string($conn, $_POST["contact_person"]);
		$website = mysqli_real_escape_string($conn, $_POST["website"]);
		$desc = mysqli_real_escape_string($conn, $_POST["desc"]);

		foreach ($_POST['ngo_purpose'] as $popt)
		{
        	$purpose_string = $purpose_string.$popt.',';
		}

		$username = $_SESSION["username"]; 
		$password = $_SESSION["password"];
		$NGOname = $_SESSION["NGOname"];

		if(!preg_match("/^[6-9][0-9]{9}$/", $contact_number) && !filter_var($website, FILTER_VALIDATE_URL)){
			echo '
           	<script>
            document.getElementById("php-validation").innerHTML = "Number and website address invalid";
            document.getElementById("number").setAttribute("style","border-color:red;");
            document.getElementById("website").setAttribute("style","border-color:red;");
            </script>
            ';
		}
		else{
			if(!filter_var($website, FILTER_VALIDATE_URL)){
				echo '
	           	<script>
	            document.getElementById("php-validation").innerHTML = "Website address invalid";
	            document.getElementById("website").setAttribute("style","border-color:red;");
	            </script>
	            ';
			}
			else if(!preg_match("/^[6-9][0-9]{9}$/", $contact_number)){
				echo '
	           	<script>
	            document.getElementById("php-validation").innerHTML = "Mobile number invalid";
	            document.getElementById("number").setAttribute("style","border-color:red;");
	            </script>
	            ';
			}
			else{
				$query_insert = "INSERT INTO ngo VALUES ('$NGOname','$contact_number','$email','$desc','$purpose_string','$address1','$address2','$address3','$website','$username','$contact_person');";
				$result = mysqli_query($conn, $query_insert);
				$query_insert = "INSERT INTO ngocredentials VALUES ('$NGOname','$username','$password');";
				$result = mysqli_query($conn, $query_insert);
				session_unset();
				session_destroy();
				header("location: login.php");
				ob_end_flush();
			}
		}
	}
?>
</body>
</html>