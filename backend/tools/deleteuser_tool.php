<?php
include_once '../classes/database.php';
include_once '../classes/users.class.php';

session_start();

if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
    $user = new Users(); // Assuming `User` class exists
    $user->id = $user_id; // Set user ID for deletion
    $message = [];
    $link = '';

    if (isset($_POST['link'])) {
        $link = $_POST['link'];
    }

    if ($user->delete_user()) { // Call the `delete_user()` method
        $message['title'] = "User deleted!";
        $message['success'] = "The user record has been successfully deleted.";
        $message['delete'] = true;
        $_SESSION['message'] = $message;
        header('location: ' . $link);
        exit();
    } else {
        echo 'Error occurred while deleting the user.';
    }
} else {
    echo 'No user ID provided.';
}
