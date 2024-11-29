<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    
?>
        <?php
            if(isset($_SESSION['loggeduser'])){
                $logged_user = $_SESSION['loggeduser'];
            }else{
                header('location: frontend/');
            }
            
        ?>
        <section class = "container mt-5">
            <h1> View Bookings </h1>

            <table class="table table-striped table-responsive " id ="example">
            <thead class="table-dark">
                <tr>
  
                    <th>NAME</th>
                    <th>DEPOSIT COST</th>
                    <th>Rental Cost</th>
                    <th>Status</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../backend/classes/schedule.class.php';

                    $schedule = new Schedule();
                    $schedule->logged_user_id = $logged_user['user_id'];

                    // Fetch records based on user ID
                    $results = $schedule->show(); 
                    if (!empty($results)) {
                        
                        foreach ($results as $value) {
                ?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo "₱ " . htmlspecialchars($value['deposit_cost']); ?></td>
                    <td><?php echo "₱ " . htmlspecialchars($value['rental_cost']); ?></td>
                    <td> <?php echo $value['status'] ?></td>
                    <td class="text-center d-flex justify-content-center gap-2">
                        <?php
                            if($value['status'] == 'pending' ){?>
                                <form action="../../backend/tools/updateSchedule.php?item_id=<?php echo $value['item_id'] ?>"  method = "POST">
                                    <input type="hidden" name = "link" value = "../../frontend/view/view.php" >
                                    <input type="hidden" name = "update" value = "rented" >
                                    <input type="hidden" name = "schedule_id" value = "<?php echo $value['schedule_id']; ?>" >

                                    <button name = "update_btn" class="btn btn-success chceck-btn" data-id = "<?php echo $value['item_id']; ?> "><i class="bi bi-check-square"></i></button>

                                </form>

                            <?php
                            }?>
                        <?php
                            if($value['status'] == 'pending' || $value['status'] != 'canceled' ){?>
                                <form action="../../backend/tools/updateSchedule.php?item_id=<?php echo $value['item_id'] ?>" id = "update_form" name = "update_form" method = "POST">
                                    <input type="hidden" name = "link" value = "../../frontend/view/view.php" >
                                    <input type="hidden" name = "update" value = "canceled" >
                                    <input type="hidden" name = "schedule_id" value = "<?php echo $value['schedule_id']; ?>" >

                                    <button name = "update_btn" class="btn btn-danger cancel-btn" data-id = "<?php echo $value['item_id']; ?> "><i class="bi bi-x-square"></i></button>

                                </form>

                            <?php

                            }?>
                        <?php
                            if($value['status'] == 'canceled'){
                        
                                ?>
                                <span>NONE</span>
                        <?php
                            }

                        ?>
                    </td>


                </tr>
                <?php
                           
                        }
                    } else {
                ?>
                <?php
                    }
                ?>
            </tbody>
        </table>

       

      
        
        </section>

        
</div>
<?php 
    include('../includes/scripts.php');
?>

        <script>
            	
            new DataTable('#example');

           
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
            $('.cancel-btn').click(function(e) {
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

        


<?php
    include '../includes/footer.php'
?>
