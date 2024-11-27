<?php
    include_once '../classes/database.php';
    include_once '../classes/schedule.class.php';
    include_once '../classes/item.class.php';


        session_start();

        $logged_user = $_SESSION['loggeduser'];
        $schedule = new Schedule();
        $item = new Item();



        if(isset($_POST['add_schedule_form'])){
            $start_date = htmlentities($_POST['start_date'] ?? '');
            $return_date = htmlentities($_POST['return_date'] ?? '');
            $borrower_id = htmlentities($_POST['borrower_id'] ?? '');
            $lender_id = htmlentities($_POST['lender_id'] ?? '');
            $item_id = htmlentities($_POST['item_id'] ?? '');
    
            $item->id = $item_id; 
            $selected_item = $item->search_item()[0];
            
            $schedule->start_date = $start_date;
            $schedule->return_date = $return_date;
            $schedule->borrower_id = $borrower_id;
            $schedule->lender_id = $lender_id;
            $schedule->item_id = $item_id;
            
            echo $schedule->borrower_id;
            echo $schedule->lender_id;
            if ($schedule->add_schedule()) {
                    echo 'success';
            }
        }else {
            echo 'Something went wrong';
        }
        

?>