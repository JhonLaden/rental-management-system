<?php
include_once '../classes/database.php';
include_once '../classes/users.class.php';

session_start();

$logged_user = $_SESSION['loggeduser'];
$user = new Users();

// Retrieve the posted data
$user_id = htmlentities($_POST['user_id'] ?? '');
$first_name = htmlentities($_POST['first_name'] ?? '');
$middle_name = htmlentities($_POST['middle_name'] ?? '');
$last_name = htmlentities($_POST['last_name'] ?? '');
$email = htmlentities($_POST['email'] ?? '');
$username = htmlentities($_POST['username'] ?? '');
$password = htmlentities($_POST['password'] ?? ''); // Optional
$type = htmlentities($_POST['type'] ?? '');
$link = htmlentities($_POST['link'] ?? '');

// Validate the inputs
if (!empty($user_id) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($username)) {
    // Hash the password if it is updated
    $hashed_password = '';
    if (!empty($password)) {
        $hashed_password = $password;
    }

    // Set the properties for the user to be updated
    $user->id = $user_id;
    $user->first_name = $first_name;
    $user->middle_name = $middle_name;
    $user->last_name = $last_name;
    $user->email = $email;
    $user->username = $username;
    $user->password = $hashed_password; // Will only update if not empty
    $user->type = $type;

    $message = [];

    // Attempt to update the user
    if ($user->update_user()) {
        $message['title'] = "Update Successfully!";
        $message['success'] = "User record has been updated.";
        $message['edit'] = true;

        $_SESSION['user_id'] = $user_id;
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
