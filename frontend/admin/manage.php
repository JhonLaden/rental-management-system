<?php
    session_start();

    include_once('../includes/adminhead.php');
    $items = "active";
  
?>

    <div class = "d-flex h-100">
        <?php include_once('../includes/sidebar.php'); ?>
        <?php include_once('manage_main.php'); ?>
        
    </div>

        <?php  
            
            include_once('../includes/footer.php');

        ?>