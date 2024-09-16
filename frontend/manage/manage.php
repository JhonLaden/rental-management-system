<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';
?>
        <section class = "container mt-5">
            <h1> Manage Items </h1>
            <div class = "d-flex justify-content-end gap-2 mb-2">
                <input type="text" placeholder = "Search..."> <button class = "btn btn-primary"><i class="bi bi-search"></i> </button>
            </div>

            <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                
                    <th>RENTAL PRICE</th>
                    <th>DEPOSIT COST</th>
                    <th>QUANTITY</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>ipsum</td>
                    <td>$100</td>
                    <td>$50</td>
                    <td>4</td>
                    <td class ="text-center d-flex justify-content-center gap-2">
                        <button class="btn btn-primary btn-sm-danger"><i class="bi bi-pencil-square"></i> </button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lorem </td>

                    <td>$150</td>
                    <td>$75</td>
                    <td>3</td>
                    <td class ="text-center d-flex justify-content-center gap-2">
                        <button class="btn btn-primary btn-sm-danger"><i class="bi bi-pencil-square"></i> </button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <div class = "d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Item
            </button>
        </div>
       

        <!-- The Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body Content -->
                        <form id="exampleForm">
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
                                <label for="inputSize" class="form-label">Size</label>
                                <input type="text" class="form-control" id="inputSize" name="size" placeholder="Enter size" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputDepositCost" class="form-label">Deposit Cost</label>
                                <input type="number" class="form-control" id="inputDepositCost" name="depositCost" placeholder="Enter deposit cost" required>
                            </div>
                            <div class="mb-3">
                                <label for="inputRentalCost" class="form-label">Rental Cost</label>
                                <input type="number" class="form-control" id="inputRentalCost" name="rentalCost" placeholder="Enter rental cost" required>
                            </div>
                            <div class="error-text text-danger" style="display: none;"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">Add Item</button>
                    </div>
                </div>
            </div>
        
        </section>

<?php
    require '../includes/footer.php';
?>
