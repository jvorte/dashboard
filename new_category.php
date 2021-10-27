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
	
	
<h2 class="dash-heading animate-box" data-animate-effect="fadeInLeft">New Category</h2>  
<div class="container-fluid">	

	<!-- card area -->

<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"><h5>Name</h5> </label>
    <input type="text" class="form-control" id="inputEmail4" name="name">
  </div>
  <div class=" col-md-6">
  <label for="formFile" class="form-label"><h5>Select Image</h5></label>
  <input class="form-control" type="file" id="formFile" name="image">
</div>


  <div class="col-md-6">
  <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="active">
  <label class="form-check-label" for="flexSwitchCheckDefault"  ><h6>Active</h6> </label>
</div>
</div>
<div class="col-md-6">
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="featured">
  <label class="form-check-label" for="flexSwitchCheckChecked"><h6>Featured</h6> </label>
</div>
</div>
 
  <div class="col-12">
    <button type="submit" name="submit" class="btn btn-primary">Create</button>
  </div>
</form>

</div>

						
						<!-- card area -->


						<?php
    
    if (isset($_POST['submit'])) 
    {

            // get the value from form
            $name = $_POST['name'];
            //radio button check selected
if (isset($_POST['featured'])) 
 {

                $featured= $_POST['featured'];

            }
        else
            {
                $featured = "off";

            }
        if (isset($_POST['active']))
            {
                $active= $_POST['active'];
            }
        else
            {
                $active ="off";
            }
            // check if img selected nas set the value for image
            
    if (isset($_FILES['image']['name']))
       {

            //upload img , we need name /source /path

        $image_name = $_FILES['image']['name'];

     if ($image_name != "")
        {
        //  **  auto rename image**

        //get the the extension of our image
        $ext = end(explode('.',$image_name));

        // rename image
        $image_name = "item_category_".rand(000,999).'.'.$ext;

        //upload the file only if is selected
    
            $source_path = $_FILES['image']['tmp_name'];

        $destination_path= "images-db/category/".$image_name;
        

        //upload img
        $upload = move_uploaded_file($source_path,$destination_path);

        //check the image is uploaded
        
        if ($upload==false)
         {

        $_SESSION['upload']=  "<div class='error'>failed to upload image</div>";
        // redirect add category
        header('location:new_category.php');
        //stop the process
        die();
       }

        }
     else 
        {

      $image_name= "";

      }
         // sql query
         $sql= "INSERT INTO item_category SET
          itemName =' $name',
          image_name= '$image_name',
          featured = '$featured',
          active = '$active' 
          ";

          //execute query and save

          $abfrage=$conn->query($sql);
          //check if query executed

          if ($abfrage==true) 
          {
              $_SESSION['add'] =  "<div class='success'> Added succssfully.</div>";
              //redirect to category page
              header('location:categories.php');

             
          } 
          else 
          {
            $_SESSION['add']=  "<div class='error'> Added Not succssfully.</div>";
            //redirect to category page
            header('location:new_category.php');
            echo "ok";
          }       

}
}



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

