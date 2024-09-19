<?php

require_once 'database.php';

class Item{
    //attributes

    public $name;
    public $type;
    public $size;
    public $deposit_cost;
    public $rental_cost;
    public $quantity;

    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_item(){
        $sql = "INSERT INTO item (name, type, size,  deposit_cost, rental_cost, quantity) VALUE 
        (:name, :type, :size, :deposit_cost, :rental_cost, :quantity);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':size', $this->size);
        $query->bindParam(':deposit_cost', $this->deposit_cost);
        $query->bindParam(':rental_cost', $this->rental_cost);
        $query->bindParam(':quantity', $this->quantity);


        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    function show(){
        $sql = "SELECT * FROM item 
        ORDER BY item.name DESC;
        LIMIT 5; ";
        $query =  $this->db->connect()->prepare($sql);
    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
        
    }

    function show_name(){
        $sql = "SELECT * FROM item WHERE name = :name";
    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
    
        if($query->execute()){
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }

}

?>