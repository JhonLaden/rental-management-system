<?php

require_once 'database.php';

class Schedule
{
    //attributes

    public $id;
    public $start_date;
    public $return_date;
    public $borrower_id;
    public $lender_id;
    public $item_id;
    public $cost;
    public $update;
    public $method;
    public $address;
    public $logged_user_id;
    public $delivery_address;
    public $email;



    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add_schedule()
    {
        // Calculate the number of days for rental
        $start_date = new DateTime($this->start_date);
        $return_date = new DateTime($this->return_date);
        $interval = $start_date->diff($return_date);
        $rental_days = $interval->days;

        // Get the rental cost per day for the item
        $item = new Item();
        $item->id = $this->item_id;

        $item_cost = $item->get_item_cost();
        $deposit_cost = $item->get_deposit_cost();


        // Calculate the total rental cost
        $total_cost = ($item_cost * $rental_days) + $deposit_cost;
        if ($this->method == 'delivery') {
            $total_cost += 170;
        }

        // Insert the schedule with the calculated cost
        $sql = "INSERT INTO rental_schedule (start_date, return_date, borrower_id, lender_id, item_id, cost, method, delivery_address) 
                VALUES (:start_date, :return_date, :borrower_id, :lender_id, :item_id, :cost, :method, :delivery_address);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':start_date', $this->start_date);
        $query->bindParam(':return_date', $this->return_date);
        $query->bindParam(':borrower_id', $this->borrower_id);
        $query->bindParam(':lender_id', $this->lender_id);
        $query->bindParam(':item_id', $this->item_id);
        $query->bindParam(':cost', $total_cost); // Bind the calculated total cost
        $query->bindParam(':method', $this->method);
        $query->bindParam(':delivery_address', $this->delivery_address);

