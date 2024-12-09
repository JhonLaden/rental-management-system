<?php
    session_start();

    include_once('../includes/adminhead.php');
    $schedules = "active";
    if(isset($_SESSION['loggeduser']) && $_SESSION['loggeduser']['type'] == 'admin'){
        $logged_user = $_SESSION['loggeduser'];
    }else{
        header('location: ../../');
    }
    if(isset($_POST['view_btn']) ){
        $schedule_id = $_POST['schedule_id'];
    }else{
        header('location: ../../');
    }
    require('../../backend/classes/users.class.php');
?>

    <div class = "d-flex h-100">
        <?php include_once('../includes/sidebar.php'); ?>
        <div class = "w-100 bg-light m-5 p-4 rounded-5 overflow-y-scroll">
     
            <?php include_once('../includes/rental_receipt.php'); ?>
        </div>
            
        
    </div>

    <?php
     include_once('../includes/scripts.php');
?>
        <?php  
            
            include_once('../includes/footer.php');

        ?>
