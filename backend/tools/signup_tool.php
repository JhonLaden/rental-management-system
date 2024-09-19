<?php
    include_once '../classes/database.php';
    include_once '../classes/users.class.php';

        session_start();

        $user = new Users();

        $firstname = htmlentities($_POST['firstname']);
        $middlename = htmlentities($_POST['middlename'] ?? '');
        $lastname = htmlentities($_POST['lastname']);
        $email = htmlentities($_POST['email']);
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);

        
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $user->email = $email; // getting the email 
                if(!empty($user->show_email())){ //check if the email is already existed 
                    echo $email . ' -This email is already exist';
                } else {
                    $user->first_name = $firstname;
                    $user->middle_name = $middlename;
                    $user->last_name = $lastname;
                    $user->username = $username;
                    $user->password = $password;

                    if ($user->add_user()) {
                        $emails = $user->show_email();
                        if (!empty($emails)) {
                            $row = $emails[0]; // Assuming you only need the first row
                            $_SESSION['user_id'] = $row['user_id'];
                            echo 'success';
                        } else {
                            echo 'email is empty';
                        }
                    } else {
                        echo 'Something went wrong';
                    }
                }
            }else{
                echo $email . ' - It is not valid email';
            }
        }else{
            echo 'All input fields are required';
        }

?>