<?php include "../../includes/mongo_connection.php";?>
<?php
if (isset($_GET['active'])) {
	$qid = new MongoId($_GET['id']);

	if($_GET['active']=="1"){
		
		$query_invoke = $property_collection->update (array("_id"=>$qid), array('$set' => array("approved" =>"1")));
		//header("location: ../admin_tenant_view.php");

		
    }


    else if($_GET['active']=="2"){
    	$query_invoke = $property_collection->update (array("_id"=>$qid), array('$set' => array("approved" =>"0")));
    }
	


if(!$query_invoke) {
            
            echo "FAILED";
        }
        else{
            if (isset($_GET['stat'])) {
                header("Location:../admin_pending_property_view.php");
            }
            else{header("Location:../admin_property_view.php");}
          
        }
}
?>
