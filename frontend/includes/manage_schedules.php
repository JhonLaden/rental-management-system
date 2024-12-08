<section class = "container mt-5">
            <h1> Manage Schedules </h1>

            <table class="table table-striped table-responsive text-center" id ="example">
            <thead class="table-dark text-center">
                <tr>
                    <th class = "text-center">Schedule ID</th>
                    <th class = "text-center">Item Name</th>
                    <th class = "text-center">Borrower Name</th>
                    <th class = "text-center">Deposit Cost</th>
                    <th class = "text-center">Cost</th>
                    <th class = "text-center">Status</th>
                
                    <th class = "text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../backend/classes/schedule.class.php';

                    $schedule = new Schedule();
                    $schedule->logged_user_id = $logged_user['user_id'];

                    // Fetch records based on user ID
                    $results = $schedule->show_all_schedules(); 
                    if (!empty($results)) {
                        
                        foreach ($results as $value) {
                ?>
                <tr>
                    <td class = "text-center"><?php echo $value['schedule_id']; ?></td>

                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['borrower_firstname'] .' '. $value['borrower_lastname']; ?></td>

                    <td class = "text-center"><?php echo '₱' . ' ' . $value['cost'] ;?></td>
                    <td class = "text-capitalize"><?php echo '₱' . ' ' . $value['rental_cost'] ;?></td>
                    <td class = "text-capitalize"> <?php echo $value['status'] ?></td>

                    <td class="text-center d-flex justify-content-center gap-2 align-items-center">
                        <form action="../view/view_receipt.php"  method = "POST">
                            <input type="hidden" name = "item_id" value = "<?php echo $value['item_id'] ?>" >
                            <input type="hidden" name = "schedule_id" value = "<?php echo $value['schedule_id']; ?>" >
                            <input type="hidden" name = "link" value = "../../frontend/view/view.php" >

                            <button name = "view_btn" class="btn btn-info btn-sm "  ><i class="bi bi-eye"></i></button>
                        </form>
                        <?php
                        
                            if(($value['status'] == 'pending' && ($logged_user['user_id'] == $value['lender_id'] || $logged_user['type'] == 'admin'))){?>
                                <form action="../../backend/tools/updateSchedule.php?item_id=<?php echo $value['item_id'] ?>"  method = "POST">
                                <input type="hidden" name = "item_id" value = "<?php echo $value['item_id'] ?>" >

                                    <input type="hidden" name = "link" value = "../../frontend/view/view.php" >
                                    <input type="hidden" name = "update" value = "rented" >
                                    <input type="hidden" name = "schedule_id" value = "<?php echo $value['schedule_id']; ?>" >
                                    <button name = "update_btn" class="btn btn-success check-btn btn-sm"  ><i class="bi bi-check-square"></i></button>
                                </form>

                            <?php
                            }
                            if($value['status'] == 'rented' && ($logged_user['user_id'] == $value['lender_id'] || $logged_user['type'] == 'admin')){?>
                                <form action="../../backend/tools/updateSchedule.php?item_id=<?php echo $value['item_id'] ?>"  method = "POST">
                                <input type="hidden" name = "item_id" value = "<?php echo $value['item_id'] ?>" >

                                    <input type="hidden" name = "link" value = "../../frontend/view/view.php" >
                                    <input type="hidden" name = "update" value = "finished" >
                                    <input type="hidden" name = "schedule_id" value = "<?php echo $value['schedule_id']; ?>" >

                                    <button name = "update_btn" class="btn btn-success check-btn btn-sm"  ><i class="bi bi-clipboard-check-fill"></i></button>

                                </form>
                            <?php

                            }
                            
                            ?>

                        <?php

                            if(($value['status'] == 'pending' || $value['status'] != 'canceled') && ($logged_user['user_id'] == $value['lender_id'] || $logged_user['type'] == 'admin') && ($value['status'] != "finished") ){?>
                                <form action="../../backend/tools/updateSchedule.php?item_id=<?php echo $value['item_id'] ?>" id = "update_form" name = "update_form" method = "POST">
                                    <input type="hidden" name = "item_id" value = "<?php echo $value['item_id'] ?>" >

                                    <input type="hidden" name = "link" value = "../../frontend/view/view.php" >
                                    <input type="hidden" name = "update" value = "canceled" >
                                    <input type="hidden" name = "schedule_id" value = "<?php echo $value['schedule_id']; ?>" >

                                    <button name = "update_btn" class="btn btn-danger cancel-btn btn-sm"  ><i class="bi bi-x-square"></i></button>

                                </form>

                            <?php

                            }?>
                       
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