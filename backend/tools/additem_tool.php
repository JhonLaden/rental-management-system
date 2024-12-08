<?php
include_once '../classes/database.php';
include_once '../classes/item.class.php';

session_start();

if(isset($_SESSION['loggeduser'])){
    $logged_user = $_SESSION['loggeduser'];
}

$owner_id = $logged_user['user_id'];
$item = new Item();
$message = [];
$link = htmlentities($_POST['link'] ?? '');

$name = htmlentities($_POST['name'] ?? '');
$type = htmlentities($_POST['type'] ?? '');
$deposit_cost = htmlentities($_POST['deposit_cost'] ?? '');
$rental_cost = htmlentities($_POST['rental_cost'] ?? '');
$description = htmlentities($_POST['description'] ?? '');
$photo = $_FILES['photo'] ?? null;


if (!empty($name) && !empty($type) && !empty($deposit_cost) && !empty($rental_cost) && !empty($description) && !empty($photo) ) {
    // Handle file upload
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
        $item->name = $name;
        $item->type = $type;
        $item->deposit_cost = $deposit_cost;
        $item->rental_cost = $rental_cost;
        $item->description = $description;
        $item->photo = $file_name; // Save file name
        $item->owner_id = $owner_id;

        if ($item->add_item()) {
            $message['add'] = true;
            $message['title'] = "Item uploaded Successfully!";
            $message['success'] = "Record is now updated.";
            $_SESSION['message'] = $message;
            header('location: ' . $link);
            exit();
        } else {
            echo 'Something went wrong';
        }
    } else {
        echo 'File upload failed';
    }
} else {
    echo 'All input fields are required';
}
?>
