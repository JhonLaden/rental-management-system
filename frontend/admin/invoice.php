<?php
    session_start();

    include_once('../includes/adminhead.php');
    $invoice = 'active';
  

    

?>

    <div class = "d-flex h-100">
        <?php include_once('../includes/sidebar.php'); ?>
        <?php include_once('invoice_main.php'); ?>
        
    </div>

        <?php  
            include_once('../includes/sidebar.php');
            
            include_once('../includes/footer.php');

        ?>
