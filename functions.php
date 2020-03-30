<?php 

function open_conn(config[]){}

//store json files
function get_tbls($conn){}

function write_tbls_2_json($folder,$conn){

	 //get the list of tables
	 var $tbls = get_rs("SHOW TABLES");
	 var $tbls_list = "";
	
	 //write each table to json
         while($tbls){
		$tbl = $tbls->field("tblname");
		if(write_tbl_recs_2_json($folder,$tbl)){
			$tbls_list = $tbls_list & "," & $tbl
                } 
		$tbls->movenext();
	 } 
	 	
	 //write index to list
	 write_tbls_list_2_json($folder,$tbls_list);
}

function write_tbls_list_2_json($folder,$conn){
	 
}

function write_tbl_recs_2_json($folder,$tbl){}

function write_tbl_indx_2_json($folder,$tbl){} 




//read json files
function get_tbl_list_json($tbls_url){}

function get_tbl_indx_json($tbl_indx_url){}

function get_tbl_rec_json($rec_url){}

function store_json_to_db($json){}


?>
