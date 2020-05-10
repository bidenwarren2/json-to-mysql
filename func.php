<?php

function json_validate($string)
{
    // decode the JSON data
    $result = json_decode($string);

    // switch and check possible JSON errors
    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            $error = ''; // JSON is valid // No error has occurred
            break;
        case JSON_ERROR_DEPTH:
            $error = 'The maximum stack depth has been exceeded.';
            break;
        case JSON_ERROR_STATE_MISMATCH:
            $error = 'Invalid or malformed JSON.';
            break;
        case JSON_ERROR_CTRL_CHAR:
            $error = 'Control character error, possibly incorrectly encoded.';
            break;
        case JSON_ERROR_SYNTAX:
            $error = 'Syntax error, malformed JSON.';
            break;
        // PHP >= 5.3.3
        case JSON_ERROR_UTF8:
            $error = 'Malformed UTF-8 characters, possibly incorrectly encoded.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_RECURSION:
            $error = 'One or more recursive references in the value to be encoded.';
            break;
        // PHP >= 5.5.0
        case JSON_ERROR_INF_OR_NAN:
            $error = 'One or more NAN or INF values in the value to be encoded.';
            break;
        case JSON_ERROR_UNSUPPORTED_TYPE:
            $error = 'A value of a type that cannot be encoded was given.';
            break;
        default:
            $error = 'Unknown JSON error occured.';
            break;
    }

    if ($error !== '') {
        // throw the Exception or exit // or whatever :)
        exit($error);
    }

    // everything is OK
    return $result;
}



//core sql functions
function open_conn($config){

        $host = $config["DATABASE_HOST"];
        $user = $config["DATABASE_USER"];
        $pass = $config["DATABASE_PASS"];
        $db   = $config["DATABASE_NAME"];

        // Create connection
        $conn = new mysqli($host, $user, $pass,$db);

        // Check connection
        if ($conn->connect_error) {
            echo("Connection failed: " . $conn->connect_error);
            return null;
        }
        echo "Connected successfully";
        return $conn;

}

function get_rs($sql,$conn){

        
        // Check connection
        if (!$conn) {
            echo("Connection failed: " . $conn->connect_error);
            return null
        }

        //retrieve data                  
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           echo $result->num_rows."records found"; 
           return $result;     
        } else {
           return null; 
        }
        $conn->close();

}

function execute($sql){

        // Check connection
        if ($conn->connect_error) {
            echo("Connection failed: " . $conn->connect_error);
            return null
        }
        
        //execute scalar function
        if ($conn->query($sql) === TRUE) {
            echo "SQL DDL executed successfully";
            return true;
        } else {
            echo "Error executing DDL: " . $conn->error;
            return false;
        }

}



//file management
function write_content($file_uri,$file_content){
	//open file for writing
	if(file_exists){
	   file_put_contents($file_uri,$file_content);
	}	
}

function read_content($file_uri,$file_content){
	//open file for reading
	if(file_exists){
           return file_get_contents($file_uri);
        }   
}


//json records
//for each table
//get table and records
//for each table
//write id,json,hash
//write json
//add to table index
//write index to file
//write to index list
//for each table
//
function get_tbls($conn){
         
          
}

function write_tbls_2_json($folder,$conn){

	 //get the list of tables
	 var $tbls = get_rs("SHOW TABLES");
	 var $tbls_list = "";
	
	 //write each table to json
         while($tbls){
		$tbl = $tbls->field("tblname");
		$rst = "select * from ".$tbl;
		if(write_tbl_recs_2_json($folder,$rst)){
			$tbls_list = $tbls_list & "," & $tbl
                } 
		$tbls->movenext();
	 } 
	 	
	 //write index to list
	 write_tbls_list_2_json($folder,$tbls_list);
}

function write_tbls_list_2_json($folder,$conn,$tbls){
	 
	//create json string
	var $json_array = split($tbls,","); 
	var $json = json_encode($json_array);
	write_files($json);
}

function write_tbl_recs_2_json($folder,$rst){
	 
	 //loop and write each record	
}

function write_tbl_indx_2_json($folder,$tbl){} 




//json functions
function get_tbl_list_json($tbls_url){}

function get_tbl_indx_json($tbl_indx_url){}

function read_rec_json($sql,$conn){
         $rs = get_rs($sql,$conn);
while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
                   printf ("ID: %s  Name: %s", $row[0], $row["name"]);
}
}

function write_rec_json($json,$tbl){

         //insert json
         $rec = json_decode($json, true);
         
         $columns = implode(", ",array_keys($insData));
         $escaped_values = array_map('mysql_real_escape_string', array_values($insData));
         $values  = implode(", ", $escaped_values);
         
         $sql = "INSERT INTO $tbl ($columns) VALUES ($values)";
         if(!execute($sql)){
             echo "error inserting $json";   
         }
}


class stack {
    protected $stack;
    protected $limit;

    public function __construct($limit = 10, $initial = array()) {

        $this->stack = $initial; // initialize the stack
        $this->limit = $limit; // stack can only contain this many items
    }

    public function push($item) {

        if (count($this->stack) < $this->limit) {

            array_unshift($this->stack, $item); // prepend item to the start of the array

        } else {
            echo "Stack is full";
        }

    }

