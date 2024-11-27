<?php

require_once 'database.php';

class Schedule{
    //attributes

    public $id;
    public $start_date;
    public $return_date;
    public $borrower_id;
    public $lender_id;
    public $item_id;
    public $update;
    public $logged_user_id;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_schedule(){
        $sql = "INSERT INTO rental_schedule (start_date, return_date, borrower_id,  lender_id, item_id) VALUE 
        (:start_date, :return_date, :borrower_id, :lender_id, :item_id);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':start_date', $this->start_date);
        $query->bindParam(':return_date', $this->return_date);
        $query->bindParam(':borrower_id', $this->borrower_id);
        $query->bindParam(':lender_id', $this->lender_id);
        $query->bindParam(':item_id', $this->item_id);

        if($query->execute()){
            return true;
        }else{
            false;
        }
    }


    function show() {
        $sql = "SELECT rental_schedule.*, item.*, user.*
        FROM rental_schedule 
        LEFT JOIN user ON user.user_id = rental_schedule.borrower_id
	    LEFT JOIN item ON item.item_id = rental_schedule.item_id
        WHERE  rental_schedule.borrower_id = :logged_user_id || rental_schedule.lender_id = :logged_user_id;
        "; // Adjust selected fields as needed

    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':logged_user_id', $this->logged_user_id);

    
        if ($query->execute()) {
            $data = $query->fetchAll(); // Optional: Fetch as associative array
        } else {
            $data = []; // Return an empty array if no records found or if execution fails
        }
        
        return $data;
    }

    function show_schedules() {
        $sql = "SELECT rental_schedule.*, item.*, user.*
        FROM rental_schedule 
        LEFT JOIN user ON user.user_id = rental_schedule.borrower_id
	    LEFT JOIN item ON item.item_id = rental_schedule.item_id
        ;";
        
    
        $query = $this->db->connect()->prepare($sql);

    
        if ($query->execute()) {
            $data = $query->fetchAll(); // Optional: Fetch as associative array
        } else {
            $data = []; // Return an empty array if no records found or if execution fails
        }
        
        return $data;
    }

    function show_email(){
        $sql = "SELECT * FROM schedule WHERE email = :email";
    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
    
        if($query->execute()){
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }

    
    function update_status() {
        $sql = "update rental_schedule
        SET status = :status
        where schedule_id = :id
        ";

    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);

    
        if ($query->execute()) {
            return true ;
        } else {
            return false;
        }
        
        return $data;
    }

}

?>