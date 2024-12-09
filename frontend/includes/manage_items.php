<section class = "container my-5 table-responsive">
            <h1> Manage Items </h1>

            <table class=" table table-striped" id = "example">
            <thead class="table-dark">
                <tr>    
                    <th class = "text-center">ID</th>
                    <th class = "text-center">NAME</th>
                
                    <th class = "text-center">RENTAL PRICE</th>
                    <th class = "text-center">DEPOSIT COST</th>
                    <th class = "text-center">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../backend/classes/item.class.php';

                    $item = new Item();
                    
                    // Fetch records based on user ID
                    $results = $item->show(); 
                    if (!empty($results)) {
                        $i = 1;
                        foreach ($results as $value) {
                            if($value['is_active'] == true){
                ?>
                <tr class = "text-center">
                    <td><?php echo htmlspecialchars($value['item_id']); ?></td>
                    <td><?php echo htmlspecialchars($value['name']); ?></td>
                    <td><?php echo "₱ " . htmlspecialchars($value['rental_cost']); ?></td>
                    <td><?php echo "₱ " . htmlspecialchars($value['deposit_cost']); ?></td>
                    <td class="text-center d-flex justify-content-center gap-2">
                        <form action = "../manage/edit_item.php" action = "post">
                            <input type="hidden" name = "item_id" value = "<?php echo $value['item_id'] ?>">
                            <input type="hidden" name = "link" value = "../manage/manage.php">

                            <button class="btn btn-primary " >
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </form>
                        
                        <form action="../../backend/tools/deleteitem_tool.php" method="POST" id = "deleteForm">
                            <!-- Hidden input for delete action -->
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name ="link" value = "../../frontend/manage/manage.php">
                            <input type="hidden" name ="item_id" value = "<?php echo $value['item_id'] ?>">

                            <!-- Delete Button as a link with the item ID -->
                            <button type="submit" class="btn btn-danger delete-item-btn" name="item_id" value="<?php echo $value['item_id']; ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>


                </tr>
                <?php
                            $i++;}
                        }
                    } else {
                ?>
               
                <?php
                    }
                ?>
            </tbody>
        </table>

        <div class = "d-flex justify-content-end mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal">
            <i class="bi bi-upload"></i> Add Item
            </button>
        </div>
       

        <!-- add item Modal -->
        <div class="modal fade add-item-modal" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body Content -->
                        <form action="../../backend/tools/additem_tool.php" id="addItemForm" method="POST" enctype="multipart/form-data">
                            <?php
                                if($logged_user['type'] == 'admin'){?>
                                    <input type="hidden" name="link" value="../../frontend/admin/manage.php">
                            <?php
                                } else { ?>
                                    <input type="hidden" name="link" value="../../frontend/manage/manage.php">
                            <?php
                                }
                            ?>
                            <div class="mb-3">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter item name" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputType" class="form-label">Type</label>
                                <select class="form-select" id="inputType" name="type" required>
                                    <option value="" disabled selected>Select type</option>
                                    <option value="gown">Gown</option>
                                    <option value="suit">Suit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inputPhoto" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="inputPhoto" name="photo" accept="image/*" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="inputDescription" name="description" placeholder="Enter item description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="inputDepositCost" class="form-label">Deposit Cost</label>
                                <input type="number" class="form-control" id="inputDepositCost" name="deposit_cost" placeholder="Enter deposit cost" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputRentalCost" class="form-label">Rental Cost</label>
                                <input type="number" class="form-control" id="inputRentalCost" name="rental_cost" placeholder="Enter rental cost" required>
                            </div>
                            <div class="error-text text-danger text-center" style="display: none;"></div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="submitBtn" name="add-item-submit">Add Item</button>
                            </div>
                        </form>

                    </div>
                    
                </div>
            </div>
        </div>

            

            
        </section>