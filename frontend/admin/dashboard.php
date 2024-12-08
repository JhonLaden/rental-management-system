<?php
    session_start();

    include_once('../includes/adminhead.php');

    $dashboard = 'active';

    if(isset($_SESSION['loggeduser']) && $_SESSION['loggeduser']['type'] == 'admin'){
        $logged_user = $_SESSION['loggeduser'];
    }else{
        header('location: ../../');
    }
            
   
?>
    <div class = "d-flex h-100">
        <?php include_once('../includes/sidebar.php'); ?>
        <?php include_once('dashboard_main.php'); ?>
        
    </div>

        <?php  
            include_once('../includes/sidebar.php');
            
            include_once('../includes/footer.php');

        ?>
