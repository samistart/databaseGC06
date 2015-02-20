<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include 'report.php';

echo "included report.php<br>";



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
echo "created a new report with constructor and will var_dump the Report object on the next line<br><br>";
var_dump($newReport);
echo "<br><br>";

//create an insert query to send to mySQL and check that it isn't null
if (($query = $newReport->createInsertQuery()) != null){
	//include this file which connects to db and has $conn var
	include '../connect_to_db.php';
	echo "Included connect_to_db.php<br>";
	$result = $conn->query($query);
	echo "Query sent to database<br>";
	//$row = mysql_fetch_array($result);
	//print_r($row);
	//the connection closes at the end of the script anyway but good practice to close it when you're finished with it
	$conn->close();
	echo "Connection to database closed";
}
?>