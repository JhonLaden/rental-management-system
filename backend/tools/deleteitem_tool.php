<?php
include_once '../classes/database.php';
include_once '../classes/item.class.php';

session_start();

if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $item = new Item();
    $item->id = $item_id;
    $message = [];
    $link ;

    if(isset($_POST['link'])){
        $link= $_POST['link'];
    }

    if ($item->delete_item()) {
        $message['title'] = "Item deleted!";
        $message['success'] = "Record is now updated.";
        $message['delete'] = true;
        $_SESSION['message'] = $message;
        header('location: '. $link);
        exit();
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
