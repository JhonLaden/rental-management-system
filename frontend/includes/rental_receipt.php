<div class="container mt-5">
    <?php
    require_once('../../backend/classes/schedule.class.php');
    $schedule = new Schedule();
    $schedule->id = $schedule_id;
    $selected_schedule = $schedule->get_schedule_by_id();
    ?>

    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center py-4">
            <h2>Rental Receipt</h2>
        </div>
        <div class="card-body">

            <!-- Receipt Information Section -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h5>Receipt Details</h5>
                    <p><strong>Schedule ID:</strong> <span id="schedule_id"><?php echo $selected_schedule['schedule_id'] ?></span></p>
                    <p><strong>Status:</strong> <span id="status" class="text-capitalize"><?php echo $selected_schedule['status'] ?></span></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-md-end">
                    <h5>Transaction Date</h5>
                    <p id="transaction_date">
                        <?php
                        $date = new DateTime($selected_schedule['created_at']);
                        echo $date->format('F j, Y');
                        ?>
                    </p>
                </div>
            </div>

            <hr class="my-4">

            <!-- Borrower and Lender Information Section -->
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Borrower Information</h5>
                            <p><strong>Borrower ID:</strong> <span id="borrower_id"><?php echo $selected_schedule['borrower_id']; ?></span></p>
                            <p><strong>Borrower Name:</strong>
                                <span id="borrower_name">
                                    <?php

                                    $user = new Users();
                                    $user->id = $selected_schedule['borrower_id'];
                                    $borrower = $user->get_user_by_id();
                                    echo $borrower['first_name'] . ' ' . $borrower['last_name'];
                                    ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Lender Information</h5>
                            <p><strong>Lender ID:</strong> <span id="lender_id"><?php echo $selected_schedule['lender_id']; ?></span></p>
                            <p><strong>Lender Name:</strong>
                                <span id="lender_name">
                                    <?php
                                    $user->id = $selected_schedule['lender_id'];
                                    $lender = $user->get_user_by_id();
                                    echo $lender['first_name'] . ' ' . $lender['last_name'];
                                    ?>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <!-- Item and Method Information Section -->
            <div class="row">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Item Information</h5>
                            <p><strong>Item ID:</strong> <span id="item_id"><?php echo $selected_schedule['item_id'] ?></span></p>
                            <p><strong>Photo:</strong></p>
                            <?php if (!empty($selected_schedule['photo'])): ?>
                                <img src="../assets/uploads/<?php echo $selected_schedule['photo']; ?>" alt="Item Photo" class="img-fluid rounded mb-3" style="max-width: 200px;">
                            <?php else: ?>
                                <p class="text-muted">No photo available</p>
                            <?php endif; ?>
                            <p><strong>Method:</strong> <span id="method"><?php echo ucfirst($selected_schedule['method']); ?></span></p>
                            <?php if ($selected_schedule['method'] === 'delivery'): ?>
                                <p><strong>Delivery Address:</strong>
                                    <span id="delivery_address"><?php echo $selected_schedule['delivery_address']; ?></span>
                                </p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <!-- Rental Period Section -->
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
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
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-4">


            <div class="row">
                <div class="col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5>Invoice Information</h5>
                            <p class="d-flex justify-content-between"><strong>Rental Cost:</strong> <span id="item_id">₱ <?php echo $selected_schedule['rental_cost'] ?></span></p>
                            <p class="d-flex justify-content-between"><strong>Deposit Cost:</strong> <span id="item_id">₱ <?php echo $selected_schedule['deposit_cost'] ?></span></p>
                            <p class="d-flex justify-content-between"><strong>Rental Cost(Days):</strong> <span id="item_id">₱ <?php echo $selected_schedule['cost'] ?></span></p>



                            <?php
                            $additionalFee = 0;
                            ?>

                            <p class="d-flex justify-content-between"><strong>Additional Fee:</strong>
                                <span id="fee">
                                    <?php echo $selected_schedule['method'] === 'delivery' ? '₱ 170.00' : '₱ 0.00';
                                    $additionalFee = 170;
                                    ?>
                                </span>
                            </p>
                            <p class="d-flex justify-content-between"><strong>Method:</strong> <span id="method"><?php echo ucfirst($selected_schedule['method']); ?></span></p>
                            <?php if ($selected_schedule['method'] === 'delivery' || $selected_schedule['method'] === 'pickup'): ?>
                                <p class="d-flex justify-content-between"><strong>Delivery Address:</strong>
                                    <span id="delivery_address"><?php echo $selected_schedule['delivery_address']; ?></span>
                                </p>
                            <?php endif; ?>
                            <p class="d-flex justify-content-between border border-danger p-2 rounded"><strong>Total Rental Cost:</strong> <span id="item_id">₱
                                    <?php
                                    echo $selected_schedule['cost'] + $selected_schedule['deposit_cost'] ?>
                                </span></p>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <!-- Footer Section -->
            <div class="text-center">
                <p class="text-muted">Thank you for using our rental service!</p>
                <p>If you have any questions, contact us at <strong>support@example.com</strong>.</p>
            </div>

            <div class="text-center">
                <a class="btn btn-outline-primary" href="<?php echo $_POST['link'] ?>">Back</a>
            </div>

        </div>
    </div>
</div>