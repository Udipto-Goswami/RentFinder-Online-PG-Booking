<?php include "mongo_connection.php";?>

<?php


    if (isset($_POST['submit_info'])) {
        $property_id_by_link=new MongoId($_GET['id']);
        $updated_property_name = $_POST['property_name'];
        $updated_property_address = $_POST['property_address'];
        $updated_accom_type = $_POST['accom_type'];
        $starting_price     = $_POST['starting_price'];
        //var_dump($property_collection);
         $property_id_by_link = new MongoId($property_id_by_link);
        $update_query_property = $property_collection->update(array("_id" => $property_id_by_link),
                                                              array('$set' =>
                                                                array("property_name" => $updated_property_name,
                                                                      "property_address" => $updated_property_address,
                                                                    "accom_type" => $updated_accom_type,
                                                                    "starting_price" => $starting_price
                                                                )));
        //var_dump($update_query_property);
        if(!$update_query_property) {
            
            echo "FAILED";
        }
        else{
          header("Location:../update_property.php?id=$property_id_by_link&update=1");
        }
    }

?>