    public function pop() {
        if ($this->isEmpty()) {
            echo "Stack is empty";
        } else {
            return array_shift($this->stack); // pop item from the start of the array
        }
    }

    public function top() {
        return current($this->stack);
    }

    public function isEmpty() {

        return empty($this->stack);
    }

}


/**
* This is a class for creating the binary nodes
*/
class BinaryNode {
        
        public $data;
        public $left;
        public $right;
        
        public function __construct(string $data = NULL) {
                $this->data = $data;
                $this->left = NULL;
                $this->right = NULL;
        }
        
        
        /**
        * Adds child nodes
        */
        public function addChildren($left, $right) {
                $this->left = $left;
                $this->right = $right;
        }
}


/**
* Class for creating the binary tree
*/
class BinaryTree {
        
        private $root = null;
        
        public function __construct() {
                $this->root = null;
        }


        /**
        * Method to check if the tree is empty
        */
        public function isEmpty() {
                return $this->root === null;
        }
        
        /**
        * Method to insert elements in to the binary tree
        */
        public function insert($data) {
                $node = new BinaryNode($data);
                if ($this->isEmpty()) { // this is the root node
                        $this->root = $node;
                        return true;
                } else {
                        return $this->insertNode($node, $this->root);
                }
        }
        
        /**
        * Method to recursively add nodes to the binary tree
        */
        private function insertNode($node, $current) {
                $added = false;
        
                while($added === false) {
                        if ($node->data < $current->data) {
                                if($current->left === null) {
                                        $current->addChildren($node, $current->right);
                                        $added = $node;
                                        break;
                                } else {
                                        $current = $current->left;
                                        return $this->insertNode($node, $current);
                                }
                        }elseif ($node->data > $current->data) {
                                if($current->right === null) {
                                        $current->addChildren($current->left, $node);
                                        $added = $node;
                                        break;
                                } else {
                                        $current = $current->right;
                                        return $this->insertNode($node, $current);
                                }
                        } else {
                                break;
                        }
                }
                return $added;
         }
        
        
        /**
        * Method to retrieve a node from the binary tree
        */
        public function retrieve($node) {
                if ($this->isEmpty()) {
                        return false;
                }
                $current = $this->root;
                if ($node->data === $this->root->data) {
                        return true;
                } else {
                        return $this->retrieveNode($node, $current);
                }
        }
        
        /**
        * Method to recursively add nodes to a binary tree
        */
        private function retrieveNode($node, $current) {
                $exists = false;
                while($exists === false) {
                        if ($node->data < $current->data) {
                                if ($current->left === null) {  break;      }
                                elseif($node->data == $current->left->data) {
                                        $exists = $current->left;
                                        break;
                                } else {
                                        $current = $current->left;
                                        return $this->retrieveNode($node, $current);
                                }
                        }elseif ($node->data > $current->data) {
                                if ($current->right === null) {
                                        break;
                                }
                                elseif($node->data == $current->right->data) {
                                        $exists = $current->right;
                                        break;
                                } else {
                                        $current = $current->right;
                                        return $this->retrieveNode($node, $current);
                                }
                        }
                }
                return $exists;
         }        
 
        /**
        * Method to remove an element from the binary tree
        */
        public function removeElement($elem) {
                
                if ($this->isEmpty()) { return false;   }
                
                $node = $this->retrieve($elem);
                if (!$node) {  return false;        }
                
                if ($elem->data === $this->root->data) {
                        // find the largest value in the left sub tree
                        $current = $this->root->left;
                        while($current->right != null) {
                                $current = $current->right;
                                continue;
                        }
                
                        // set this node to be the root
                        $current->left = $this->root->left;
                        $current->right = $this->root->right;

                        //Find the parent for the node and set it as the parent for any //children the node may have had
                        $parent = $this->findParent($current, $this->root);
                        $parent->right = $current->left;

                        //finally set that node as the new root for the binary tree
                        $this->root = $current;
                        return true;
                }   
         }    
         
        /**
        * Method to remove an element from the binary tree
        */
        public function removeElement($elem) {
                
                if ($this->isEmpty()) { return false;  }
                $node = $this->retrieve($elem);
                
                if (!$node) {     return false;      }
                
                // case two we are removing a leaf node
                if ($node->left === null and $node->right === null) {
                        $parent = $this->findParent($node, $this->root);
                        if ($parent->left->data && $node->data === $parent->left->data) {
                                $parent->left = null;
                                return true;
                        }
                        elseif ($parent->right->data && $node->data === $parent->right->data) {
                                $parent->right = null;
                                return true;
                        }
              }
         }              
         
         
        private function findParent($child, $current) {
                $parent = false;
                while ($parent === false) {
                        if ($child->data < $current->data) {
                                if ($child->data === $current->left->data) {
                                        $parent = $current;
                                        break;
                                } else {
                                        return $this->findParent($child, $current->left);
                                        break;
                                }
                        }
                        elseif ($child->data > $current->data) {
                                if ($child->data === $current->right->data) {
                                        $parent = $current;
                                        break;
                                } else {
                                        return $this->findParent($child, $current->right);
                                        break;
                                }
                        } else {
                                break;
                        }
                }
                return $parent;
        }         
         
}                

?>
