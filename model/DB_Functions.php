<?php
require_once ('Item.php');
require_once ('Operation.php');

class DB_Functions {
    
    private $db;
    private $con;

    //put your code here
    // constructor
    function __construct() {
        // connecting to database
        require_once ('DB_Connect.php');
        $this->db = new DB_Connect();
        $this->con = $this->db->connect();
        
         // Change to UTF 8
         //mysqli_set_charset($this->con, "utf8");
    }

    // destructor
    function __destruct() {
        
    }

    public function storeItem($item) {
       
        $name = $item->getName();
        $id = $item->getId();
        $path = $item->getImgPath();
        $date = $item->getDate();
        $loc = $item->getLocation();
        $des = $item->getDes();
        
        $name = mysqli_real_escape_string($this->con, $name);
        $des = mysqli_real_escape_string($this->con, $des);
        
        $sql = "INSERT INTO `item` (`unique_id`, `name`, `imgPath`, `dateFound`, `locationFound`, `description`) 
                VALUES ('$id', '$name', '$path', '$date', '$loc', '$des')";
        
        $result = mysqli_query($this->con, $sql)
            or die('Error: ' . mysqli_error($this->con));
            
        $op = new Operation();    
        // check for successful store
        if ($result) {
            $op -> setResult(true);
            $op -> setMessage("Item was added successfully!");
            return $op;
        } else {
            $op -> setResult(false);
            $op -> setMessage("Item was not added successfully! Fatal error !");
            return $op;
        }
    }
    
    /**
    * Get amount of user's post
    */
    public function getItemsCount() {
        $query = mysqli_query($this->con, "SELECT * FROM item"); 
        $number = mysqli_num_rows($query); 
        return $number;
    }
    
    public function getItems($begin) {
        if ($begin == 0) 
            $query = mysqli_query($this->con, "SELECT * FROM `item` ORDER BY `id` DESC LIMIT 10") or die('Error: ' . mysqli_error($this->con));
        else
            $query = mysqli_query($this->con, "SELECT * FROM `item` ORDER BY `id` DESC LIMIT 10 OFFSET ".$begin."") or die('Error: ' . mysqli_error($this->con));
        $itemsArray = array();
        while ($record = mysqli_fetch_row($query)) {
            $item = new Item();
            $item->setId($record[1]);
            $item->setName($record[2]);        
            $item->setImgPath($record[3]);
            $item->setDate($record[4]);
            $item->setLocation($record[5]);
            $item->setDes($record[6]);
            // push single item into final array
            array_push($itemsArray, $item);
        }   
        return $itemsArray;
    }
    
    
    public function remove($uid) {
        $result = mysqli_query($this->con, "DELETE FROM item WHERE unique_id = '$uid'") or die('Error: ' . mysqli_error($this->con));
        
        $op = new Operation();
        if ($result) {
            $op -> setResult(true);
            $op -> setMessage("Item was removed successfully!");
            return $op;
        } else {
            $op -> setResult(false);
            $op -> setMessage("Item was not removed successfully! Fatal error !");
            return $op;
        }
    }
    
    // Im not sure but it think this is better 
    public function search($choice, $searchTerm) {
        $sql = NULL;
		if ($choice == 1) $sql = "SELECT * FROM Item WHERE name = $searchTerm";
		else if ($choice == 2) $sql = "SELECT * FROM Item WHERE date = $searchTerm";
		else if ($choice == 3) $sql = "SELECT * FROM Item WHERE location = $searchTerm";
		else $sql = "SELECT * FROM Item WHERE name = $searchTerm";
		$result = mysqli_query($this->con, $sql) or die('Error: ' . mysqli_error($this->con));
		$itemArray = array();
		while($row = mysqli_fetch_array($result)){
			$item = new Item();
            $item->setId($row[0]);
            $item->setName($row[1]);        
            $item->setImgPath($row[2]);
            $item->setDate($row[3]);
            $item->setTime($row[4]);
            $item->setLocation($row[5]);
            $item->setDes($row[6]);
			array_push($itemArray, $item);
		}
        return $itemArray;
    }
      
	
    public function updateItem($uid, $content) {
         $result = mysqli_query($this->con, "UPDATE items SET content = '{$content}', updated_at = NOW() WHERE unique_id ='{$uid}'");
        $op = new Operation();
        if ($result) {
            $op -> setResult(true);
            $op -> setMessage("Item was updated successfully!");
            return $op;
        } else {
            $op -> setResult(false);
            $op -> setMessage("Item was not updated successfully! Fatal error !");
            return $op;
        }
    }
	
	public function removeAll() {
		$sql = "TRUNCATE TABLE item";
		$result = mysqli_query($this->con, $sql) or die('Error: ' . mysqli_error($this->con));
        $op = new Operation();
        if ($result) {
            $op -> setResult(true);
            $op -> setMessage("All item was removed successfully!");
            return $op;
        } else {
            $op -> setResult(false);
            $op -> setMessage("All item was not removed successfully! Fatal error !");
            return $op;
        }
	}
	
	public function verifyLogin($username, $password)
	{
		$sql = "SELECT * FROM user WHERE username ='$username' and password ='$password'";;
		$result=mysqli_query($this->con, $sql);
		$count=mysqli_num_rows($result);
        $op = new Operation();
		if($count==1) {
            $op -> setResult(true);
		    return $op;
		} else {
			//echo "Wrong Username or Password";
            $op -> setResult(false);
            $op -> setMessage("Wrong Username or Password");
			return $op;
		}
	}
}

