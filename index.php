<?php
    
    //this is where the page starts

    //start session
    session_start();

    //check if user is login already otherwise send to login page
    if (isset($_SESSION['login'])){
        header('location: frontend/user/home.php');
    }
    else{
        header('location: frontend/user/home.php');

    }

?>