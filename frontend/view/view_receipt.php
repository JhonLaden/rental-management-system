<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    
?>
        <?php
            if(isset($_SESSION['loggeduser'])){
                $logged_user = $_SESSION['loggeduser'];
            }else{
                header('location: ../../');
            }
            
            if(isset($_POST['view_btn']) ){
                $schedule_id = $_POST['schedule_id'];
            }else{
                header('location: ../../');
            }
        ?>
       

       
    <?php
        include('../includes/rental_receipt.php');
    ?>
        
       


<?php 
    include('../includes/scripts.php');
?>

<?php
    include '../includes/footer.php'
?>
