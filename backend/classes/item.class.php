<?php

require_once 'database.php';

class Item
{
    //attributes

    public $id;
    public $name;
    public $type;
    public $size;
    public $deposit_cost;
    public $rental_cost;
    public $quantity;
    public $owner;
    public $photo;
    public $description;
    public $status;
    public $owner_id;





    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods
    function add_item()
    {
        $sql = "INSERT INTO item (name, type, size, deposit_cost, rental_cost, description,  owner_id, photo) 
                VALUES (:name, :type, :size, :deposit_cost, :rental_cost, :description,  :owner_id, :photo)";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':size', $this->size);
        $query->bindParam(':deposit_cost', $this->deposit_cost);
        $query->bindParam(':rental_cost', $this->rental_cost);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':owner_id', $this->owner_id);
        $query->bindParam(':photo', $this->photo);

        return $query->execute();
    }

    function show($user_id = null)
    {
        // Base SQL query
        $sql = "SELECT * FROM item";

        // Add a WHERE clause if user_id is provided
        if ($user_id) {
            $sql .= " WHERE owner_id = :id";
        }

        // Prepare the query
        $query = $this->db->connect()->prepare($sql);

        // Bind the parameter if user_id is provided
        if ($user_id) {
            $query->bindParam(':id', $user_id);
        }

        // Execute and fetch data
        if ($query->execute()) {
            $data = $query->fetchAll();
        }

        // Return the data
        return $data;
    }

    function countInStock($user_id = null)
    {
        // Base SQL query with the in_stock condition
        $sql = "SELECT COUNT(*) FROM item WHERE in_stock = 1";

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

    function show_items()
    {
        $sql = "SELECT * FROM item 
        ORDER BY name ASC;";
        $query =  $this->db->connect()->prepare($sql);

        if ($query->execute()) {
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show_name()
    {
        $sql = "SELECT * FROM item WHERE name = :name";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':name', $this->name);

        if ($query->execute()) {
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }

    function search($query, $user_id)
    {
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

    function search_item()
    {
        $sql = "SELECT item.*, user.* 
        FROM item 
        JOIN user ON item.owner_id = user.user_id
        WHERE item.item_id = :item_id";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_id', $this->id);



        if ($query->execute()) {
            return $query = $query->fetchAll();
        } else {
            return [];
        }
    }

    function update_item()
    {
        // SQL query to update the item
        $sql = "UPDATE item 
                SET name = :name, type = :type, photo = :photo, description = :description, deposit_cost = :deposit_cost, rental_cost = :rental_cost
                WHERE item_id = :id ;";

        // Prepare the query
        $query = $this->db->connect()->prepare($sql);

        // Bind parameters
        $query->bindParam(':name', $this->name);
        $query->bindParam(':type', $this->type);
        $query->bindParam(':photo', $this->photo);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':deposit_cost', $this->deposit_cost);
        $query->bindParam(':rental_cost', $this->rental_cost);
        $query->bindParam(':id', $this->id);

        // Execute and return the result
        return $query->execute();
    }


    function delete_item()
    {
        $sql = "UPDATE item 
        SET is_active = false
        WHERE item_id = :item_id LIMIT 1";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_id', $this->id);

        return $query->execute();
    }

    function update_item_status($value)
    {
        $sql = "UPDATE item 
        SET in_stock = :value
        WHERE item_id = :item_id;";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_id', $this->id);
        $query->bindParam(':value', $value);


        return $query->execute();
    }

    // Function to get the item cost
    public function get_item_cost()
    {
        // SQL query to get the cost for the item based on its ID
        $sql = "SELECT rental_cost FROM item WHERE item_id = :id LIMIT 1";

        // Prepare and execute the query
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);

        // Execute the query
        if ($query->execute()) {
            // Fetch the result
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Return the cost per day if available
            if ($result) {
                return $result['rental_cost'];
            } else {
                // If item not found, return 0 or handle it as needed
                return 0;
            }
        } else {
            // If the query fails, handle the error (e.g., return 0)
            return 0;
        }
    }
    public function get_deposit_cost()
    {
        // SQL query to get the cost for the item based on its ID
        $sql = "SELECT deposit_cost FROM item WHERE item_id = :id LIMIT 1";

        // Prepare and execute the query
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $this->id);

        // Execute the query
        if ($query->execute()) {
            // Fetch the result
            $result = $query->fetch(PDO::FETCH_ASSOC);

            // Return the cost per day if available
            if ($result) {
                return $result['deposit_cost'];
            } else {
                // If item not found, return 0 or handle it as needed
                return 0;
            }
        } else {
            // If the query fails, handle the error (e.g., return 0)
            return 0;
        }
    }

    function select_item_by_id()
    {
        $sql = "SELECT * FROM item
        WHERE item.item_id = :item_id";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':item_id', $this->id);

        if ($query->execute()) {
            return $query = $query->fetch();
        } else {
            return [];
        }
    }
}
