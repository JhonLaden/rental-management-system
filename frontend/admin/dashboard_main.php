<div class="w-100 bg-light m-5 p-4 rounded-5 overflow-y-scroll">

    <div class="containter d-flex flex-column ">
        <div class=" px-5 py-4">
            <div class="mb-5">
                <h1>Dashboard</h1>
            </div>


            <div class="px-5">

                <div class="card-body">
                    <?php
                    require_once('../../backend/classes/item.class.php');
                    require_once('../../backend/classes/schedule.class.php');

                    $item = new Item();
                    $schedule = new Schedule();

                    $items = $item->show();
                    $schedules = $schedule->show_all_schedules();

                    $num_records = count($items);
                    $items_in_stock = $item->countInStock(); // Get the count of items in stock
                    $schedules_in_rent = $schedule->countRentedSchedules(); // Get the count of schedules
                    $schedules_in_pending = $schedule->countPendingSchedules(); // Get the count of pending
                    $schedules_in_rented = $schedule->countRentedSchedules(); // Get the count of rented
                    $schedules_in_finished = $schedule->countFinishedSchedules(); // Get the count of finished schedules


                    ?>
                    <div class="d-flex  align-items-center">
                        <div class="px-5">
                            <div class="d-flex flex-wrap justify-content-between">
                                <!-- Card 1: Total items -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-archive me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Total items</h5>
                                            <p class="card-text"><strong><?php echo $num_records ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 2: Available items -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-box me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Available items</h5>
                                            <p class="card-text"><strong><?php echo $items_in_stock; ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 3: Reserved items -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-bookmark me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Pending Schedules</h5>
                                            <p class="card-text"><strong><?php echo $schedules_in_pending; ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 4: Checked-out items -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-check2-circle me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Checked Out items</h5>
                                            <p class="card-text"><strong><?php echo $schedules_in_rented ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 5: In maintenance -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-tools me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Finished Schedules</h5>
                                            <p class="card-text"><strong><?php echo $schedules_in_finished ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-box2-heart me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Items in Stock</h5>
                                            <p class="card-text"><strong><?php echo $items_in_stock; ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 7: Total Rented Schedules -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-journal-arrow-up me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Total Rented Schedules</h5>
                                            <p class="card-text"><strong><?php echo $schedules_in_rent; ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Card 8: Total Finished Schedules -->
                                <div class="card shadow-sm mb-4" style="width: 18rem;">
                                    <div class="card-body d-flex align-items-center">
                                        <i class="bi bi-check-circle me-3 fs-4"></i>
                                        <div>
                                            <h5 class="card-title fw-bold">Total Finished Schedules</h5>
                                            <p class="card-text"><strong><?php echo $schedules_in_finished; ?></strong></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div>
                </div>
            </div>
        </div>



    </div>

</div>