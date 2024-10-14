<?php
    include_once '../classes/database.php';
    include_once '../classes/schedule.class.php';
    include_once '../classes/item.class.php';


        session_start();

        $owner_id = $_SESSION['user_id'];
        $schedule = new Schedule();
        $item = new Item();


        $start_date = htmlentities($_POST['start_date'] ?? '');
        $return_date = htmlentities($_POST['return_date'] ?? '');
        $borrower_id = htmlentities($owner_id ?? '');
        $item_id = htmlentities($_SESSION['item_id'] ?? '');

        $item->id = $item_id; 
        $selected_item = $item->search_item()[0];

        $lender_id =  htmlentities($selected_item['owner_id'] ?? '');
        $schedule->start_date = $start_date;
        $schedule->return_date = $return_date;
        $schedule->borrower_id = $borrower_id;
        $schedule->lender_id = $lender_id;
        $schedule->item_id = $item_id;
        
        if ($schedule->add_schedule()) {
                echo 'success';
        } else {
            echo 'Something went wrong';
        }
        

?>