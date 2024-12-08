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
            include('../includes/manage_items.php')
        ?>
        
        
<?php
     include_once('../includes/scripts.php');
?>
        <script>
            new DataTable('#example');
        </script>
</div>
       
    
<?php
    include_once('../manage/manage_script.php');
?>
        
<?php
    require '../includes/footer.php'
?>
