    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <nav class="navbar navbar-default navbar-fixed-top solid">
        <div class="container-fluid">
        <?php
        
        $userid = $_SESSION['_id'];
        ?>
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="user_account.php?userid=<?php echo $userid;?>">RentFinder.online </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"><?php echo"$split_user[0]";?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="user_account.php?userid=<?php echo $userid;?>">Home</a></li>
                            <li role="presentation"><a href="user_form.php">Profile</a></li>
                            
                            <li class="divider" role="presentation"></li>
                            <li role="presentation"><a href="includes/logout.php">Logout </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


