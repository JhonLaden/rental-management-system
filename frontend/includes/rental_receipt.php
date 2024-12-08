<div class="container mt-5">
        <?php
            require('../../backend/classes/schedule.class.php');
            $schedule = new Schedule();
            $schedule->id = $schedule_id;
            $selected_schedule = $schedule->get_schedule_by_id();
        ?>
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center">
                <h2>Rental Receipt</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-6">
                        <h5>Receipt Details</h5>
                        <p><strong>Schedule ID:</strong> <span id="schedule_id"><?php echo $selected_schedule['schedule_id'] ?></span></p>
                        <p><strong>Status:</strong> <span id="status " class = "text-capitalize"><?php echo $selected_schedule['status'] ?></span></p>
                    </div>
                    <div class="col-6 text-end">
                        <h5>Transaction Date</h5>
                        <p id="transaction_date">
                            <?php
                                $date = new DateTime($selected_schedule['created_at']);
                                echo $date->format('F j, Y');
                            ?>
                        </p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-6">
                        
                        <h5>Borrower Information</h5>
                        <p><strong>Borrower ID:</strong> <span id="borrower_id"><?php echo $selected_schedule['borrower_id'] ?></span></p>
                    </div>
                    <div class="col-6">
                        <h5>Lender Information</h5>
                        <p><strong>Lender ID:</strong> <span id="lender_id"><?php echo $selected_schedule['lender_id'] ?></span></p>
                    </div>
                </div>

                <hr>

                <div class="row mb-3">
                    <div class="col-6">
                        <h5>Item Information</h5>
                        <p><strong>Item ID:</strong> <span id="item_id"><?php echo $selected_schedule['item_id'] ?></span></p>
                        <p><strong>Photo:</strong></p>
                        <?php if (!empty($selected_schedule['photo'])): ?>
                            <img src="../assets/uploads/<?php echo $selected_schedule['photo']; ?>" alt="Item Photo" class="img-fluid rounded shadow-sm" style="max-width: 200px;">
                        <?php else: ?>
                            <p class="text-muted">No photo available</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-6">
                        <h5>Rental Period</h5>
                        <p><strong>Start Date:</strong> 
                            <span id="start_date">
                                <?php 
                                    $date = new DateTime($selected_schedule['start_date']);
                                    echo $date->format('F j, Y');
                                ?>
                            </span>
                        </p>
                        <p><strong>Return Date:</strong> 
                        <span id="return_date">
                            <?php 
                                $date = new DateTime($selected_schedule['return_date']);
                                echo $date->format('F j, Y');
                            ?>
                        </span></p>
                    </div>
                </div>

                <hr>

                <div class="text-center">
                    <p>Thank you for using our rental service!</p>
                    <p>If you have any questions, contact us at <strong>support@example.com</strong>.</p>
                </div>
                <a class = "btn btn-primary" href = "<?php echo $_POST['link'] ?>">Back
                </a>
            </div>
        </div>
    </div>