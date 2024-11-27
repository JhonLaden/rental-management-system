<?php
    include_once '../classes/database.php';
    include_once '../classes/item.class.php';

    session_start();

    $logged_user = $_SESSION['loggeduser'];
    $item = new Item();

    // Retrieve the posted data
    $item_id = htmlentities($_POST['item_id'] ?? '');
    $name = htmlentities($_POST['name'] ?? '');
    $type = htmlentities($_POST['type'] ?? '');
    $size = htmlentities($_POST['size'] ?? '');
    $deposit_cost = htmlentities($_POST['deposit_cost'] ?? '');
    $rental_cost = htmlentities($_POST['rental_cost'] ?? '');
    $link = htmlentities($_POST['link'] ?? '');

    // Validate the inputs
    if(!empty($item_id) && !empty($name) && !empty($type) && !empty($size) && !empty($deposit_cost) && !empty($rental_cost)) {
        
        // Set the properties for the item to be updated
        $item->id = $item_id;
        $item->name = $name;
        $item->type = $type;
        $item->size = $size;
        $item->deposit_cost = $deposit_cost;
        $item->rental_cost = $rental_cost;
        $item->owner_id = $logged_user['user_id'];
        $message = [];

        // Attempt to update the item
        if ($item->update_item()) {
            $message['title'] = "Update Successfully!";
            $message['success'] = "Record is now updated.";
            $message['edit'] = true;

            $_SESSION['message'] = $message;
            header('location: '. $link);
        } else {
            echo 'Something went wrong';  // Handle any errors during the update process
        }
    } else {
        echo 'All input fields are required';  // Return error if validation fails
    }
?>
