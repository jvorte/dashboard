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
    <?php 
        if (isset($_GET['itemId']))
        {
                        
                        # get id and all others details
                    $id = $_GET['itemId'];
                    //sql to get all details
                    $sql2 = "SELECT * FROM item WHERE itemId=$id";    
                    
                    //execute query
                    $req2=$conn->query($sql2);
                    //get the value based on query executed
                    while( $row2= $req2->fetch() )
                    {

                    $id = $row2['itemId'];
                    $name = $row2['itemName'];
                    $itemDescription = $row2['itemDescription'];
                    $itemInfo = $row2['itemInfo'];
                    $current_image = $row2['image_name'];
                    $current_category = $row2['itemGroup'];
                    $featured = $row2['featured'];
                    $active = $row2['active'];       
                   }  
                
        }
                 
        ?>		
	
				<h2 class="dash-heading animate-box" data-animate-effect="fadeInLeft">Edit Subcategory </h2> 
         






				<!-- form area ============================================================-->




				<div class="container">

				<form class="row g-3" method="POST" enctype="multipart/form-data">
				<div class="col-md-6">
        
					<label for="inputEmail4" class="form-label"><h6>Name</h6></label>
					<input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $name;?>">
				</div>

        

				<div class="col-md-4">
					<label for="inputState" class="form-label"><h6>Select Category</h6></label>
          <select id="inputState" class="form-select" name="category" >
          <?php
                    //query to get active categories
                    $sql= "SELECT * FROM item_category WHERE active ='on'";
                    //execute query
                    $req=$conn->query($sql);
                    //count rows
                    $count = $req->rowCount();

            if ($count>0) 
                {                 
                while( $row= $req->fetch() )
                {
                    $itemName = $row['itemName'];
                    $itemId  = $row['itemId'];              
                    ?>

                    <!-- dispaly the values  -->
              
                 
                    <option <?php if ($itemName  == $itemId ) echo "selected";?>value="<?php echo $itemId ;?>"><?php echo $itemName; ?></option>
                    <?php
            
                }                
                } 
                
                else
                {
                    echo "<option value='0'>Category not avialable.</option>";
                }          

                
                ?>
       
				
					</select>
				</div>
				<div class="col-12">
					<!-- <label for="inputAddress" class="form-label"><h6>Informations</h6></label> -->
          <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="infos"><?php echo $itemInfo; ?></textarea>
        </div>
					<!-- <input type="text" class="form-control" id="inputAddress" value="<?php echo $itemInfo; ?>" name="infos"> -->
				</div>
				<div class="col-12">
					<!-- <label for="inputAddress2" class="form-label"><h6>Description</h6> </label> -->
          <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="6" name="description"><?php echo $itemDescription; ?></textarea>
        </div>

					<!-- <input type="text" class="form-control" id="inputAddress2" value=" <?php echo $itemDescription; ?>" name="description"> -->
				</div>
				<div class=" col-md-6">
				<label for="formFile" class="form-label"><h5>Current Image</h5></label>
                <?php
                        if ($current_image!="") 
                        {
                            //display image in manage category
                            ?>
                            <img src="images-db/item/<?php echo $current_image;?>" width="150px">
                            <?php
                        }
                        else 
                        {
                            //display message...
                            echo "<div class='error'>image not added.</div>";
                        }
                        ?> 
			
				</div>
                <div class=" col-md-6">
				<label for="formFile" class="form-label"><h5>Select Image</h5></label>
				<input class="form-control" type="file"  id="formFile" name="image">
				</div>

        <div class="col-md-6">
          <div class="form-check form-switch">
          <label class="form-check-label" for="defaultCheck1">
          <h6>Active</h6> 
          </label>
          <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="on" required > On
          <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="off"required> Off

        </div>
        </div>
        <div class="col-md-6">
        <div class="form-check form-switch">
        <label class="form-check-label" for="defaultCheck1">
            <h6>Featured</h6>
          </label>
        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="on" required> On
        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="off"required> Off
        </div>
        </div>
				
				<div class="col-12">
					<button type="submit" name="submit"  class="btn btn-primary">Edit</button>
				</div>
				</form>

        <?php if (isset($_POST['submit']))
                 {
                        $title = $_POST['name'];
                        $description = $_POST['description'];
                        $infos = $_POST['infos'];
                        // $current_image = $_POST['image'];
                        $category = $_POST['category'];
                        $featured = $_POST['featured'];
                        $active = $_POST['active'];
          

                    if (isset($_FILES['image']['name'])) 
                        {
                            // get image details
                            $image_name=$_FILES['image']['name']; // new name

                    if ($image_name!="") 
                    {
                                //get the the extension of our image

                        $ext = end(explode('.',$image_name));

                        // rename image
                        $image_name = "item_Name_".rand(0000,9999).'.'.$ext;


                        $src_path = $_FILES['image']['tmp_name']; //sourse path

                        $dest_path= "images-db/item/".$image_name; //destination path

                        $upload = move_uploaded_file($src_path,$dest_path); // upload image

                    if ($upload==false) 
                        {
                            $_SESSION['upload']=  "<div class='error'>failed to upload image</div>";
                            // redirect add category
                            header('location:edit_subcategory.php');
                            //stop the process
                            die();
                            }
                      if($current_image!=""){
                        $remove_path = "images-db/item/".$current_image;

                        $remove = unlink($remove_path);

                          //check the image removed - if failed display message
                    if ($remove==false) 
                    {
                        # failed remove image
                        $_SESSION['remove=failed']=  "<div class='error'>remove failed</div>";
                        // redirect add category
                        header('location:edit_subcategory.php');
                        die();
                     }
                      }      
                    }                
                      else 
                    {
                        $image_name = $current_image; // default image if the image is not selected
                    }   
                 }
                 
            
                 else 
                    {
                        $image_name = $current_image; // deg=fault when butto is not clicked
                    } 

                  
                    //update the database
                    $sql3 = " UPDATE item SET
                    itemName = '$title',
                    itemDescription ='$description',
                    itemInfo ='$infos',
                    image_name ='$image_name',
                    itemGroup ='$category',
                    featured ='$featured',            
                    active = '$active' 
                    WHERE itemId=$id
                    ";   
                    
              //execute query
              $abfrage3=$conn->query($sql3);
             

              if ($abfrage3=true)
               {
                //category update

                // $_SESSION['update']=  "<div class='update'>item Updated successfuly</div>";
             
                 echo "<script type='text/javascript'>window.top.location='subcategories.php';</script>"; 
               
                } 
            else {


                // $_SESSION['update']=  "<div class='error'>item Not Updated </div>";
                // // redirect add category
                // echo "<script type='text/javascript'>window.top.location='categories.php';</script>"; 
         
            }
}?>


        

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

