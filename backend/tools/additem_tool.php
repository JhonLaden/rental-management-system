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
        $size = htmlentities($_POST['size'] ?? '');
        $deposit_cost = htmlentities($_POST['deposit_cost'] ?? '');
        $rental_cost = htmlentities($_POST['rental_cost'] ?? '');

        if(!empty($name) && !empty($type) && !empty($size) && !empty($deposit_cost) && !empty(($rental_cost))){
            
            $item->name = $name;
            $item->type = $type;
            $item->size = $size;
            $item->deposit_cost = $deposit_cost;
            $item->rental_cost = $rental_cost;
            $item->quantity = 1;
            $item->owner_id = $owner_id;

            if ($item->add_item()) {
                    $message['add'] = true;
                    $message['title'] = "Item uploaded Successfully!";
                    $message['success'] = "Record is now updated.";
                    $_SESSION['message'] = $message;
                    header('location: '. $link);
                    exit();

            } else {
                echo 'Something went wrong';
            }
        }else{
            echo 'All input fields are required';
        }

?>