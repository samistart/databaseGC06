<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

include '../model/report.php';

echo "included report.php<br>";

$newReport = new Report($_POST["title"], $_POST["abstract"], $_POST["content"]);
$newReport->groupID = "1";
$newReport->create();

echo "Great success - it's nice.";


?>