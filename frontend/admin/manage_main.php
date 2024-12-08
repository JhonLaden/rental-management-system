<div class = "w-100 bg-light m-5 p-4 rounded-5 overflow-y-scroll">

    <?php
        include('../includes/manage_items.php');
        include('../manage/manage_script.php');
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

</div>