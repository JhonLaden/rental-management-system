<?php
include_once '../classes/database.php';
include_once '../classes/schedule.class.php';

session_start();

if (isset($_POST) && isset($_POST['update'])) {
    $schedule = new Schedule();
    $schedule->id = htmlentities($_POST['schedule_id']);
    $schedule->status = htmlentities($_POST['update']);
    $link = htmlentities($_POST['link']);

   if($schedule->update_status()){
        $message['title'] = "Schedule Successfully Canceled!";
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