<?php


    $title = 'browse';
    require '../includes/head.php';
    require '../includes/header.php';

    require_once '../../backend/classes/item.class.php';


    $item = new Item();
    $logged_user;

    if(isset($_SESSION['loggeduser'])){
        $logged_user = $_SESSION['loggeduser'];
    }

    if(isset($_GET['item_id'])){
        $item_id = $_GET['item_id'];
        $item->id = $item_id;
        $selected_item = $item->search_item()[0];

    }
?>
        
    <div class = 'container d-flex mt-5 justify-content-center'>
     
        <div>
            <!-- Modal Body Content -->
            <form action = "../../backend/tools/addschedule_tool.php" id="bookItemForm" method="POST">
                <input type="hidden" name = "borrower_id" value = "<?php echo $logged_user['user_id'] ?>">
                <input type="hidden" name = "lender_id" value = "<?php echo $_GET['lender_id'] ?>">
                <input type="hidden" name = "item_id" value = "<?php echo $selected_item['item_id'] ?>">

                <input type="hidden" name = "add_schedule_form" value = "true" ?>
                <input type="hidden" name = "link" value = "../../frontend/user/item_details.php?item_id=<?php echo $selected_item['item_id'] ?>" ?>


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
      <?php

        include('../includes/scripts.php');
      ?>
    <script src = "../js/addschedule.js"></script>

<?php
    require '../includes/footer.php';
?>