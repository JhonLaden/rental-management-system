<?php

require_once 'database.php';

class Users{
    //attributes

    public $id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $username;
    public $password;
    public $type = 'client';


    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_user(){
        $sql = "INSERT INTO user (first_name, middle_name, last_name,  email, username, password, type) VALUE 
        (:first_name, :middle_name, :last_name, :email, :username, :password, :type);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);
        $query->bindParam(':type', $this->type);


        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function show(){
        $sql = "SELECT * FROM user ; ";
        $query =  $this->db->connect()->prepare($sql);
    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show_email(){
        $sql = "SELECT * FROM user WHERE email = :email";
    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':email', $this->email);
    
        if($query->execute()){
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }

    // Function to get user details by ID
    public function get_user_by_id() {
        $sql = "SELECT * FROM user WHERE user_id = :id LIMIT 1";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id, PDO::PARAM_INT);
        $query->execute();

        if ($query->rowCount() > 0) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            return null; // Return null if no user is found
        }
    }

    function update_user() {
        // Base SQL query to update user details
        $sql = "UPDATE user 
                SET first_name = :first_name, 
                    middle_name = :middle_name, 
                    last_name = :last_name, 
                    email = :email, 
                    username = :username";
    
        // Append password update conditionally
        if (!empty($this->password)) {
            $sql .= ", password = :password";
        }
    
        $sql .= " WHERE user_id = :id";
        
        // Prepare the query
        $query = $this->db->connect()->prepare($sql);
    
        // Bind parameters
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        if (!empty($this->password)) {
            $query->bindParam(':password', $this->password);
        }
        $query->bindParam(':id', $this->id);
    
        // Execute and return the result
        return $query->execute();
    }

    function delete_user() {
        $sql = "UPDATE user 
        SET is_active = false
        WHERE user_id = :user_id LIMIT 1";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':user_id', $this->id);
        
        return $query->execute();
    }
    
}

?>