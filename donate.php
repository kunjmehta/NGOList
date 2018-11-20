<?php 
	include ('connect.php');
 	$get_ngonames="SELECT NAME_OF_NGO FROM ngo;";
 	$result_ngonames = mysqli_query($conn,$get_ngonames);
 	$ngo_options = '';
 	while($row = mysqli_fetch_array($result_ngonames,MYSQLI_ASSOC))
	{
		$ngo_options .= '<option value = "'.$row['NAME_OF_NGO'].'">'.$row['NAME_OF_NGO'].'</option>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>NGOList-Donate</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="donate.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
	<script type="text/javascript" src="list.js"></script>
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
						<a href="#"><b>Donate</b></a>
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

		<div class="col-md-6 col-xs-10 col-sm-6 form">
			<div class="row text-center" id="php-validation">
			</div>

			<div class="row form-title">
				<span>Donate</span></br>Fill out the form below to proceed to donating to others
			</div>

			<form method="post" action="donate.php">
				<div class="form-group col-md-6">
			      	<input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
				</div>

				<div class="form-group col-md-6">
					<input type="tel" class="form-control" id="contact" placeholder="Contact" name="contact" maxlength="10" required>
				</div>

				<div class="form-group col-md-12">
					<input type="textarea" class="form-control" id="address" placeholder="Address" name="address" required>
				</div>

			    <div class="form-group col-md-12">
			      	<input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
			    </div>

			    <div class="form-group col-md-12">
			    	<select class="form-control select" name="ngo_name" required>
    					<option class="option" style="color:gray" value="null" selected disabled>Select NGO</option>
    					<?php echo $ngo_options; ?>
			    	</select>
			    </div>

			    <div class="form-group col-md-12">
			      	<input type="text" class="form-control" id="amount" placeholder="Amount donated" name="amount" required>
			    </div>

			    <div class="button-container">
				    <div class="form-group col-md-12 text-center">
				    	<button type="submit" class="btn btn-lg col-md-12 col-sm-12 col-xs-12" name ="don_button">Submit</button>
				    </div>
				</div>
		  	</form>

<!-- 		  	<div class="row form-footer">
		  		You can also contact the NGO at this number
		  	</div> -->
		</div>

		<div class="col-md-3 col-sm-3 col-xs-1">
		</div>

	</div>

	<?php
	$name = '';
	$email = '';
	$contact_number ='';
	$address = '';
	$amount = '';
	$NGOname = '';

	if (isset($_POST["don_button"])) {
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$contact_number = mysqli_real_escape_string($conn, $_POST["contact"]);
		$address = mysqli_real_escape_string($conn, $_POST["address"]);
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$amount = mysqli_real_escape_string($conn, $_POST["amount"]);
		$NGOname = mysqli_real_escape_string($conn, $_POST["ngo_name"]);

		if(!preg_match("/^[6-9][0-9]{9}$/", $contact_number) && ($amount == 0.0 || $amount == 0)){
			echo '
           	<script>
            document.getElementById("php-validation").innerHTML = "Mobile number and amount invalid.";
            document.getElementById("number").setAttribute("style","border-color:red;");
            document.getElementById("duration").setAttribute("style","border-color:red;");
            </script>
            ';
		}
		else{
			if(!preg_match("/^[6-9][0-9]{9}$/", $contact_number)){
				echo '
	           	<script>
	            document.getElementById("php-validation").innerHTML = "Mobile number invalid";
	            document.getElementById("number").setAttribute("style","border-color:red;");
	            </script>
	            ';
			}
			else if($amount == 0.0 || $amount == 0){
				echo '
				<script>
	            document.getElementById("php-validation").innerHTML = "Amount invalid";
	            document.getElementById("amount").setAttribute("style","border-color:red;");
	            </script>
	            ';
			}
			else{
				$query_insert = "INSERT INTO donor VALUES ('$name','$contact_number','$address','$email','$NGOname','$amount');";
				$result = mysqli_query($conn, $query_insert);
				// session_unset();
				// session_destroy();
				echo '
				<script>
	            document.getElementById("php-validation").innerHTML = "Donating successful. You will be notified once payment is verified."; 
	            </script>
	            ';
				//header("location: homepage.php");
			}
		}
	}
	?>
</body>
</html>