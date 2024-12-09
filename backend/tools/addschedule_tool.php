<?php
    include_once '../classes/database.php';
    include_once '../classes/schedule.class.php';
    include_once '../classes/item.class.php';


        session_start();

        $logged_user = $_SESSION['loggeduser'];
        $schedule = new Schedule();
        $item = new Item();
        $link = htmlentities($_POST['link']);



        if(isset($_POST['add_schedule_form'])){
            $start_date = htmlentities($_POST['start_date'] ?? '');
            $return_date = htmlentities($_POST['return_date'] ?? '');
            $borrower_id = htmlentities($_POST['borrower_id'] ?? '');
            $lender_id = htmlentities($_POST['lender_id'] ?? '');
            $method = htmlentities($_POST['method'] ?? '');
            $delivery_address = htmlentities($_POST['delivery_address'] ?? '');

            $item_id = htmlentities($_POST['item_id'] ?? '');
    
            $item->id = $item_id; 
            $item->status = false;
            $selected_item = $item->search_item()[0];
            
            $schedule->start_date = $start_date;
            $schedule->return_date = $return_date;
            $schedule->borrower_id = $borrower_id;
            $schedule->lender_id = $lender_id;
            $schedule->method = $method;
            $schedule->delivery_address = $delivery_address;
            $schedule->item_id = $item_id;

            $_SESSION['sched'] = $schedule;

            if ($schedule->add_schedule() ) {
                $message['add_schedule'] = true;
                $message['title'] = "Reserve Item Successfully!";
                $message['success'] = "Record is now updated."; 
                $_SESSION['message'] = $message;
                
                header('location: '. $link);
                exit();
            }
        }else {
            echo 'Something went wrong';
        }
        

?>