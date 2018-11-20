<?php
	include ('connect.php');
	// $get_ngodata = "SELECT * FROM ngo;";
	// $result_ngodata = mysqli_query($conn, $get_ngodata);
?>

<!DOCTYPE html>
<html>
<head>
	<title>NGOList-Locate</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
		$(document).ready(function(){
			$(".map-button").click(function(){
				$(".map-container").slideToggle();
				$(this).find(".fa-angle-up, .fa-angle-down").toggle();
			});
		});
	</script>
	<link rel="stylesheet" type="text/css" href="locate.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
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
				<a class="navbar-brand page-scroll" href="homepage.html">NGOList</a>
			</div>

			<!--Collect the nav links for toggling-->
			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="homepage.php"><b>Home</b></a>
					</li>
					<li>
						<a href="#" class="active"><b>Locate</b></a>
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

	<div class="container">
		<div class="row tab-container">
			<div class="col-md-12 col-xs-12 col-sm-12 text-center tabs">
  				<ul class="nav nav-pills">
    				<li><a data-toggle="pill" href="#all" class="col-md-12 col-xs-12 col-sm-12 text-center">All</a></li>
    				<li><a data-toggle="pill" href="#education" class="col-md-12 col-xs-12 col-sm-12 text-center">Education</a></li>
					<li><a data-toggle="pill" href="#children" class="col-md-12 col-xs-12 col-sm-12 text-center">Children</a></li>
    				<li><a data-toggle="pill" href="#women" class="col-md-12 col-xs-12 col-sm-12 text-center">Women</a></li>
    				<li><a data-toggle="pill" href="#environment" class="col-md-12 col-xs-12 col-sm-12 text-center">Environment</a></li>
    				<li><a data-toggle="pill" href="#elderly" class="col-md-12 col-xs-12 col-sm-12 text-center">Elderly</a></li>
    				<li><a data-toggle="pill" href="#hrights" class="col-md-12 col-xs-12 col-sm-12 text-center">Human Rights</a></li>
    				<li><a data-toggle="pill" href="#grants" class="col-md-12 col-xs-12 col-sm-12 text-center">Grants/Aids</a></li>
    				<li><a data-toggle="pill" href="#poverty" class="col-md-12 col-xs-12 col-sm-12 text-center">Poverty</a></li>
  				</ul>
  			</div>
  	 	</div>

	  	<div class="row table-container"> 
	  		<div class="tab-content col-md-12 col-xs-12 col-sm-12">
	    		<div id="all" class="tab-pane fade in active">
	    			<?php
						$get_ngodata = "SELECT * FROM ngo;";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
				    ?>
		    	</div>
		    
		    	<div id="education" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Education%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
		   		</div>

		   		<div id="women" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Women%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>

	    		<div id="children" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Children%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>

	    		<div id="environment" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Environment%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>

	    		<div id="elderly" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Elderly%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>

	    		<div id="hrights" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Human Rights%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>

	    		<div id="grants" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Grants%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>

	    		<div id="poverty" class="tab-pane fade">
	    			<?php
	    				$get_ngodata = "SELECT * FROM ngo WHERE PURPOSE LIKE '%Poverty%';";
						$result_ngodata = mysqli_query($conn, $get_ngodata);

						if(mysqli_num_rows($result_ngodata)==0){
							echo 'No NGOs found';
						}
						else{
							while($row = mysqli_fetch_array($result_ngodata,MYSQLI_ASSOC)) {
								
								$namengo = $row["NAME_OF_NGO"];
								$contact = $row["Contact_no"];
								$email = $row["EMAIL_ID"];
								$desc = $row["AIM"];
								$purpose = $row["PURPOSE"];
								$website = $row["WEBSITE"];
								$person = $row["CONTACT_PERSON_NAME"];
								$address1 = $row["ADDRESS1"];
								$address2 = $row["ADDRESS2"]; 
								$address3 = $row["ADDRESS3"];

								$address = $address1.", ".$address2.", ".$address3;
								$address_map= $address1.',+'.$address2.',+'.$address3; 

								echo '<div class="row contain-details">';
							    	echo '<div class="col-md-12 col-sm-12 col-xs-12 margin-container">';
							    	    echo '<div class="card">';
							    	        echo '<div class="row card-header col-md-12 col-xs-12 col-sm-12 text-center ngo-name">
							    		       	  	<b>'; echo $namengo; echo'</b>
							    		    	  </div>';
							    		        
							    		    echo '<div class="row card-details col-md-12 col-xs-12 col-sm-12">';
							    			
							    			echo '<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Address:&nbsp;&nbsp;</b>'; echo $address; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact Person:&nbsp;&nbsp;</b>'; echo $person; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Contact:&nbsp;&nbsp;</b>'; echo $contact; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Website:&nbsp;&nbsp;</b>'; echo $website; echo '</p></div>
							    				<div class="col-md-6 col-sm-6 col-xs-12"><p><b>Email ID:&nbsp;&nbsp;</b>'; echo $email; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Purpose:&nbsp;&nbsp;</b>'; echo $purpose; echo '</p></div>
							    				<div class="col-md-12 col-sm-12 col-xs-12"><p><b>Description/Aim:&nbsp;&nbsp;</b>'; echo $desc; echo '</p></div>
							    		    </div>';

							    		    echo '<div class="row map-button text-center">
							    		    	<a class="fa fa-angle-down"></a>
							    		    	<a class="fa fa-angle-up"></a>
							    		    </div>';

							    		    echo '<div class="row map-container text-center">
							    		    	<iframe
												  	width="100%"
												  	height="40%"
												  	frameborder="0" style="border:0"
												  	src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAE4x8s87dyYr_6auXG9CG2BEFpgXnIwC4
												    &q=';echo $address_map;echo '">
												</iframe>
							    		    </div>';
							    	    
							    	    echo '</div>
							    			 </div>
							    			 </div>';
							}
						}
	    			?>
	    		</div>
	  		</div>
		</div>
	</div>
</body>
</html>