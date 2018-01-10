   <?php include "mongo_connection.php";?>
<?php session_start(); ?>
   <?php
    if (isset($_POST['schedule'])) {
        $property_id =new MongoId($_GET['id']);
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phno=$_POST['ph_no'];
        $date=$_POST['date'];
        $hours =$_POST['hr'];
        $mins =$_POST['min'];
        //echo $date. "<br>";
       // echo $hours . " ". $mins ;
        $date=date_create("$date");
        $date= date_format($date,"Y-m-d");
        //echo $date;

     $time = $hours . ":" . $mins . "PM";
        $schedule_document = array(
                                    "name"=>$name,
                                    "email"=>$email,
                                    "phno"=>$phno,
                                    "date"=> new MongoDate(strtotime($date)),
                                    "timing"=> $time,
                                    "tenant_id"=> new MongoId($_SESSION['_id']),
                                    "landlord_id" =>new MongoId($_GET['landlord']),
                                    "property_id" =>$property_id
                                  );

        //print_r($schedule_document);

      if($scheduled_collection->insert($schedule_document))  {

        header("location:../property_page.php?id=$property_id&schedule_done=1");
  }
  else{

    echo "FAILED";
  }

    }

    ?>

