<!-- navigation bar -->

<?php 
    require_once '../../backend/classes/users.class.php';

    session_start();

    $users = new Users();
    $logged_user = '';

    $accounts = $users->show();
    foreach($accounts as $keys => $value){ 

        if(isset($_SESSION['user_id'])){
            if( $_SESSION['user_id'] == $value['user_id']){ // get the account with the same id
                $users->email = $value['email'];
                $logged_user = $users->show_email()[0];
                break;
            }
        }
        
    }
    
?>

 
<nav class="navbar navbar-expand-lg navbar-transparent">
    <div class="container">
        <a class="navbar-brand" href="#">Suit&Gown</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- nav items -->
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link fw-bolder " aria-current="page" href="../user/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bolder" href="../user/browse.php">Browse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bolder" aria-current="page" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fw-bolder" aria-current="page" href="#">Contact</a>
                </li>

                <?php 
                        if (isset($_SESSION['user_id'])){
                             ?>   
                            
                    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fw-bolder" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $logged_user['username'];   ?>
                    </a>
                    <ul class="dropdown-menu bg">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="../manage/manage.php">Manage Items</a></li>
                    <li><a class="dropdown-item" href="../view/view.php">View Items</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../../backend/tools/logout_tool.php">Log out</a></li>
                    </ul>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>