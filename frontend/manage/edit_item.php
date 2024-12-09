<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    
?>
        <?php
            if(isset($_SESSION['loggeduser'])){
                $logged_user = $_SESSION['loggeduser'];
            }else{
                header('location: ../../frontend/');
            }
            
        ?>
        <?php
            include('../includes/edit_item.php')
        ?>
        
        
<?php
     include_once('../includes/scripts.php');
?>
</div>
       
    
<?php
    include_once('../manage/manage_script.php');
?>
        
<?php
    require '../includes/footer.php'
?>