        // Execute the query to insert schedule
        if ($query->execute()) {
            // After the schedule is added, update the item status to false (not in stock)
            if ($item->update_item_status(false)) {
                return true; // If the item status is updated successfully, return true
            } else {
                return false; // If updating item status failed, return false
            }
        } else {
            return false; // If inserting schedule fails, return false
        }
    }




    function show()
    {
        $sql = "SELECT rental_schedule.*, item.*, user.*, user.first_name AS borrower_firstname, user.last_name AS borrower_lastname  
                FROM rental_schedule 
                LEFT JOIN user ON user.user_id = rental_schedule.borrower_id
                LEFT JOIN item ON item.item_id = rental_schedule.item_id
                WHERE rental_schedule.borrower_id = :logged_user_id 
                   OR rental_schedule.lender_id = :logged_user_id
                ORDER BY rental_schedule.schedule_id DESC;";;

        //     CASE rental_schedule.status
        //     WHEN 'pending' THEN 1
        //     WHEN 'rented' THEN 2
        //     WHEN 'finished' THEN 3
        //     WHEN 'overdue' THEN 4
        //     WHEN 'canceled' THEN 5
        //     ELSE 6
        // END

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':logged_user_id', $this->logged_user_id);

        if ($query->execute()) {
            $data = $query->fetchAll(); // Optional: Fetch as associative array
        } else {
            $data = []; // Return an empty array if no records found or if execution fails
        }

        return $data;
    }
    function show_all_schedules()
    {
        $sql = "SELECT rental_schedule.*, item.*, user.*, user.first_name AS borrower_firstname, user.last_name AS borrower_lastname  
                FROM rental_schedule 
                LEFT JOIN user ON user.user_id = rental_schedule.borrower_id
                LEFT JOIN item ON item.item_id = rental_schedule.item_id
 
                ORDER BY 
                    CASE rental_schedule.status
                        WHEN 'pending' THEN 1
                        WHEN 'rented' THEN 2
                        WHEN 'finished' THEN 3
                        WHEN 'overdue' THEN 4
                        WHEN 'canceled' THEN 5
                        ELSE 6
                    END;";

        $query = $this->db->connect()->prepare($sql);

        if ($query->execute()) {
            $data = $query->fetchAll(); // Optional: Fetch as associative array
        } else {
            $data = []; // Return an empty array if no records found or if execution fails
        }

        return $data;
    }



    function show_schedules()
    {
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

    function show_email()
    {
        $sql = "SELECT * FROM schedule WHERE email = :email";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);

        if ($query->execute()) {
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }


    function update_status()
    {
        $sql = "update rental_schedule
        SET status = :status
        where schedule_id = :id
        ";


        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':status', $this->status);
        $query->bindParam(':id', $this->id);


        if ($query->execute()) {
            return true;
        } else {
            return false;
        }

        return $data;
    }

    function get_schedule_by_id()
    {
        $sql = "SELECT rental_schedule.*, item.*, user.*
                FROM rental_schedule
                LEFT JOIN user ON user.user_id = rental_schedule.borrower_id
                LEFT JOIN item ON item.item_id = rental_schedule.item_id
                WHERE rental_schedule.schedule_id = :schedule_id;";

        $query = $this->db->connect()->prepare($sql);

        // Bind the parameter securely
        $query->bindParam(':schedule_id', $this->id, PDO::PARAM_INT);

        // Execute and handle the result
        if ($query->execute()) {
            $data = $query->fetch(PDO::FETCH_ASSOC); // Fetch as associative array for a single result
        } else {
            $data = null; // Return null if the query fails
        }

        return $data;
    }

    function countRentedSchedules($user_id = null)
    {
        // Base SQL query with the status condition for rented
        $sql = "SELECT COUNT(*) FROM rental_schedule WHERE status = 'rented'";

        // Add a WHERE clause for the user_id if provided
        if ($user_id) {
            $sql .= " AND owner_id = :id";
        }

        // Prepare the query
        $query = $this->db->connect()->prepare($sql);

        // Bind the parameter if user_id is provided
        if ($user_id) {
            $query->bindParam(':id', $user_id);
        }

        // Execute and fetch the result
        $query->execute();
        $count = $query->fetchColumn(); // Fetch the count result

        // Return the count
        return $count;
    }
    function countPendingSchedules($user_id = null)
    {
        // Base SQL query with the status condition for pending
        $sql = "SELECT COUNT(*) FROM rental_schedule WHERE status = 'pending'";

        // Add a WHERE clause for the user_id if provided
        if ($user_id) {
            $sql .= " AND owner_id = :id";
        }

        // Prepare the query
        $query = $this->db->connect()->prepare($sql);

        // Bind the parameter if user_id is provided
        if ($user_id) {
            $query->bindParam(':id', $user_id);
        }

        // Execute and fetch the result
        $query->execute();
        $count = $query->fetchColumn(); // Fetch the count result

        // Return the count
        return $count;
    }
    function countRentedItems($user_id = null)
    {
        // Base SQL query with the status condition for rented
        $sql = "SELECT COUNT(*) FROM item WHERE status = 'rented'";

        // Add a WHERE clause for the user_id if provided
        if ($user_id) {
            $sql .= " AND owner_id = :id";
        }

        // Prepare the query
        $query = $this->db->connect()->prepare($sql);

        // Bind the parameter if user_id is provided
        if ($user_id) {
            $query->bindParam(':id', $user_id);
        }

        // Execute and fetch the result
        $query->execute();
        $count = $query->fetchColumn(); // Fetch the count result

        // Return the count
        return $count;
    }

    function countFinishedSchedules($user_id = null)
    {
        // Base SQL query with the status condition for finished
        $sql = "SELECT COUNT(*) FROM rental_schedule WHERE status = 'finished'";

        // Add a WHERE clause for the user_id if provided
        if ($user_id) {
            $sql .= " AND user_id = :id";
        }

        // Prepare the query
        $query = $this->db->connect()->prepare($sql);

        // Bind the parameter if user_id is provided
        if ($user_id) {
            $query->bindParam(':id', $user_id);
        }

        // Execute and fetch the result
        $query->execute();
        $count = $query->fetchColumn(); // Fetch the count result

        // Return the count
        return $count;
    }

    function countOverdueSchedules()
    {
        // Base SQL query with the status condition for rented
        $sql = "SELECT COUNT(*) FROM rental_schedule WHERE status = 'overdue'";


        // Prepare the query
        $query = $this->db->connect()->prepare($sql);


        // Execute and fetch the result
        $query->execute();
        $count = $query->fetchColumn(); // Fetch the count result

        // Return the count
        return $count;
    }
}
