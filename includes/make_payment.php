<?php include "mongo_connection.php";?>

<?php
if (isset($_POST['pay'])) {
  $property_id =$_GET['id'];  
  $date        =$_POST['date'];
  $name        =$_POST['name'];
  $registration=$_POST['registration'];
  $ph_no       =$_POST['ph_no'];
  $room_no     =$_POST['room_no'];

$status = "inactive";
if ($status=="inactive") {
echo "<h1> Page Under Construction</h1>";
header("refresh: 3; /Rentfinder/property_page.php?id=$property_id");
}
}


?>