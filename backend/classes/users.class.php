<?php

require_once 'database.php';

class Users{
    //attributes

    public $first_name;
    public $middle_name;
    public $last_name;
    public $email;
    public $username;
    public $password;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_user(){
        $sql = "INSERT INTO user (first_name, middle_name, last_name,  email, username, password) VALUE 
        (:first_name, :middle_name, :last_name, :email, :username, :password);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':first_name', $this->first_name);
        $query->bindParam(':middle_name', $this->middle_name);
        $query->bindParam(':last_name', $this->last_name);
        $query->bindParam(':email', $this->email);
        $query->bindParam(':username', $this->username);
        $query->bindParam(':password', $this->password);

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

}

?>