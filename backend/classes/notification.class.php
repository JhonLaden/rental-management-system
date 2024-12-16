<?php

require_once 'database.class.php';

class Notification
{
    //attributes

    public $id;
    public $user_id;
    public $status;
    public $message;


    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function add_notification()
    {
        $sql = "INSERT INTO notifications (user_id, message, status) VALUES (:user_id, :message, 'unread')";
        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':user_id', $this->user_id);
        $query->bindParam(':message', $this->message);

        $query->execute();

        if ($query->execute()) {
            return true;
        }
        return false;
    }

    function show()
    {
        $sql = "SELECT * FROM notification WHERE user_id = :user_id AND status = 'unread' ORDER BY created_at DESC";
        $query = $this->db->connect()->prepare($sql);

        $query->bindParam(':user_id', $this->user_id);

        $query->execute();

        if ($query->execute()) {
            $data = $query->fetchAll();
        }
        return $data;
    }
}
