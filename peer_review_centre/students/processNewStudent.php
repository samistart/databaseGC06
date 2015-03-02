<?php
	require_once("student.php");
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	if ($_POST["password"] == $_POST["confirmPassword"]) {
	    // Create a new Student object from information in the form (groupID = 1 for now)
	    $newStudent = new Student();
	    $newStudent->firstName = $_POST["firstName"]; 
	    $newStudent->lastName = $_POST["lastName"];
	    $newStudent->email = $_POST["email"];
	    $newStudent->password = $_POST["password"];
	    $newStudent->groupID = 1;
	    $newStudent->create();
	    echo "Registration successful.";
	} else {
	    echo "Passwords do not match, please try again.";
	}
?>