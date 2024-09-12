<?php
include_once '../classes/database.php';
include_once '../classes/users.class.php';

    session_start();

    $user = new Users();

    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);

    
    if(!empty($email) && !empty($password) ){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $user->email = $email;
            $emails = $user->show_email(); // getting the email from data
            if (!empty($emails)) {
                $row = $emails[0]; // Assuming you only need the first row
                if($row['email'] == $email && $row['password'] == $password){
                    $_SESSION['user_id'] = $row['user_id'];
                    echo 'success';
                }else{
                    echo 'Email or password is incorrect';
                }
            }else{
                echo 'Email or password is incorrect';
            }
        }else{
            echo $email . ' - It is not valid email';
        }
    }else{
        echo 'All input fields are required';
    }

?>