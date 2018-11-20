<?php include ('connect.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>NGOList-Admin Panel</title>
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
	<link rel="stylesheet" type="text/css" href="admin.css">
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
				<span class="navbar-brand page-scroll">NGOList Admin</span>
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
					<li>
						<a href="logout.php"><b>Admin Logout</b></a>
					</li>
				</ul>
			</div>
			<!--navbar collapse ends-->
		</div>
		<!--container ends-->
	</nav>
	<!--NAVBAR ENDS -->

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 text-center ngo-name">
				<?php 
						echo "Admin Panel";
				?>
			</div>
		</div>

		<div class="row tab-container">
			<div class="col-md-12 col-xs-12 col-sm-12 text-center tabs">
  				<ul class="nav nav-pills">
    				<li><a data-toggle="pill" href="#tdonor" class="col-md-12 col-xs-12 col-sm-12 text-center">Total Donations</a></li>
    				<li><a data-toggle="pill" href="#tvolunteer" class="col-md-12 col-xs-12 col-sm-12 text-center">Total Volunteers</a></li>
    				<li><a data-toggle="pill" href="#testimonials" class="col-md-12 col-xs-12 col-sm-12 text-center">Add Testimonial</a></li>
  				</ul>
  			</div>
  	 	</div>

	  	<div class="row table-container"> 
	  		<div class="tab-content col-md-12 col-xs-12 col-sm-12">
	    		<div id="tdonor" class="tab-pane fade in active">
	    			<?php
	    				$total_donations = 0;
	    				$query_donations = "SELECT Name, NGOname, Amount FROM donor ORDER BY NGOname";
	    				$query_res = mysqli_query($conn,$query_donations);

	    				if(mysqli_num_rows($query_res)==0){
	    					echo "Zero donations right now";
	    				}

	    				else{
	    					echo '<table class="table table-hover table-responsive table-bordered"';
							echo '<tr><th>Donor Name</th><th>NGOname</th><th>Amount</th></tr>';
							while ($row = mysqli_fetch_array($query_res,MYSQLI_ASSOC)) {
								echo '<tr><td>';
								echo $row["Name"];
								echo '</td><td>';
								echo $row["NGOname"];
								echo '</td><td>';
								echo $row["Amount"];
								echo '</td></tr>';
								$total_donations = $total_donations + $row["Amount"];
							}
						}
						echo '<tr><td></td><td></td><td>';
						echo '<b>Total:'. $total_donations.'</b>';
						echo "</table>";
	    			?>
		    	</div>

		    	<div id="tvolunteer" class="tab-pane fade in">
	    			<?php
	    				$total_volunteers=0;
	    				$query_vol = "SELECT Name, NGOname, Duration FROM volunteer ORDER BY NGOname";
	    				$query_res = mysqli_query($conn,$query_vol);

	    				if(mysqli_num_rows($query_res)==0){
	    					echo "Zero volunteers right now";
	    				}

	    				else{
	    					echo '<table class="table table-hover table-responsive table-bordered"';
							echo '<tr><th>Volunteer Name</th><th>NGOname</th><th>Duration</th></tr>';
							while ($row = mysqli_fetch_array($query_res,MYSQLI_ASSOC)) {
								echo '<tr><td>';
								echo $row["Name"];
								echo '</td><td>';
								echo $row["NGOname"];
								echo '</td><td>';
								echo $row["Duration"];
								echo '</td></tr>';
								$total_volunteers++;
							}
						}
						echo '<tr><td></td><td></td><td>';
						echo '<b>Total:'. $total_volunteers.'</b>';
						echo "</table>";
	    			?>
		    	</div>

		    	<div id="testimonials" class="tab-pane fade in col-md-12 col-sm-12 col-xs-12">
		    		<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="row text-center" id="php-validation">
						</div>

						<form method="post" action="admin.php" enctype="multipart/form-data">
							<div class="form-group col-md-12">
						      	<input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
							</div>

							<div class="form-group col-md-12">
						      	<input type="file" class="form-control" id="ppimg" name="ppimg" required>
							</div>

							<div class="form-group col-md-12">
								<textarea rows="3" class="form-control" id="test" placeholder="Type your testimonial here" name="testimonial" required></textarea>
							</div>

						    <div class="button-container">
							    <div class="form-group col-md-12 text-center">
							    	<button type="submit" class="btn btn-lg col-md-12 col-sm-12 col-xs-12" id="testi_button" name="testi_button">Add Testimonial</button>
							    </div>
							</div>
					  	</form>
					</div>
					
	    			<?php
	    				if(isset($_POST["testi_button"])){
	    					echo '
	    						<script>
	    						var image_name = $(\'#ppimg\').val();
								if(image_name == \'\'){
									$(\'#php-validation\').html("Please select image");
									return false;
								}
								else{
									var extension = $(\'#ppimg\').val().split(\'.\').pop().toLowerCase();
									if(jQuery.inArray(extension,[\'gif\',\'png\',\'jpeg\',\'jpg\']) == -1){
										$(\'#php-validation\').html("Invalid image file");
										$(\'#ppimg\').val(\'\');
										return false;
									}
								</script>
								';

	    					$name = mysqli_real_escape_string($conn, $_POST["name"]);
							$testimonial = mysqli_real_escape_string($conn, $_POST["testimonial"]);
	    					$file = addslashes(file_get_contents($_FILES["ppimg"]["tmp_name"]));
	    					$query = "INSERT INTO testimonials VALUES ('$name','$testimonial','$file');";
	    					if(mysqli_query($conn, $query)){
	    						echo '
	           						<script>
	            					document.getElementById("php-validation").innerHTML = "Testimonial inserted";
	            					</script>
	            				';
	    					}
	    				}
	    			?>
		    	</div>
		    </div>
		</div>
	</div>
</body>
</html>