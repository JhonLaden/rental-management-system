<?php
include_once '../classes/database.php';
include_once '../classes/item.class.php';

session_start();

if (isset($_POST['item_id'])) {
    $item_id = $_POST['item_id'];
    $item = new Item();

    if ($item->delete_item($item_id)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
