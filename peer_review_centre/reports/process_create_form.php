<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

echo "about to include stuff<br>";

include 'report.php';

echo "successfully included report<br>";



function getReport(){
	$report=array();
	//take the value from the $_POST hash map and save it to $user 
	//using the same key of 'fname'
	$report["title"]=$_POST["title"];
	$report["abstract"]=$_POST["abstract"];
	$report["content"]=$_POST["content"];
	return $report;
}

echo "about to do constructor<br>";
$newReport = new Report($_POST["title"], $_POST["abstract"], $_POST["content"]);
echo "created a new report with constructor and will va_dump the new report on the next line<br>";
var_dump($newReport);

//create an insert query to send to mySQL and check that it isn't null
if (($query = $newReport->createInsertQuery()) != null){
	//include this file which connects to db and has $conn var
	include '../connect_to_db.php';
	echo "successfully included connectToDb<br>";
	$result = $conn->query($query);
	echo "query sent to database";
	//$row = mysql_fetch_array($result);
	//print_r($row);
}
?>