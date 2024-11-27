<?php

require_once 'database.php';

class Item{
    //attributes

    public $id;
    public $name;
    public $type;
    public $size;
    public $deposit_cost;
    public $rental_cost;
    public $quantity;
    public $owner;


    protected $db ;

    function __construct(){
        $this->db = new Database();
    }

    //Methods
    function add_item(){
        $sql = "INSERT INTO item (name, type, size,  deposit_cost, rental_cost, quantity, owner_id) VALUE 
        (:name, :type, :size, :deposit_cost, :rental_cost, :quantity, :owner_id);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':size', $this->size);
        $query->bindParam(':deposit_cost', $this->deposit_cost);
        $query->bindParam(':rental_cost', $this->rental_cost);
        $query->bindParam(':quantity', $this->quantity);
        $query->bindParam(':owner_id', $this->owner_id);



        if($query->execute()){
            return true;
        }else{
            false;
        }
    }

    

    function show($user_id){
        $sql = "SELECT * FROM item 
        WHERE owner_id = :id";
        $query =  $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $user_id);

    
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
        
    }

    function show_items(){
        $sql = "SELECT * FROM item 
        ORDER BY name ASC;";
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

    function search($query, $user_id) {
        // Use wildcards for partial matching
        $sql = "SELECT * FROM item 
        WHERE name LIKE :query
        AND owner_id = :user_id
        ORDER BY name ASC;";
    
        $queryStmt = $this->db->connect()->prepare($sql);
        $searchQuery = '%' . $query . '%';
        $queryStmt->bindParam(':query', $searchQuery);
        $queryStmt->bindParam(':user_id', $user_id);

    
        if ($queryStmt->execute()) {
            return $queryStmt->fetchAll(PDO::FETCH_ASSOC); // Fetch results as an associative array
        } else {
            return [];
        }
    }

    function search_item(){
        $sql = "SELECT item.*, user.* 
        FROM item 
        JOIN user ON item.owner_id = user.user_id
        WHERE item.item_id = :item_id";
    
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_id', $this->id);


    
        if($query->execute()){
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }

    function update_item() {
        $sql = "UPDATE item 
                SET name = :name, type = :type, size = :size, 
                    deposit_cost = :deposit_cost, rental_cost = :rental_cost
                WHERE item_id = :id AND owner_id = :owner_id";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':size', $this->size);
        $query->bindParam(':deposit_cost', $this->deposit_cost);
        $query->bindParam(':rental_cost', $this->rental_cost);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':owner_id', $this->owner_id);

        return $query->execute(); // Return the result directly
    }

    function delete_item($item_id) {
        $sql = "DELETE FROM item WHERE item_id = :item_id";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_id', $item_id);
        
        return $query->execute();
    }
    

}

?>