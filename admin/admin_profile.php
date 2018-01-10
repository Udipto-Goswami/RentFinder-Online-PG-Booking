<?php include "../includes/mongo_connection.php";?>
<?php include "includes_admin/header_admin.php"; ?>
    
    <?php include "includes_admin/navigation_admin.php";?>
    <?php 
    
        if($_SESSION['account_type']!="Admin")   {
            header("location:/Rentfinder/includes/error.php?not=1");
        }
    ?>
      <div class="container top-sh">
       
            <section>
            <div class="row re">
                <div class="col-lg-6 col-md-6 ">
                    <h1 class="cust_name"> <?php echo $_SESSION['name']; ?></h1></div>
                <div class="col-lg-6 col-md-6 ">
                    <h3 class="text-right cust_day"> <span class="span_1"><?php echo date("l")?> </span><span class="span_1"><?php echo date("d-m-Y");?></span></h3></div>
            </div>
        </section>


       </div>
       <br><br> 
    <div class="container">
        <div class="well ">
            <p class="help-block">The following is just your information.</p>
            <h2>Email Address:&nbsp&nbsp<?php echo $_SESSION['email'];?></h2>
            <h2>Date Created:&nbsp&nbsp <?php echo $_SESSION['date'];?></h2>
            <h2>Account Type:&nbsp&nbsp Admin</h2></div>
            <br><br><br><br><br>
    </div>
     <?php include "includes_admin/footer_admin.php"; ?>