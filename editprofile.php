<?php 
	include('connect.php');
	session_start();
	ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>NGOList-Edit Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="editprofile.css">
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
				<span class="navbar-brand page-scroll" href="homepage.php">NGOList</span>
			</div>

			<!--Collect the nav links for toggling-->
			<div class="collapse navbar-collapse" id="nav-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Account  <i class="fas fa-user-tie"></i><span class="caret"></span></a>
        			<ul class="dropdown-menu">
          				<li><a href="#">Profile</a></li>
          				<li><a href="logout.php">Logout</a></li>
        			</ul>
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
			
			<div class="row form-title text-center col-xs-12 col-sm-12 col-md-12">
				<span>Edit Profile</span></br>
				<?php
					$NGOname = $_SESSION["NGOname"];
					echo $NGOname;
				?>
			</div>

			<form method="post" action="editprofile.php">
				<div class="form-group col-md-6">
			      	<input type="text" class="form-control" id="nameNGO" placeholder="Name of NGO" name="nameNGO" required
			      	value="<?php 
			      				echo $NGOname;
			      			?>" 
			      	>
				</div>
				
				<div class="form-group col-md-6">
			      	<input type="tel" class="form-control" id="number" placeholder="Contact number" name="number" maxlength="10" required
			      	value="<?php 
			      				$query = "SELECT Contact_no FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["Contact_no"];
								}
			      			?>" 
			      	>
				</div>

				<div class="form-group col-md-12">
			      	<input type="email" class="form-control" id="email" placeholder="Email" name="email" required
			      	value="<?php 
			      				$query = "SELECT EMAIL_ID FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["EMAIL_ID"];
								}
			      			?>" 
			      	>
				</div>

				<div class="form-group col-md-4 col-xs-12 col-sm-4">
					<input type="textarea" class="form-control" id="address1" placeholder="Address1" name="address1" required		value="<?php 
			      				$query = "SELECT ADDRESS1 FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			      				echo $row["ADDRESS1"]; 
								}
			      			?>" 
			      	>
				</div>

				<div class="form-group col-md-4 col-xs-12 col-sm-4">
					<input type="textarea" class="form-control" id="address2" placeholder="Address Line 2" name="address2" required		value="<?php 
			      				$query = "SELECT ADDRESS2 FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["ADDRESS2"];
								}
			      			?>" 
			      	>
				</div>

				<div class="form-group col-md-4 col-xs-12 col-sm-4">
					<input type="textarea" class="form-control" id="address3" placeholder="Address Line 3" name="address3" required		value="<?php 
			      				$query = "SELECT ADDRESS3 FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["ADDRESS3"];
								}
			      			?>" 
			      	>
				</div>

				<div class="form-group col-md-12">
					<input type="text" class="form-control" id="contact_person" placeholder="Contact person" name="contact_person" required
					value="<?php 
			      				$query = "SELECT CONTACT_PERSON_NAME FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["CONTACT_PERSON_NAME"];
								}
			      			?>" 
			      	>
				</div>

				<div class="form-group col-md-12">
					<input type="text" class="form-control" id="website" placeholder="Website" name="website" required
					value="<?php 
			      				$query = "SELECT WEBSITE FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["WEBSITE"];
								}
			      			?>" 
			      	>
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
					<input type="textarea" class="form-control" id="desc" placeholder="Description/Aim" name="desc" required
					value="<?php 
			      				$query = "SELECT AIM FROM ngo WHERE NAME_OF_NGO ='$NGOname';";
			      				$result = mysqli_query($conn, $query);
			      				while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									echo $row["AIM"];
								}
			      			?>" 
			      	>
				</div>

			    <div>
			    	<div class="form-group col-md-4 col-sm-6 col-xs-12 text-center clearfix button-container">
				    	<a class="btn btn-lg pull-left col-md-12 col-xs-12 col-sm-12" href="account.php">Back</a>
				    </div>

				    <div class="col-md-4 col-sm-0 col-xs-0">
				    </div>

				    <div class="form-group col-md-4 col-xs-12 col-sm-6 text-center clearfix button-container">
				    	<button type="submit" class="btn btn-lg pull-right col-md-12 col-xs-12 col-sm-12" name="update_info">Save</button>
				    </div>
				</div>
		  	</form>
		</div>

		<div class="col-md-3 col-sm-3 col-xs-1">
		</div>
	</div>

	<?php
		if(isset($_POST["update_info"])){
			$nameNGO = mysqli_real_escape_string($conn, $_POST["nameNGO"]);
			$contact = mysqli_real_escape_string($conn, $_POST["number"]);
			$address1 = mysqli_real_escape_string($conn, $_POST["address1"]);
			$address2 = mysqli_real_escape_string($conn, $_POST["address2"]);
			$address3 = mysqli_real_escape_string($conn, $_POST["address3"]);
			$person = mysqli_real_escape_string($conn, $_POST["contact_person"]);
			$website = mysqli_real_escape_string($conn, $_POST["website"]);
			$desc = mysqli_real_escape_string($conn, $_POST["desc"]);
			$email = mysqli_real_escape_string($conn, $_POST["email"]);
			$purpose_string='';

			foreach ($_POST['ngo_purpose'] as $popt)
			{
        		$purpose_string = $purpose_string.$popt.',';
			}

			if(!preg_match("/^[6-9][0-9]{9}$/", $contact) && !filter_var($website, FILTER_VALIDATE_URL)){
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
				else if(!preg_match("/^[6-9][0-9]{9}$/", $contact)){
					echo '
		           	<script>
		            document.getElementById("php-validation").innerHTML = "Mobile number invalid";
		            document.getElementById("number").setAttribute("style","border-color:red;");
		            </script>
		            ';
				}
				else{
					$update_query = "UPDATE ngo SET NAME_OF_NGO = '$nameNGO',
													Contact_no = '$contact', 
													EMAIL_ID = '$email', 
													AIM = '$desc', 
													PURPOSE = '$purpose_string', 
													ADDRESS1 = '$address1',
													ADDRESS2 = '$address2',
													ADDRESS3 = '$address3',
													WEBSITE = '$website', 
													CONTACT_PERSON_NAME = '$person' 
													WHERE NAME_OF_NGO = '$NGOname';";	//original is NGOname, updated is nameNGO
					$update_result = mysqli_query($conn, $update_query);
					header("location: account.php");
					ob_end_flush();
				}
			}
		}
	?>
</body>
</html>