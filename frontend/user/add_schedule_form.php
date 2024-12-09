<?php
    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';
    require_once '../../backend/classes/item.class.php';

    $item = new Item();
    $logged_user;

    if (isset($_SESSION['loggeduser'])) {
        $logged_user = $_SESSION['loggeduser'];
    }

    if (isset($_GET['item_id'])) {
        $item_id = $_GET['item_id'];
        $item->id = $item_id;
        $selected_item = $item->search_item()[0];
    }
?>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg" style="max-width: 600px; width: 100%;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">Rent an Item</h5>
            <form action="../../backend/tools/addschedule_tool.php" id="bookItemForm" method="POST">
                <input type="hidden" name="borrower_id" value="<?php echo $logged_user['user_id']; ?>">
                <input type="hidden" name="lender_id" value="<?php echo $_GET['lender_id']; ?>">
                <input type="hidden" name="item_id" value="<?php echo $selected_item['item_id']; ?>">
                <input type="hidden" name="add_schedule_form" value="true">
                <input type="hidden" name="link" value="../../frontend/user/item_details.php?item_id=<?php echo $selected_item['item_id']; ?>">

                <!-- Rental Start Date -->
                <div class="mb-3">
                    <label for="inputRentalStart" class="form-label">Rental Start Date</label>
                    <input type="date" class="form-control" id="inputRentalStart" name="start_date" required>
                </div>


                <!-- Return Date -->
                <div class="mb-3">
                    <label for="inputReturnDate" class="form-label">Return Date</label>
                    <input type="date" class="form-control" id="inputReturnDate" name="return_date" required>
                </div>

                <!-- method -->
                <div class="mb-3">
                    <label for="method" class="form-label">Method of Getting the Item</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="method" id="pickup" value="pickup" required>
                        <label class="form-check-label" for="pickup">Pick-up</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="method" id="delivery" value="delivery" required>
                        <label class="form-check-label" for="delivery">Delivery</label>
                        <small class="text-muted">(+₱ 170.00 additional charge)</small>
                    </div>
                </div>

                <div class="mb-3" id="addressInput" style="display: none;">
                    <label for="deliveryAddress" class="form-label">Delivery Address</label>
                    <textarea class="form-control" id="deliveryAddress" name="delivery_address" rows="3" placeholder="Enter your delivery address"></textarea>
                </div>

                

                <!-- Error Messages -->
                <div class="error-text text-danger text-center" style="display: none;"></div>

                <!-- Action Buttons -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitBookingBtn" name="book-item-submit">Confirm Rent</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include('../includes/scripts.php');
    
?>
<script src="../js/addschedule.js">
   

</script>

<script>
     document.addEventListener('DOMContentLoaded', function () {
    const deliveryRadio = document.getElementById('delivery');
    const pickupRadio = document.getElementById('pickup');
    const addressInput = document.getElementById('addressInput');

    deliveryRadio.addEventListener('change', function () {
        if (deliveryRadio.checked) {
            addressInput.style.display = 'block';
        }
    });

    pickupRadio.addEventListener('change', function () {
        if (pickupRadio.checked) {
            addressInput.style.display = 'none';
        }
    });


        

});
</script>

<?php
    include('../includes/add_schedule_script.php');
?>

<?php
    require '../includes/footer.php';
?>
