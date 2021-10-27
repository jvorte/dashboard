<?php
include('dbconnection/config.php');

if (isset($_GET['itemId']) && isset($_GET['image'])) 
{ 
    //get id and image name
  $id = $_GET['itemId'];
  $image_name = $_GET['image'];
  //remove the image if is avilable
  //delete only if is available
  if ($image_name !="") {

    //get the path
    $path = "images-db/item/".$image_name;

    //remove file  from folder
    $remove = unlink($path);

    if ($remove==false) {
        $_SESSION['upload'] = "<div class='error'>failed to remove image.</div>";
        header('location:view_delete_subcategory.php');
        //stop the process 
        die();

    }
  }

  //the query
  $sql = "DELETE FROM item WHERE itemId=$id";
  //execute the query
  $abfrage=$conn->query($sql);

  //check the query execute it or not
  if ($abfrage == true) {
      //item deleted
    $_SESSION['delete'] = "<div class='success'>item deleted successfuly.</div>";
    header('location:categories.php');
  }
  else {
        //item deleted
    $_SESSION['unauthorized'] = "<div class='error'>item not deleted .</div>";
    header('location:categories.php');
  }

} 

else
{
    
    $_SESSION['delete'] = "<div class='error'>unathorised access.</div>";
    header('location:'.SITEURL.'admin/manage-item.php');

}


?>