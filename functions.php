<?php 

function open_conn(config[]){}

function write_files($folder,$file_content){

	//open folder for writing
	var file = new File($folder);
	file.write($file_content);
	file.close();         
}


//store json files
function get_tbls($conn){}

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




//read json files
function get_tbl_list_json($tbls_url){}

function get_tbl_indx_json($tbl_indx_url){}

function get_tbl_rec_json($rec_url){}

function store_json_to_db($json){}


?>
