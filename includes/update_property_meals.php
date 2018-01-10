<?php include "mongo_connection.php";?>
<?php
if (isset($_POST['submit_meal'])) {
   $property_id_by_link=new MongoId($_GET['id']);
   $breakfast= $_POST['breakfast'];
   $lunch = $_POST['lunch'];
   $dinner = $_POST['dinner'];

   $property_id_by_link = new MongoId($property_id_by_link);
   $update_query_meal = $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$set' => 
                                                                array("meal"=> array("b"=>$breakfast,
                                                                                     "l"    =>$lunch,
                                                                                     "d"   =>$dinner
                                                                                     )
                                                                     )
                                                               
                                                               ));

    if(!$update_query_meal) {
            
            echo "FAILED";
        }
        else{
         header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
   
}





?>