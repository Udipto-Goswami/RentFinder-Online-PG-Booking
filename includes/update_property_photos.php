<?php include "mongo_connection.php";?>

<?php
if (isset($_POST['submit_images'])) {

   $property_id_by_link=new MongoId($_GET['id']);
   $pictures=$_FILES['image_array'];
   $property_name = $_GET['property_name'];

  if(isset($pictures))  {

    if (!file_exists("../assets/img/$property_name")) {
        
        mkdir("../assets/img/$property_name", 0777, true);
    }

    $property_image      = $_FILES['image_array']['name'];
    $property_image_temp = $_FILES['image_array']['tmp_name'];

     for($i=0; $i<count($property_image_temp); $i++){

      move_uploaded_file($property_image_temp[$i], "../assets/img/$property_name/"."$property_name".$property_image[$i] );

     }


    $update_query_new_pics= $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$set'=> array("pictures"=>$property_image)
                                                                ));
    if(!$update_query_new_pics) {
            
            echo "FAILED";
        }
        else{
          header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
  }

  



    }


?>