<?php include "mongo_connection.php";?>

<?php
if (isset($_POST['submit_room'])) {

   $property_id_by_link=new MongoId($_GET['id']);
	$room_no =$_POST['room_no'];
  $seats   =$_POST['seats'];

   $number = count($room_no); 
   for ($i=0; $i <$number ; $i++) { 

       $rooms_input [$i]= array(array("number" => $room_no[$i] , "seats"=>$seats[$i]));

   }

  $property_id_by_link = new MongoId($property_id_by_link);

    $update_query_rooms= $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$set' =>array("rooms_available"=>$rooms_input)
                                                              
                                                               ));
    if(!$update_query_rooms) {
            
            echo "FAILED";
        }
        else{
          header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
    }






    if (isset($_POST['add_new_room'])) {

   $property_id_by_link=new MongoId($_GET['id']);
  $new_room_no      =$_POST['new_room_no'];
  $new_room_seats   =$_POST['new_room_seats'];



  $property_id_by_link = new MongoId($property_id_by_link);

    $update_query_new_rooms= $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$push' =>array("rooms_available"=>array(array("number"=>$new_room_no , "seats"=>$new_room_seats)))
                                                              
                                                               ));
    if(!$update_query_new_rooms) {
            
            echo "FAILED";
        }
        else{
          header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
    }


?>