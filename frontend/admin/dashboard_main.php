<div class="w-100 bg-light m-5 p-4 rounded-5 overflow-y-scroll" style="height: 80vh;">
    <div class="container d-flex flex-column">
        <div class="px-5 py-4">
            <div class="mb-5">
                <h1 class=" fw-bold">Dashboard</h1>
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

                    <div class="row g-4">
                        <!-- Card 1: Total items -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-archive me-3 fs-4 text-primary"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Total Items</h5>
                                        <p class="card-text"><strong><?php echo $num_records ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2: Available items -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-box me-3 fs-4 text-success"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Available Items</h5>
                                        <p class="card-text"><strong><?php echo $items_in_stock; ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3: Pending Schedules -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-bookmark me-3 fs-4 text-warning"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Pending Schedules</h5>
                                        <p class="card-text"><strong><?php echo $schedules_in_pending; ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4: Checked-Out Items -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-check2-circle me-3 fs-4 text-info"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Checked Out Items</h5>
                                        <p class="card-text"><strong><?php echo $schedules_in_rented ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 5: Finished Schedules -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-tools me-3 fs-4 text-danger"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Finished Schedules</h5>
                                        <p class="card-text"><strong><?php echo $schedules_in_finished ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 6: Items in Stock -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-box2-heart me-3 fs-4 text-secondary"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Items in Stock</h5>
                                        <p class="card-text"><strong><?php echo $items_in_stock; ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 7: Total Rented Schedules -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-journal-arrow-up me-3 fs-4 text-dark"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Total Rented Schedules</h5>
                                        <p class="card-text"><strong><?php echo $schedules_in_rent; ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card 8: Total Finished Schedules -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-check-circle me-3 fs-4 text-primary"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Total Finished Schedules</h5>
                                        <p class="card-text"><strong><?php echo $schedules_in_finished; ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6">
                            <div class="card shadow-sm border-0 rounded-3">
                                <div class="card-body d-flex align-items-center">
                                    <i class="bi bi-clock-history me-3 fs-4 text-warning"></i>
                                    <div>
                                        <h5 class="card-title fw-bold">Overdue Schedules</h5>
                                        <p class="card-text"><strong><?php echo $schedule->countOverdueSchedules(); ?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- End of row -->
                </div>
            </div>
        </div>
    </div>
</div>