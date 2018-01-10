<?php include "mongo_connection.php";?>
<?php
if (isset($_POST['submit_faci'])) {
	 $property_id_by_link=new MongoId($_GET['id']);
	 $faci_check =$_POST['faci_check'];
	 $faci_name  =$_POST['faci_name'];

	 $property_id_by_link = new MongoId($property_id_by_link);


	 $update_query_desriptions = $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$set' => array("facilities"=>$faci_name)
                                                               
                                                               ));
    if(!$update_query_desriptions) {
            
            echo "FAILED";
        }
        else{
         header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
	 
}


if (isset($_POST['add_faci'])) {
  
  $property_id_by_link=new MongoId($_GET['id']);
   $new_faci_name =$_POST['new_faci_name'];
   

   $property_id_by_link = new MongoId($property_id_by_link);


   $update_query = $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$push' => array("facilities"=>$new_faci_name)
                                                               
                                                               ));
    if(!$update_query) {
            
            echo "FAILED!";
        }
        else{
          header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }



}
?>