<?php include "header_login_register.php";?>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="../index.php">RentFinder.com </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="login_form.php">Login </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>


    <div class="row register-form re">
        <div class="col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" method="post" action="" >
                <h1>Landlord Registration Form</h1>



<?php
include 'mongo_connection.php';

if (isset($_POST['Register_landlord'])) {

if( !isset($_POST['checked']))  {
    echo "<p class = 'bg-danger' style=' color:red; text-align:center;'> Check the terms</p>";
}
else{




    $full_name      = $_POST['full_name'];
    $email          = $_POST['email'];
    $password       = $_POST['password'];
    $repeat_pass    = $_POST['repeat_pass'];
    $occupation     = $_POST['occupation'];
    $permanent_add  = $_POST['permanent_add'];
    $contact        = $_POST['contact'];
    // encrption 
    $password = hash('sha512',(md5($password)));
    $repeat_pass = hash('sha512',(md5($repeat_pass)));
    if($password!=$repeat_pass) {
        echo "<p class = 'bg-danger' style=' color:red; text-align:center;'> Password does not match, Try again.</p>";
    }
    else if(empty($full_name)   ||  empty($email) || empty($password)  ||  empty($occupation)  ||  empty($permanent_add)    ||  empty($contact))  {
            echo "<p class = 'bg-danger' style=' color:red; text-align:center;'> All fields are mendatory, Try again.</p>";
        }
    else{

        $landlord_document = array(
    "name"         => "$full_name",
    "email"        => "$email",
    "password"     =>"$password",
    "occupation"   =>"$occupation",
    "permanent_add"=>"$permanent_add",
    "contact"      => "$contact",
    "date_created"=>new MongoDate(),
    'display_pic'       => "",
    'filled'            => "0",
    "approved"          => "0"
    );

$find_existing = $landlord_collection->find(array('$or' => array( array("name"=> $full_name), array("email"=> $email) )));

            if($find_existing->count(true)){

              echo "<p class = 'bg-danger' style=' color:Red;'> This user already exists! </p>";

            }

            elseif ($landlord_collection->insert($landlord_document)) {

                 echo "<p class = 'bg-success' style=' color:green;'> Successfully Recorded! </p>";


             }
        
    }


}

}




?>



                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field" >Full Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" required="" pattern="*[A-Za-z]" name="full_name"  value="<?php 
  if (!empty($_POST['full_name'])) { 
    echo htmlspecialchars($_POST['full_name']); 
  }?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field" >Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" required=""  name="email" value="<?php 
  if (!empty($_POST['email'])) { 
    echo htmlspecialchars($_POST['email']); 
  }?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field"  value="">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field" >Repeat Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="repeat_pass">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field" >Occupation </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text"  name="occupation"value="<?php 
  if (!empty($_POST['occupation'])) { 
    echo htmlspecialchars($_POST['occupation']); 
  }?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Permanent Adress</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="permanent_add" value="<?php 
  if (!empty($_POST['permanent_add'])) { 
    echo htmlspecialchars($_POST['permanent_add']); 
  }?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field" >Contact Number</label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="contact" value="<?php 
  if (!empty($_POST['contact'])) { 
    echo htmlspecialchars($_POST['contact']); 
  }?>" maxlength="10" minlength="10" pattern="*[0-9]"/>
                    </div>
                </div>
              <div class="form-group">
                    <div class="checkbox chk_cust">
                        <label class="control-label">
                            <input type="checkbox" name="checked">I've read and accept the terms and conditions &nbsp</label>
                    </div><i class="glyphicon glyphicon-info-sign chk_cust"  style="cursor:pointer; "data-toggle="modal" data-target="#terms_and_cond_modal"></i></div>



                    <?php include"terms&condition.php";?>



                <button class="btn btn-primary submit-button" type="submit" name="Register_landlord">Register</button>
                <p><a href="register_student.php">Register as Student? </a></p>
            </form>
        </div>
    </div>
</body>

</html>