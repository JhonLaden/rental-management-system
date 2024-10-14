<?php
    include_once '../classes/database.php';
    include_once '../classes/item.class.php';

    session_start();

    $owner_id = $_SESSION['user_id'];
    $item = new Item();

    // Retrieve the posted data
    $item_id = htmlentities($_POST['item_id'] ?? '');
    $name = htmlentities($_POST['name'] ?? '');
    $type = htmlentities($_POST['type'] ?? '');
    $size = htmlentities($_POST['size'] ?? '');
    $deposit_cost = htmlentities($_POST['deposit_cost'] ?? '');
    $rental_cost = htmlentities($_POST['rental_cost'] ?? '');

    // Validate the inputs
    if(!empty($item_id) && !empty($name) && !empty($type) && !empty($size) && !empty($deposit_cost) && !empty($rental_cost)) {
        
        // Set the properties for the item to be updated
        $item->id = $item_id;
        $item->name = $name;
        $item->type = $type;
        $item->size = $size;
        $item->deposit_cost = $deposit_cost;
        $item->rental_cost = $rental_cost;
        $item->owner_id = $owner_id;

        // Attempt to update the item
        if ($item->update_item()) {
            echo 'success';  // Output success message if update was successful
        } else {
            echo 'Something went wrong';  // Handle any errors during the update process
        }
    } else {
        echo 'All input fields are required';  // Return error if validation fails
    }
?>
