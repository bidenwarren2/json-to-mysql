<?php /** @noinspection ALL */
/**
 * Licensed under Creative Commons 3.0 Attribution
 * Copyright Adam Wulf 2013
 */

include("config.php");
include("include.classloader.php");

$classLoader->addToClasspath(ROOT);

$mysql = new MySQLConn(DATABASE_HOST, DATABASE_NAME, DATABASE_USER, DATABASE_PASS);
$db = new JSONtoMYSQL($mysql);

// create some json
$jsondata = file_get_contents('http://ws.meteocontrol.de/api/sites/P9JWT/data/energygeneration?apiKey=xVQfZ7HaA9');

//convert json object to php associative array
$obj = json_decode($jsondata, true);
//$obj = json_decode('{"id":4,"asdf" : "asfd"}');

// save it to a table
$db->save($obj, "brandnewtable");

?>
