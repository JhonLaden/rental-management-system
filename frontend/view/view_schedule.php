<?php
$title = 'browse';
require '../includes/head.php';
require '../includes/header.php';


?>
<?php
if (isset($_SESSION['loggeduser'])) {
    $logged_user = $_SESSION['loggeduser'];
} else {
    header('location: frontend/');
}

?>
<section class="container mt-5">
    <h1> View Bookings </h1>

    <table class="table table-striped table-responsive " id="example">
        <thead class="table-dark">
            <tr>
                <th>#</th>
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
                $i = 1;
                foreach ($results as $value) {
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo "₱ " . htmlspecialchars($value['deposit_cost']); ?></td>
                        <td><?php echo "₱ " . htmlspecialchars($value['rental_cost']); ?></td>
                        <td> <?php echo $value['status'] ?></td>
                        <td class="text-center d-flex justify-content-center gap-2">
                            <a href="../view/view_schedule.php">
                                <button class="btn btn-info "><i class="bi bi-eye"></i></button>
                            </a>
                            <?php
                            if ($value['status'] != 'canceled') { ?>
                                <form action="../../backend/tools/updateSchedule.php" id="update_form" name="update_form" method="POST">
                                    <input type="hidden" name="link" value="../../frontend/view/view.php">
                                    <input type="hidden" name="update" value="canceled">
                                    <input type="hidden" name="schedule_id" value="<?php echo $value['schedule_id']; ?>">


                                    <button name="update_btn" class="btn btn-danger cancel-btn" data-id="<?php echo $value['item_id']; ?> "><i class="bi bi-x-square"></i></button>

                                </form>

                            <?php
                            } else { ?>
                                <span>
                                    <p>NONE</p>
                                </span>
                            <?php

                            }
                            ?>
                        </td>


                    </tr>
                <?php
                    $i++;
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


<?php
include '../includes/footer.php'
?>