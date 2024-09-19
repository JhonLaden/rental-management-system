<?php
    require_once '../../backend/classes/item.class.php';
    session_start();

    $item = new Item();
    $user_id = $_SESSION['user_id'];

    // Get the query from the request
    $query = isset($_POST['query']) ? trim($_POST['query']) : '';

    // Fetch results based on the query
    if ($query === '') {
        // If query is empty, fetch all items
        $results = $item->show($user_id);
    } else {
        // Otherwise, perform the search
        $results = $item->search($query, $user_id);
    }

    // Return results as JSON
    echo json_encode($results);
?>
