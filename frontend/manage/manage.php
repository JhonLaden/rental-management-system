<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    
?>
        <?php
            if(isset($_SESSION['loggeduser'])){
                $logged_user = $_SESSION['loggeduser'];
            }else{
                header('location: ../../frontend/');
            }
            
        ?>
        <section class = "container my-5 table-responsive">
            <h1> Manage Items </h1>

            <table class=" table table-striped" id = "example">
            <thead class="table-dark">
                <tr>    
                    <th>#</th>
                    <th>NAME</th>
                
                    <th>RENTAL PRICE</th>
                    <th>DEPOSIT COST</th>
                    <th>QUANTITY</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once '../../backend/classes/item.class.php';

                    $item = new Item();
                    
                    // Fetch records based on user ID
                    $results = $item->show($logged_user['user_id']); 
                    if (!empty($results)) {
                        $i = 1;
                        foreach ($results as $value) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($value['name']); ?></td>
                    <td><?php echo "₱ " . htmlspecialchars($value['rental_cost']); ?></td>
                    <td><?php echo "₱ " . htmlspecialchars($value['deposit_cost']); ?></td>
                    <td><?php echo htmlspecialchars($value['quantity']); ?></td>
                    <td class="text-center d-flex justify-content-center gap-2">
                        <div>
                            <button class="btn btn-primary  edit-item-btn" data-bs-toggle="modal" 
                                data-id="<?php echo $value['item_id']; ?>"
                                data-name="<?php echo htmlspecialchars($value['name']); ?>"
                                data-type="<?php echo htmlspecialchars($value['type']); ?>"
                                data-size="<?php echo htmlspecialchars($value['size']); ?>"
                                data-deposit-cost="<?php echo htmlspecialchars($value['deposit_cost']); ?>"
                                data-rental-cost="<?php echo htmlspecialchars($value['rental_cost']); ?>"
                                >
                                <i class="bi bi-pencil-square"></i>
                            </button>
                        </div>
                        
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
                            $i++;
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
                        <form action = "../../backend/tools/additem_tool.php" id="addItemForm" method = "POST">
                            <input type="hidden" name = "link" value = "../../frontend/manage/manage.php">
                            <div class="mb-3">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter item name" required >
                            </div>
                            <div class="mb-3">
                                <label for="inputType" class="form-label">Type</label>
                                <select class="form-select" id="inputType" name="type"  required>
                                    <option value="" disabled selected>Select type</option>
                                    <option value="gown">Gown</option>
                                    <option value="suit">Suit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inputSize" class="form-label">Size</label>
                                <input type="number" class="form-control" id="inputSize" name="size" placeholder="Enter size" required>
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
                                <button type="submit" class="btn btn-primary" id="submitBtn" name = "add-item-submit">Add Item</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>

            <!-- Edit Item Modal -->
            <div class="modal fade edit-item-modal" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Modal Body Content -->
                            <form action = "../../backend/tools/edititem_tool.php" id="editItemForm" method="POST">
                                <input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>">
                                <input type="hidden" name="link" value = "../../frontend/manage/manage.php"> 

                                <div class="mb-3">
                                    <label for="editName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editName" name="name" placeholder="Enter item name">
                                </div>
                                <div class="mb-3">
                                    <label for="editType" class="form-label">Type</label>
                                    <select class="form-select" id="editType" name="type">
                                        <option value="" disabled selected>Select type</option>
                                        <option value="gown">Gown</option>
                                        <option value="suit">Suit</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="editSize" class="form-label">Size</label>
                                    <input type="number" class="form-control" id="editSize" name="size" placeholder="Enter size">
                                </div>
                                <div class="mb-3">
                                    <label for="editDepositCost" class="form-label">Deposit Cost</label>
                                    <input type="number" class="form-control" id="editDepositCost" name="deposit_cost" placeholder="Enter deposit cost">
                                </div>
                                <div class="mb-3">
                                    <label for="editRentalCost" class="form-label">Rental Cost</label>
                                    <input type="number" class="form-control" id="editRentalCost" name="rental_cost" placeholder="Enter rental cost">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="editSubmitBtn" name="edit-item-submit">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
        </section>
        
        
<?php
     include_once('../includes/scripts.php');
?>
        <script>
            	
            new DataTable('#example');

        </script>
</div>
       
    
<?php
    include_once('../manage/manage_script.php');
?>
        
<?php
    require '../includes/footer.php'
?>
