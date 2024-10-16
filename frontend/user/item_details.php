<?php


    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    require_once '../../backend/classes/item.class.php';


    $item = new Item();

    if(isset($_GET['item_id'])){
        $item_id = $_GET['item_id'];
        $item->id = $item_id;
        $selected_item = $item->search_item()[0];

        $_SESSION['item_id'] = $item_id;
    }
?>
        
    <div class = 'container d-flex mt-5 '>
        <!-- 1st container -->
        <div class = "col-8 ">
            <div class="text-center" style = "height:550px">
                <img src="../assets/images/gown1.jpeg" class="img-fluid h-100 w-100"  alt="Gown" style = " object-fit: cover;" >
            </div>
            <div class = "d-flex flex-column justify-content-center">
                <p class = "m-0" >Name: <?php echo $selected_item['name'] ?></p>
                <p class = "m-0">Size: <?php echo number_format($selected_item['size']); ?></p>
                <p class = "m-0">Availability: in stock</p>
            </div>
        </div>
        <!-- 2nd container -->
        <div class = "col-4 bg-light">
            <div class = "text-center container p-4">
                <p>Elevate your elegance with this Classic White Gown, designed for timeless beauty. Crafted from flowing chiffon, it features a fitted bodice with a sweetheart neckline and delicate embroidery.</p>
            </div>
            <div class = "text-center w-100  " style = "height: 200px; width: 150px"><img class = "h-100 rounded-3" src="../assets/images/user_profile.jpeg" alt="" style= "object-fit: cover;"></div>
            <div class = "text-center pt-2">
                <div>
                    <p><?php echo $selected_item['username']?></p>
                </div>
                <div class = "fw-bold">
                    <span class = " opacity-50">15 successful lends</span>
                </div>
                <div class = "my-4 fw-bold text-success">
                    <p class = "m-0">deposit fee: ₱ <?php echo number_format($selected_item['deposit_cost'],2);?></p>
                    <p class = "m-0">Rental fee: ₱ <?php echo number_format($selected_item['rental_cost'],2);?></p>
                </div>
                <div class = "mb-3">
                    <i class="bi bi-circle-fill text-primary"></i>
                    <i class="bi bi-circle-fill text-success"></i>
                    <i class="bi bi-circle-fill text-warning"></i>
                    <i class="bi bi-circle-fill text-dark"></i>

                </div>
            </div>
            <div class = "text-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookModal">
                    Rent Item
                </button>
            </div>

           <!-- Book Item Modal -->
            <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookItemModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookItemModalLabel">Rental Schedule</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Modal Body Content -->
                            <form id="bookItemForm" method="POST">
                                <div class="mb-3">
                                    <label for="inputRentalStart" class="form-label">Rental Start Date</label>
                                    <input type="date" class="form-control" id="inputRentalStart" name="start_date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="inputReturnDate" class="form-label">Return Date</label>
                                    <input type="date" class="form-control" id="inputReturnDate" name="return_date" required>
                                </div>
                                <div class="error-text text-danger text-center" style="display: none;"></div>
                                <div class="error-text text-danger"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="submitBookingBtn" name="book-item-submit">Confirm Rent</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

      
    <script src = "../js/addschedule.js"></script>

<?php
    require '../includes/footer.php';
?>