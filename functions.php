<?php 


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

function read_rec_json($rec_url){}

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


?>
