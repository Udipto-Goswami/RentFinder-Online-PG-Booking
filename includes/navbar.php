    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php">RentFinder.online</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                     <?php
                     session_start();
                    if(isset($_SESSION["name"]))    {
                        $userid = $_SESSION["_id"];
                        $user= $_SESSION["split_user"];
                        echo'<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">' .$user[0]. '<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="user_account.php?userid='.$userid.'">Home</a></li>
                            <li role="presentation"><a href="user_form.php">Profile</a></li>
                         
                            <li class="divider" role="presentation"></li>
                            <li role="presentation"><a href="includes/logout.php">Logout <i class="glyphicon glyphicon-off"></i></a></li>
                        </ul>
                    </li>';
                    //$_SESSION["account_type"]="";
                     }

                     else{

                        echo' <li role="presentation"><a href="includes\login_form.php" id="login" style="cursor:pointer">Login </a></li>
                    <li role="presentation"><a href="includes\register_student.php" id="register">Register </a></li>';
                    // $_SESSION["account_type"]="";
                     }
                     ?>
                </ul>
            </div>
        </div>
    </nav>




    