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
	<title>NGOList-Volunteer</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="volunteer.css">
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
	<div class="container container1">
		<div class="col-md-3 col-xs-1 col-sm-3">
		</div>

		<div class="col-md-6 col-sm-6 col-xs-10 form text-center">
			<div class="row text-center" id="php-validation">
			</div>

			<div class="row form-title">
				<span>Volunteer</span></br>Fill out the form below to volunteer and do your bit for the society 
			</div>

			<form method="post" action="volunteer.php">
				<div class="form-group col-md-6">
			      	<input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
				</div>

				<div class="form-group col-md-6	">
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
			      	<input type="number" class="form-control" id="duration" placeholder="Duration (in months)" name="duration" required>
			    </div>

			    <div class="button-container">
				    <div class="form-group col-md-12 text-center">
				    	<button type="submit" class="btn btn-lg col-md-12 col-sm-12 col-xs-12" name="vol_button">Submit</button>
				    </div>
				</div>
		  	</form>
		</div>

		<div class="col-md-3 col-xs-1 col-sm-3">
		</div>
	</div>

	<div id="arrow" class="row text-center down-arrow-container">
		<div class="fa fa-angle-down page-scroll" href="#testimonials"></div>
	</div>
	
	<script>
		$("#arrow").click(function() {
    		$('html, body').animate({
        		scrollTop: $("#testimonials").offset().top
    		}, 2000);
		});
	</script>

	<?php
	    $query_testi = "SELECT Volunteer, Testimonial, Image FROM testimonials";
	    $query_res = mysqli_query($conn,$query_testi);

	    if(mysqli_num_rows($query_res)!=0){
			echo'
	    		<div class="container-fluid testimonials" id="testimonials">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6 col-sm-12 col-xs-12 testi-title text-center">
							Testimonials
						</div>
						<div class="col-md-3"></div>
				</div>';

				while ($row = mysqli_fetch_array($query_res,MYSQLI_ASSOC)) {
						echo '
						<div class="row">
							<div class="testi-content-img col-md-12 col-xs-12 col-sm-12 text-center">
								<img src="data:image/jpeg;base64,'.base64_encode($row["Image"]).'"'; echo' class="img-circle">
							</div>

							<div class="testi-content-testi col-md-12 col-xs-12 col-sm-12 text-center">';
								echo $row["Testimonial"];
								echo '<br/>';
								echo '-'.$row["Volunteer"];
							echo '
							</div>
						</div>';
					}
				echo '</div>';
			}
		?>	    		
		
	<?php
	$name = '';
	$email = '';
	$contact_number ='';
	$address = '';
	$duration = '';
	$NGOname = '';

	if (isset($_POST["vol_button"])) {
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$contact_number = mysqli_real_escape_string($conn, $_POST["contact"]);
		$address = mysqli_real_escape_string($conn, $_POST["address"]);
		$name = mysqli_real_escape_string($conn, $_POST["name"]);
		$duration = mysqli_real_escape_string($conn, $_POST["duration"]);
		$NGOname = mysqli_real_escape_string($conn, $_POST["ngo_name"]);

		if(!preg_match("/^[6-9][0-9]{9}$/", $contact_number) && ($duration>12 || $duration <1)){
			echo '
           	<script>
            document.getElementById("php-validation").innerHTML = "Mobile number and duration invalid.";
            document.getElementById("number").setAttribute("style","border-color:red;");
            document.getElementById("duration").setAttribute("style","border-color:red;");
            </script>
            ';
		}
		else{
			if($duration>12 || $duration<1){
				echo '
	           	<script>
	            document.getElementById("php-validation").innerHTML = "Duration invalid";
	            document.getElementById("duration").setAttribute("style","border-color:red;");
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
				$query_insert = "INSERT INTO volunteer VALUES ('$name','$contact_number','$address','$email','$NGOname','$duration');";
				$result = mysqli_query($conn, $query_insert);
				// session_unset();
				// session_destroy();
				echo '
				<script>
	            document.getElementById("php-validation").innerHTML = "Volunteering successful"; 
	            </script>
	            ';
				//header("location: homepage.php");
			}
		}
	}

	?>

</body>
</html>