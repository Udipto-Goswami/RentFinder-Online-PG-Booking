<?php
$connection = new Mongo("mongodb://127.0.0.1:27017");
if($connection)	{

$database = $connection->rentfinder;

$student_collection 	= $database->student_users;
$landlord_collection	= $database->landlord_users;
$property_collection   	= $database->property;
$scheduled_collection   = $database->scheduled;
$admin_collection   = $database->admin;

}


?>


