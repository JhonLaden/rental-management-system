<?php
    include_once '../classes/database.php';
    include_once '../classes/item.class.php';

        session_start();

        $owner_id = $_SESSION['user_id'];
        $item = new Item();

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
                    echo 'success';
            } else {
                echo 'Something went wrong';
            }
        }else{
            echo 'All input fields are required';
        }

?>