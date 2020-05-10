<?php


// Read Source JSON file
echo "Read Source JSON file";
$json = file_get_contents('./src_config.json');
print_r($json);

//Decode JSON
$json_data = json_decode($json,true);
if(!json_validate($json_data)){  end();  }
print_r($json_data);

//load source databse information
define("saddress", $json_data["address"]);
echo saddress;

define("sdatabase", $json_data["database"]);
echo sdatabase;

define("suser", $json_data["user"]);
echo suser;

define("spasswd", $json_data["passwd"]);
echo spasswd;

?>
