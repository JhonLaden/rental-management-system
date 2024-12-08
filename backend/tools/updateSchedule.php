<?php
include_once '../classes/database.php';
include_once '../classes/schedule.class.php';
include_once '../classes/item.class.php';


session_start();

if (isset($_POST) && isset($_POST['update'])) {
    $schedule = new Schedule();
    $item = new Item();

    $schedule->id = htmlentities($_POST['schedule_id']);
    $schedule->status = htmlentities($_POST['update']);
    if($schedule->status == 'finished' || $schedule->status == 'canceled' ){
        $item->id = $_POST['item_id'];
        if(!$item->update_item_status(true)){
            echo 'failed';
            exit();
        }
        
    }
    $link = htmlentities($_POST['link']);

   if($schedule->update_status()){
        $message['title'] = "Schedule Successfully Updated!";
        $message['success'] = "Record is now updated.";
        $message['cancel'] = true;

        $_SESSION['message'] = $message;
        header('location: '. $link);
        echo 'success';
   }else{
    echo 'failed';
   }
} else {
    echo 'error';
}
