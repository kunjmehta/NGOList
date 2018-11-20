<?php 
include('connect.php');
session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>NGO Name</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="account.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
				<span class="navbar-brand page-scroll" href="homepage.php">NGOList</span>
			</div>

			<!--Collect the nav links for toggling-->
			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav navbar-right">
      				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account  <i class="fas fa-user-tie"></i><span class="caret"></span></a>
        			<ul class="dropdown-menu">
          				<li><a href="editprofile.php">Profile</a></li>
          				<li><a href="logout.php">Logout</a></li>
        			</ul>
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
					$username = $_SESSION["username"];
					$query_ngoname = "SELECT NAME_OF_NGO FROM ngo WHERE USERNAME = '$username'";
					$result_ngoname = mysqli_query($conn,$query_ngoname);
					while ($row = mysqli_fetch_array($result_ngoname,MYSQLI_ASSOC)) {
						$_SESSION["NGOname"] = $row["NAME_OF_NGO"];
						echo $row["NAME_OF_NGO"];
					}
				?>
			</div>
		</div>

		<div class="row tab-container">
			<div class="col-md-12 col-xs-12 col-sm-12 text-center tabs">
  				<ul class="nav nav-pills">
    				<li><a data-toggle="pill" href="#volunteer" class="col-md-12 col-xs-12 col-sm-12 text-center">Volunteers</a></li>
    				<li><a data-toggle="pill" href="#donor" class="col-md-12 col-xs-12 col-sm-12 text-center">Donors</a></li>
  				</ul>
  			</div>
  	 	</div>

	  	<div class="row table-container"> 
	  		<div class="tab-content col-md-12 col-xs-12 col-sm-12">
	    		<div id="volunteer" class="tab-pane fade in active">
	    			<?php
	    				$ngoname = $_SESSION["NGOname"];
	    				$query_vol = "SELECT * FROM volunteer WHERE NGOname='$ngoname';";
	    				$query_res = mysqli_query($conn,$query_vol);

	    				if(mysqli_num_rows($query_res)==0){
	    					echo "Nobody has volunteered right now";
	    				}

	    				else{
	    					echo '<table class="table-hover table responsive"';
							echo '<tr><th>Name</th><th>Contact</th><th>Address</th><th>Email</th><th>Duration</th></tr>';
							while ($row = mysqli_fetch_array($query_res,MYSQLI_ASSOC)) {
								echo '<tr><td>';
								echo $row["Name"];
								echo '</td><td>';
								echo $row["Contact"];
								echo '</td><td>';
								echo $row["Address"];
								echo '</td><td>';
								echo $row["Email"];
								echo '</td><td>';
								echo $row["Duration"];
								echo '</td></tr>';
							}
						}
						echo "</table>";
	    			?>
		    	</div>
		    
		    	<div id="donor" class="tab-pane fade">
	    			<?php
	    				$query_vol = "SELECT * FROM donor WHERE NGOname = '$ngoname';";
	    				$query_res = mysqli_query($conn,$query_vol);

	    				if(mysqli_num_rows($query_res)==0){
	    					echo "Nobody has donated right now";
	    				}

	    				else{
	    					echo '<table class="table-hover table responsive"';
							echo '<tr><th>Name</th><th>Contact</th><th>Address</th><th>Email</th><th>Amount</th></tr>';
							while ($row = mysqli_fetch_array($query_res,MYSQLI_ASSOC)) {
								echo '<tr><td>';
								echo $row["Name"];
								echo '</td><td>';
								echo $row["Contact"];
								echo '</td><td>';
								echo $row["Address"];
								echo '</td><td>';
								echo $row["Email"];
								echo '</td><td>';
								echo $row["Amount"];
								echo '</td></tr>';
							}
						}
						echo "</table>";
	    			?>
		   		</div>
	  		</div>
		</div>
	</div>
</body>
<html>