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
$description = htmlentities($_POST['description'] ?? '');
$link = htmlentities($_POST['link'] ?? '');
$imgurl = htmlentities($_POST['imgurl'] ?? ''); // Get the hidden input value


// Initialize photo variable
$photo = $_FILES['photo'] ?? null;

// Debug uploaded file
var_dump($_FILES['photo']);

// Validate the inputs
if (!empty($item_id) && !empty($name) && !empty($type) && !empty($deposit_cost) && !empty($rental_cost)) {

    $photo_name = $imgurl; // Default to current photo from hidden input

    // Handle file upload for photo if a new file is uploaded
    if ($photo && $photo['error'] == 0) {
        $upload_dir = '../../frontend/assets/uploads/';
        $file_name = basename($photo['name']);
        $target_file = $upload_dir . $file_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate file type
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($file_type, $allowed_types)) {
            echo "Invalid file type. Allowed types: JPG, JPEG, PNG, GIF.";
            exit();
        }

        // Move file to uploads directory
        if (move_uploaded_file($photo['tmp_name'], $target_file)) {
            $photo_name = $file_name; // Set new photo name if upload succeeds
        } else {
            echo 'File upload failed';
            exit();
        }
    }

    // Set the properties for the item to be updated
    $item->id = $item_id;
    $item->name = $name;
    $item->type = $type;
    $item->size = $size;
    $item->deposit_cost = $deposit_cost;
    $item->rental_cost = $rental_cost;
    $item->description = $description;
    $item->photo = $photo_name; // Use either the uploaded photo or the existing photo
    $item->owner_id = $logged_user['user_id'];

    $message = [];

    // Attempt to update the item
    if ($item->update_item()) {
        $message['title'] = "Update Successfully!";
        $message['success'] = "Record is now updated.";
        $message['edit'] = true;

        $_SESSION['item_id'] = $_POST['item_id'];
        $_SESSION['message'] = $message;
        header('location: ' . $link);
        exit();
    } else {
        echo 'Something went wrong';  // Handle any errors during the update process
       
    }
} else {
    echo 'All input fields are required';  // Return error if validation fails
}
?>
