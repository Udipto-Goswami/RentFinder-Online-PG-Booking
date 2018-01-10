<?php include "mongo_connection.php";?>

<?php
if (isset($_POST['submit_check'])) {

   $property_id_by_link=new MongoId($_GET['id']);
	$bath = (!empty($_POST['bath'])? "1" : "2");
	$air_con =(!empty($_POST['air_con'])? "1" : "2");
	$television=(!empty($_POST['television'])? "1" : "2");
	$bed=(!empty($_POST['bed'])? "1" : "2");
	$tnc= (!empty($_POST['tnc'])? "1" : "2");
	$wifi = (!empty($_POST['wifi'])? "1" : "2");

  $property_id_by_link = new MongoId($property_id_by_link);

    $update_query_checkboxes = $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$set' =>array("description" => array("attached_bath" => "$bath" , "tv" =>"$television", "ac" =>"$air_con" , "bedding" => "$bed" ,"tnc"=>"$tnc", "wifi" => "$wifi"))
                                                              
                                                               ));
    if(!$update_query_checkboxes) {
            
            echo "FAILED";
        }
        else{
          header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
    }
?>