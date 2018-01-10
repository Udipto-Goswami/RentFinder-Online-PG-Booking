<?php

if(isset($_GET['property_page']))	{
 $id = new MongoId($_GET['id']);
	header("location:/Rentfinder/property_page.php?id=$id");
}

if(isset($_GET['update'])){
$property_id = $_GET['id'];
header("Location:/Rentfinder/update_property.php?id=$property_id&update=0");
                                   
}
?>