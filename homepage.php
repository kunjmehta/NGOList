<!DOCTYPE html>
<html>
<head>
	<title>Welcome to NGOList!</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--All CSS and JS files-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="animate.css">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="homepage.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
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
						<a href="login.php" id="login-link"><b>Login</b></a>
					</li>
				</ul>
			</div>
			<!--navbar collapse ends-->
		</div>
		<!--container ends-->
	</nav>
	<!--NAVBAR ENDS -->

	
	<!--Text above background image-->
	<section class="intro text-center">
	    <div class="overlay">
	        <div class="intro-content animated fadeInDown delay-05s">
	            <h1>Welcome to <span class="name-tag">NGOList</span></h1>
	            <p>The search engine for all NGOs in Mumbai</p>
	        </div>
	    </div>
	</section>
	
	<!--FEATURES STARTS -->
	<section class="features">
		<div class="container-fluid">
			
			<!--heading -->
			<div class="row">
				<div class="col align-self-center text-center">
					<span class="features-heading">FEATURES</span>
				</div>
			</div>
			
			<!--Feature 1:Locate-->
			<div class="row">
				<div class="col-md-4">
					<a href="locate.php"><div class="icon-container text-center">
						<i class="fas fa-map-marker-alt"></i>
					</div></a>
					<div class="feature-subheading-container text-center">
						<h4><strong>LOCATE</strong></h4>
					</div>

					<div class="features-description text-center">
						Tired of always searching for small offices of the NGO you want to visit? Try our NGO locator to search for it.
					</div>
				</div>
				
				<!--Feature 2:Volunteer-->
				<div class="col-md-4">
					<a href="volunteer.php"><div class="icon-container text-center">
						<i class="fas fa-hands-helping"></i>
					</div></a>
					<div class="feature-subheading-container text-center">
						<h4><strong>VOLUNTEER</strong></h4>
					</div>

					<div class="features-description text-center">
						Leave your mark on the world by volunteering for the cause you feel for.
					</div>
				</div>
				
				<!--Feature 3:Donate-->
				<div class="col-md-4">
					<a href="donate.php"><div class="icon-container text-center">
						<i class="fas fa-donate"></i>
					</div></a>
					<div class="feature-subheading-container text-center">
						<h4><strong>DONATE</strong></h4>
					</div>

					<div class="features-description text-center">
						Not enough time to volunteer? Donate your money and we promise it will be put to good use.
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--FEATURES ENDS -->

	<!--FOOTER STARTS-->
	<footer>
		<div class="container-fluid text-center">
			<div class="row ">
				<div class="col-md-12 contact-container">
					Are you an NGO and want us to add your details?
					Contact us at kunjcmehta@gmail.com
				</div>
			</div>
		</div>
	</footer>
</body>
</html>