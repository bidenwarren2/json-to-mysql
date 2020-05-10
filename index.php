<?php

//header files
include 'func.php';
include 'load_src_db.php';
include 'load_des_db.php';


//process request write or read
$sconn = open_conn($src_db_config)
if(!$sconn){
        echo "Cannot connect to source database";
}

//create table stack to avoid failure to insert due to relationship constraints
var stack


//open src database conn
//process all tables
//for each table write a json file
//load json file to server




?>
