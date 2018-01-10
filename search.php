<?php include"includes/mongo_connection.php"; ?>
<?php include "includes/header.php"; ?>
<body>
  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript">

        $(document).ready(function() {
       
       
          
       $('.navbar').addClass('solid');
          
      
});
    </script>

<?php include "includes/navbar.php"; ?>
<br><br><br>
    <div class="container-fluid search_sec_1 ctn_cust_2">
    <form method="GET" action="">
        <div class="input-group input-group-lg">
            <input class="form-control" type="text"  name="search_room" required="" placeholder="Search" autocomplete="on">
            <div class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="search_native" >Search <i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
            </form>
        </div>

 

    <h2 class="text-center">Showing Resuts of <?php $search_par = $_GET['search_room']; echo " \"$search_par\" "; ?></h2>
   
    <section class="search_sec_1">
        <div class="container-fluid">
        <?php
    if (isset($_GET['search_room'])) {

        $search_parameter =$_GET['search_room'];
        $regex = new MongoRegex("/$search_parameter/i");
        $mongo_object_address = $property_collection->find( array('property_address' => $regex,"approved"=>"1" ));
        $mongo_object_property = $property_collection->find( array('property_name' => $regex,"approved"=>"1" ));
        if($mongo_object_address->count(true)) {
             
             foreach ($mongo_object_address as$row) {

                    $property_name      = $row['property_name'];
                    $property_id        = $row['_id'];
                    $property_address   = $row['property_address'];
                    $property_owner     = $row['owner'];
                    $pictures           = $row['pictures'];
                    $date_created       = date('d-m-Y', $row['date_created']->sec);
                    $year = date('Y',$row['date_created']->sec);
                    $current_year = date('Y');
                    $years_active = $current_year - $year;
                    if($years_active ==0){
                        $years_active ="New";
                    }

                        if(count($pictures)>1)  {
                            echo'<div class="col-lg-4 col-md-12">
                    <a class="thumbnail" href="property_page.php?id='.$property_id.'" style="text-decoration:none"><img src=\'assets/img/'.$property_name.'/'.$property_name.$pictures[0].'\'  style="width:320px">
                    <div class="caption">
                        <h3>'.$property_name.'</h3>
                        <p><strong>Address:</strong> '.$property_address.' <br><strong>Property Owner:</strong>'. $property_owner.' </br> <strong>Years Active: '. $years_active.'</strong>
                        </p>
                    </div>
                </a>
            </div>';

                        }
                        else{
                            echo'<div class="col-lg-4 col-md-12">
                <a class="thumbnail" href="property_page.php?id='.$property_id.'" style="text-decoration:none"><img style="width:310px" src="assets/img/VISION_PLAN.png" >
                    <div class="caption">
                        <h3>'.$property_name.'</h3>
                        <p><strong>Address:</strong> '.$property_address.' <br><strong>Property Owner:</strong>'. $property_owner.' </br> <strong>Years Active: '. $years_active.'</strong></p>
                    </div>
                </a>
            </div>';
}
                    

             }

        }

        else  if($mongo_object_property->count(true)) {
             
             foreach ($mongo_object_property as$row) {

                    $property_name      = $row['property_name'];
                    $property_id        = $row['_id'];
                    $property_address   = $row['property_address'];
                    $property_owner     = $row['owner'];
                    
                    $date_created       = date('d-m-Y', $row['date_created']->sec);
                    $year = date('Y',$row['date_created']->sec);
                    $current_year = date('Y');
                    $years_active = $current_year - $year;
                    if($years_active ==0){
                        $years_active ="New";
                    }

                    echo'<div class="col-lg-4 col-md-12">
                <a class="thumbnail" href="property_page.php?id='.$property_id.'" style="text-decoration:none"><img src="assets/img/VISION_PLAN.png">
                    <div class="caption">
                        <h3>'.$property_name.'</h3>
                        <p><strong>Address:</strong> '.$property_address.' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<strong>Property Owner:</strong>'. $property_owner.' </br> <strong>Years Active: '. $years_active.'</strong></p>
                    </div>
                </a>
            </div>';


             }

        }


        else{

            echo "<p class='bg-danger'>No Revelant Results Found!</p>";
        }

    }
   

    ?>
            
        </div>
            
       
    </section>
    <section class="testimonials">
      
    </section>

    <?php include "includes/footer.php"; ?>
