<?php

//Database related information
//$hostname="127.0.0.1";
//using localhost seemed to work for me but 127.0.0.1 gave an error - maybe a MAMP/WAMP thing?
$hostname="localhost";
//should probably change the username from root to avoid giving too many rights for safety and security
//default user and pass would be 'root' and 'root' by can create new user in phpMyAdmin as in lynda tutorial
//default in WAMP would have no password for root but we're all using MAMP so that's fine
$user="root";
$password="root";
$database = "GC06";

//establish a connection using mysqli extension API method (improved version of mysql)
$conn = new mysqli($hostname, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
	echo "Connection successful<br>";
}

//I've commented out selecting the database as the MYSQL query in report.php createInsertQuery function does this
//$myDB = $conn->select_db("reports");


?>