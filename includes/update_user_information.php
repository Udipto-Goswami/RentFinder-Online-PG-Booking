<?php include"mongo_connection.php"; ?>
<?php
session_start();

if(isset($_SESSION['account_type'])){
 
$type = $_SESSION['account_type'];
$id   = $_SESSION['_id'];
}

    if(isset($_POST['update'])) {


    if ($type == 'Tenant') {

             $user =$_POST['full_name'];
             $email=$_POST['email'];

     if($_SESSION['password']==$_POST['password'])
     {
            $password =$_POST['password'];
            }
      
      else{
        $password     =$_POST['password'];
        $password     =hash('sha512',(md5($password)));
      }
     
     $university   =$_POST['university'];
     $registration =$_POST['registration'];
     $mothers_name =$_POST['mothers_name'];
     $fathers_name =$_POST['fathers_name'];
     $permanent_add=$_POST['permanent_add'];
      $display_pic = $_FILES['dp']['name'];

      if ($display_pic=="") {
    $display_pic = $_SESSION['display_pic'];
}

     if(empty($user) || empty($email) || empty($university) || empty($registration) || empty($mothers_name) || empty($fathers_name) || empty($permanent_add) || empty($display_pic))   {
        $filled = 0;
     }
     else{
        $filled = 1;
     }


     if (isset($_FILES['dp'])) {
       
    
     $display_pic_temp = $_FILES['dp']['tmp_name'];

      move_uploaded_file($display_pic_temp, "../assets/img/user/"."$user".$display_pic );
   }
               

     $result = $student_collection->update(array("_id" => $id),
                                           array('$set' => array(
                                            
                                            "email"             => $email,
                                            "name"              => $user,
                                            "password"          => $password,
                                            "university"        => $university,
                                            "registration"      => $registration,
                                            "mothers_name"      => $mothers_name,
                                            "fathers_name"      => $fathers_name,
                                            "permanent_add"     => $permanent_add,
                                            "display_pic"       => $display_pic,
                                            "filled"            => $filled      )));



                                            if($result) {


                                                $mongo_object_student = $student_collection->find( array('_id' => $id ));
                                     
                                                if($mongo_object_student->count(true)) {
                                            
                                                foreach ($mongo_object_student as$row) {
                                
                                                    $user         =$row['name'];
                                                    $email        =$row['email'];
                                                    $password     =$row['password'];
                                                    $date         =$row['date_created'] ;
                                                    $university   =$row['university'];
                                                    $registration =$row['registration'];
                                                    $mothers_name =$row['mothers_name'];
                                                    $fathers_name =$row['fathers_name'];
                                                    $permanent_add=$row['permanent_add'];
                                                    $display_pic  =$row['display_pic'];
                                                    $filled       =$row['filled']; 

                                                    $_SESSION['name']         = $row["name"];
                                                     $_SESSION['email']        = $row["email"];
                                                     $_SESSION['password']     = $row["password"];
                                                     $_SESSION['university']   = $row["university"];
                                                     $_SESSION['registration'] = $row["registration"];
                                                     $_SESSION['mothers_name'] = $row["mothers_name"];
                                                     $_SESSION['fathers_name'] = $row["fathers_name"];
                                                     $_SESSION['permanent_add']= $row['permanent_add'];
                                                     $_SESSION['display_pic']  = $row['display_pic'];
                                                     $_SESSION['filled']       = $row['filled'];
                                                     $_SESSION['split_user']   = explode(' ', $_SESSION['name']);
                                
                                                     }
                                                 }



                                }
 
    }
                 

  
    if ($type == 'Landlord') {

     $user                    = $_POST['full_name'];
     $email                   = $_POST['email'];
      if($_SESSION['password']==$_POST['password']){
         $password     =$_POST['password'];
      }
      
      else{
        $password     =$_POST['password'];
        $password     =hash('sha512',(md5($password)));
      }
     
     $occupation              = $_POST['occupation'];
     $permanent_add           = $_POST['permanent_add'];
     $contact                 = $_POST['contact'];
     $display_pic             = $_FILES['dp']['name'];

      if ($display_pic=="") {
        $display_pic = $_SESSION['display_pic'];
     }
     

     if(empty($user) || empty($email) || empty($password) || empty($occupation) || empty($contact) ||empty($permanent_add)|| empty($display_pic))   {
        $filled = 0;
     }
     else{
        $filled = 1;
     }

 if (isset($_FILES['dp'])) {
      
     $display_pic_temp = $_FILES['dp']['tmp_name'];

      move_uploaded_file($display_pic_temp, "../assets/img/user/"."$user".$display_pic );

    

   }
      

    $result=$landlord_collection->update(
                                array('_id' => $id),
                                array('$set' => array(
                                            'email'             => $email,
                                            'name'              => $user,
                                            'password'          => $password,
                                            'occupation'        => $occupation,
                                            'contact'           => $contact,
                                            'permanent_add'     => $permanent_add,
                                            'display_pic'       => $display_pic,
                                            'filled'            => $filled)));

                                                if($result) {


                                                 $mongo_object_landlord = $landlord_collection->find( array('_id' => $id ));
                                     
                                                 if($mongo_object_landlord->count(true)) {

                                                foreach ($mongo_object_landlord as$row) {
                                
                                                    $user                    = $row['name'];
                                                    $email                   = $row['email'];
                                                    $password                = $row['password'];
                                                    $date                    = $row['date_created'] ;
                                                    $occupation              = $row['occupation'];
                                                    $permanent_add           = $row['permanent_add'];
                                                    $contact                 = $row['contact'];
                                                    $display_pic             = $row['display_pic'];
                                                    $filled                  = $row['filled'];

                                                    $_SESSION['name']         = $row["name"];
                                                    $_SESSION['email']        = $row["email"];
                                                    $_SESSION['password']     = $row["password"];
                                                    $_SESSION['occupation']   = $row["occupation"];
                                                    $_SESSION['permanent_add']= $row["permanent_add"];
                                                    $_SESSION['contact']      = $row["contact"];
                                                    $_SESSION['display_pic']  = $row["display_pic"];
                                                    $_SESSION['filled']       = $row['filled'];
                                                    $_SESSION['split_user']   = explode(' ', $_SESSION['name']);
                                
                                                     }
                                                 }





                                            }
                                            
                                        

  
                         }
    


}

header("location:../user_form.php?updated=1");


?>