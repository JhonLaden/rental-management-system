<div class = "w-100 bg-light m-5 p-4 rounded-5 overflow-y-scroll">

    <?php
        include('../includes/manage_schedules.php');

    ?>
    <?php
     include_once('../includes/scripts.php');
        ?>
                <script>
            	
                $(document).ready(function() {
                    $('#example').DataTable({
                        "order": [[4, 'asc']], // Sorting based on the 4th column (index 3)
                        "columnDefs": [
                            {
                                "targets": 4, // Target the status column (index 3)
                                "orderDataType": "dom-text", // Optional: helps sorting by text values (like 'pending', 'rented')
                            }
                        ]
                    });
                });
            <?php 
                if(isset($_SESSION['message'])){
                    $message = $_SESSION['message'];
                    unset($_SESSION['message']);

                    if(isset($message['cancel']) ){
                ?>
                            Swal.fire({
                            title: "<?php echo $message['title'] ?>",
                            text: "<?php echo $message['success'] ?>",
                            icon: "success"
                        });
            <?php
                    }
                }
            ?>

            // Attach click event to the delete button
            $(document).on('click', '.cancel-btn', function(e) {

                e.preventDefault(); // Prevent the form from submitting immediately

                // Show SweetAlert2 confirmation dialog
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action cannot be undone!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Confirm!',
                    cancelButtonText: 'Cancel',
                    confirmButtonColor: "crimson",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, submit the form
                        $('#update_form').submit();
                    }
                });
            });


        </script>
        </div>
            
            
        <?php
            include_once('../manage/manage_script.php');
        ?>
                
        <?php
            require '../includes/footer.php'
        ?>

</div>