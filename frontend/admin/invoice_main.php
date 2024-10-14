<div class = "w-100 bg-light m-5 p-4 rounded-5">

    
    <div class = "containter d-flex  ">
        <div class = "col-8  px-5 py-4">
            <div class = "mb-5">
                <h1>Manage Accounts</h1>
                <span class = "opacity-25 fw-bold">22 August - 25 October, 2024</span>
                <img src="" alt="">
            </div>
        </div>
    </div>

    <?php

            if (isset($_POST['add-item-submit'])) {
                // Check if this is an update or a new item
                if (isset($_POST['item_id']) && !empty($_POST['item_id'])) {
                    // Update existing item logic here
                    $item_id = $_POST['item_id'];
                    // Update the item in the database using $item_id and the new values from the form
                } else {
                    echo('error item');
                }
            }
            
        ?>
        <section class = "container mt-5">

        <div class = "d-flex justify-content-end gap-2 mb-2">
            <input type="text" placeholder = "Search..." id = "searchInput" name = "query"> <button class = "btn btn-primary" id ="searchButton"><i class="bi bi-search"></i> </button>
        </div>
        <div  style = "max-height: 500px; overflow-y: scroll;">
       
        
            <table class="table table-bordered table-hover"  >
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>ITEM NAME</th>
                    <th>RENTAL COST</th>
                    <th>DEPOSIT COST</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody  class ="bg-danger h-50" >
                <?php
                    require_once '../../backend/classes/schedule.class.php';

                    $schedule = new Schedule();
                    
                    // Fetch records based on user ID
                    $results = $schedule->show_schedules(); 
                    if (!empty($results)) {
                        $i = 1;
                        foreach ($results as $value) {
                ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo htmlspecialchars($value['name']); ?></td>
                    <td><?php echo  htmlspecialchars(number_format($value['rental_cost']),2); ?></td>
                    <td><?php echo  htmlspecialchars(number_format($value['deposit_cost']),2); ?></td>
                    <td> pending</td>
                    <td class="text-center d-flex justify-content-center gap-2">
                        <button class="btn btn-primary btn-sm edit-item-btn" data-bs-toggle="modal" >
                           
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button class="btn btn-danger delete-item-btn"><i class="bi bi-trash"></i></button>
                    </td>


                </tr>
                <?php
                            $i++;
                        }
                    } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center">No records found</td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>

        <div class = "d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal">
                Add Account
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
                        <form id="addItemForm" method = "POST">
                            <div class="mb-3">
                                <label for="inputName" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter item name" >
                            </div>
                            <div class="mb-3">
                                <label for="inputType" class="form-label">Type</label>
                                <select class="form-select" id="inputType" name="type" >
                                    <option value="" disabled selected>Select type</option>
                                    <option value="gown">Gown</option>
                                    <option value="suit">Suit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="inputSize" class="form-label">Size</label>
                                <input type="number" class="form-control" id="inputSize" name="size" placeholder="Enter size" >
                            </div>
                            <div class="mb-3">
                                <label for="inputDepositCost" class="form-label">Deposit Cost</label>
                                <input type="number" class="form-control" id="inputDepositCost" name="deposit_cost" placeholder="Enter deposit cost" >
                            </div>
                            <div class="mb-3">
                                <label for="inputRentalCost" class="form-label">Rental Cost</label>
                                <input type="number" class="form-control" id="inputRentalCost" name="rental_cost" placeholder="Enter rental cost" >
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
                            <form id="editItemForm" method="POST">
                                <input type="hidden" name="item_id" id="editItemId"> <!-- Hidden input for item ID -->
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

            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteItemModalLabel">Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete <strong id="deleteItemName"></strong>?</p>
                            <input type="hidden" id="deleteItemId">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>


        
        </section>


        <!-- ERROR! NOT SHOWING TOAST WHEN SUBMIT ITEM -->
        <!-- toast for feedback when adding item -->
        <?php 
            if(isset($_POST['add-item-submit'])) {?>
                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    <div id="addItemToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Success</strong>
                            <small>Just now</small>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            Item Added!
                        </div>
                    </div>
                </div>

        <?php
          
            }
          
        ?>
        
</div>

        <script src ="../js/additem.js"></script>
        <script src ="../js/manage.js"></script>
        <script src ="../js/editItem.js"></script>
        <script src ="../js/editItemAjax.js"></script>

</div>