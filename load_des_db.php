<?php

// Read JSON file
echo "Read destination JSON file";
$json = file_get_contents('./des_config.json');
print_r($json);

//Decode JSON
$json_data = json_decode($json,true);
if(!json_validate($json_data)){  end();  }
print_r($json_data);

//load destination databse information
define("daddress", $json_data["address"]);
echo daddress;

define("ddatabase", $json_data["database"]);
echo ddatabase;

define("duser", $json_data["user"]);
echo duser;

define("dpasswd", $json_data["passwd"]);
echo dpasswd;


?>
