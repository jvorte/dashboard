<?php  
                      include('dbconnection/config.php');


                        // check id image_name if is ser or not
                        if (isset($_GET['itemId']) AND isset($_GET['image'])) {
                           
                        //get the value and delete
                            $id = $_GET['itemId'];
                            $image = $_GET['image'];

                            // remove the available physical file 
                            if ( $image_name !="" ) {

                                $path= "images-db/category/".$image;
                                //remove image
                                $remove = unlink($path);

                                //if failed to remove image
                            if ($remove==false) {
                                $_SESSION['upload'] = "<div class='error'>failed to remove image.</div>";
                                header('location:delete_category.php');
                                //stop the process 
                                die();
                            }
                                
                        } 

                            
                            // delete data from database
                            $sql = "DELETE FROM item_category WHERE itemId=$id";

                            //execute query
                            $abfrage=$conn->query($sql);

                            //check if the data are deleted
                            if ($abfrage==true) {
                                //session message
                                $_SESSION['delete']= "<div class='success'> removed category </div>";
                                //redirect
                                header('location:categories.php');
                                }
                                
                            
                            else {
                                //session message
                                $_SESSION['delete']= "<div class='success'> failed to delete category </div>";
                                //redirect
                                header('location:categories.php');
                                    }

                                }
                            else
                            {
                            //redirect to mnage category
                            header('location:view_delete_category.php');
                            }



                        ?>