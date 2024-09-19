<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    
?>
        <?php
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            }else{
                header('location: frontend/user/home.php');
            }
        ?>
        <section class = "container mt-5">
            <h1> Manage Items </h1>
            <div class = "d-flex justify-content-end gap-2 mb-2">
                <input type="text" placeholder = "Search..." id = "searchInput" name = "query"> <button class = "btn btn-primary" id ="searchButton"><i class="bi bi-search"></i> </button>
            </div>

            <table class="table table-bordered table-hover">
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
                    $results = $item->show($user_id); 
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
                        <button class="btn btn-primary btn-sm-danger"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
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

        <div class = "d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addItemModal">
                Add Item
            </button>
        </div>
       

        <!-- The Modal -->
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

<?php
    require '../includes/footer.php'
?>
