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
				<div class="row">
				  <div class="col animate-box">
					<a href="index.php"><h1  id="site-title">Dashbord</h1></a>			
					<h6 id="site-subtitle">An easy-to-use work environment for you to edit your Website content, retrieve data such as contact messages, and Newsletters.</h6>
				  </div>

				  <div class="col">
					<div class="top-area animate-box"></div>
				  </div>				
				
			  </div>
		</div>	
	
			<div class="dash-narrow-content">
				<h2 class="dash-heading animate-box" data-animate-effect="fadeInLeft">Subcategories</h2>
				<div class="group-btn-sub">	
			
				
			    </div>
			
           <!-- card area -->

			</div>


			<?php 
                // id is set or not  and bringt the resaults fromn database
     
                //sql to get all details
                $sql = "SELECT * FROM item ";    
                
                //execute query
               
                $abfrage=$conn->query($sql);

                //count the rows to check if is valid
                $count = $abfrage->rowCount();

              
                // # get all data
                while( $row= $abfrage->fetch() )
                {
                $id = $row['itemId'];
                $name = $row['itemName'];
                $group = $row['itemGroup'];
                $info = $row['itemInfo'];
                $description = $row['itemDescription'];
                $image = $row['image_name'];             
                
                  
       
           
            ?>
                <!-- card area -->

                <div class="card mb-3 animate-box" id="view-card">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img style="max-height:230px;" src="images-db/item/<?php echo $image;?>"  class="img-fluid rounded-start" alt="...">
					
					<button onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary animate-box" id="dlt-sub-btn">Delete</button>
				</div>
				
                    <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $name;?></h4>
						<div class="form-floating">
					<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 140px;padding-top:10px;" ><?php echo $info;?></textarea>
			
					</div>
					<div class="form-floating">
					<textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 170px ; margin-top:10px;"><?php echo $info;?></textarea>
				
					</div>
          
                    </div>
                    </div>
                </div>
                </div>
				<div id="id01" class="modal">
					<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
					<form class="modal-content" action="/action_page.php">
						<div class="container">
						<h1>Delete Subcategory</h1>
						<p>Are you sure you want to delete your Subcategory?</p>
						
						<div class="clearfix">
							<button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-primary ">Cancel</button>
							<a href="delete_subcategory.php?itemId=<?php echo $id;?>&image=<?php echo $image;?>"><h6 class="btn btn-warning " >Delete</h6></a>
                   
						</div>
						</div>
					</form>
					</div>

					<script>
					// Get the modal
					var modal = document.getElementById('id01');

					// When the user clicks anywhere outside of the modal, close it
					window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
					}
					</script>

               
                <?php     }
                         
                         ?> 
		
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

