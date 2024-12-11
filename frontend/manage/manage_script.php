<script>
    <?php
        include_once('../js/edititem.js');
    ?>
        $(document).ready(function() {
        <?php 
            if(isset($_SESSION['message'])){
                $message = $_SESSION['message'];
                unset($_SESSION['message']);

                if(isset($message['delete']) || isset($message['edit']) || isset($message['add']) ){

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
        // Handle delete button click
    $('.delete-item-btn').click(function(e) {
        e.preventDefault(); // Prevent the default behavior

        // Get the ID of the form to be submitted
        const formId = $(this).data('form-id');
        console.log(formId);
        const formSelector = `#${formId}`;

        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            confirmButtonColor: "crimson",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the correct form
                $(formSelector).submit();
            }
        });
    });

        
        });
        </script>