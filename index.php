<?php include('dbconnection/config.php');

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/fluency/48/000000/microsoft-office-delve-2020.png" />

 

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="dash-page">
		<a href="#" class="js-dash-nav-toggle dash-nav-toggle"><i></i></a>
		<aside id="dash-aside" role="complementary" class="border js-fullheight">

			<h1 id="dash-logo"><a href="index.php">WebSite</a></h1>

			<div class="welcome">
				  <ul>
				    <li class=""> <h4>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]);?></b>. Welcome!</h4></li>
				    <li class=""><a href="login_system/logout.php" class="">Sign Out of Your Account</a></li>
					<li class=""><a href="login_system/reset-password.php" class="">Reset Your Password</a></li>
				</ul>
			</div>
			  

			<nav id="dash-main-menu" role="navigation">
				

				<ul>
				    <li class="dash-active"><a href="index.php">Home</a></li>
					<li><a href="categories.php">Categories</a></li>
					<li><a href="subcategories.php">Subcategories</a></li>
					<li><a href="contact.php">Contacts</a></li>
					<li><a href="newsletter.php">Newsletter</a></li>
				</ul>
			</nav>
		
	
			<div class="dash-footer">
				<p><small>&copy; 2021 All Rights Reserved.</span> <span>Designed by <a href="" target="_blank">D.Vortelinas</a> </span> </p>			
			</div>

		</aside>
	
		<div id="dash-main">	
		
		<div class="container">


		<div class="page-header">	

					<div class="row">
					  <div class="col animate-box">
						
				<a href="index.php"><h1  id="site-title">Dashboard</h1></a>
						
						<h6 id="site-subtitle">An easy-to-use work environment for you to edit your Website content, retrieve data such as contact messages, and Newsletters.</h6>
					 
					</div>

					  <div class="col animate-box">						
						<div class="top-area"></div>
					 </div>				
					
				  </div>
			</div>	
			
			
			<div class="dash-narrow-content">
				<h1 class="dash-heading animate-box" data-animate-effect="fadeInLeft">Services</h1>
				<div class="row">

					<div class="col-md-6">
						<div class="dash-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="dash-icon">
								<i class="lnr lnr-file-add"></i>
							</div>
							<div class="dash-text">
								<a href="categories.php"><h2>Categories</h2></a>
								<p>You can view all the categories you have entered, add new ones, delete and edit.</p>
							</div>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="dash-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="dash-icon">
								<i class="lnr lnr-enter"></i>
							</div>
							<div class="dash-text">
								<a href="subcategories.php"><h2>Subcategories</h2></a>
								<p>You can see all the subcategories you have entered, add new ones, delete and edit. </p>
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="dash-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="dash-icon">
								<i class="lnr lnr-user"></i>
							</div>
							<div class="dash-text">
								 <a href="contact.php"><h2>Contacts</h2></a>
								<p>Υou can see and read all the messages you have received for your website. </p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="dash-feature animate-box" data-animate-effect="fadeInLeft">
							<div class="dash-icon">
								<i class="lnr lnr-envelope"></i>
							</div>
							<div class="dash-text">
								<a href="newsletter.php"><h2>Newsletter</h2></a>
								<p>You can see all the newsletter subscriptions you have received for your site. </p>
							</div>
						</div>
					</div>
				</div>
			</div>




			

		
		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	

	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>

