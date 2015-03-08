<?php
	require_once("../model/student.php");
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	//Sanitize to prevent naughty hackers from putting HTML tags
	//mysql_escape_string is tested here but needs to be replaced with mysqli_real_escape_string(connection,escapestring)
	$firstName = mysql_escape_string(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
	$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


	if ($_POST["password"] == $_POST["confirmPassword"]) {
		//Check if the email is valid using built-in php function    
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  // Create a new Student object from information in the form (groupID = 1 for now)
			    $newStudent = new Student();
			    $newStudent->firstName = $firstName; 
			    $newStudent->lastName = $lastName;
			    $newStudent->email = $email;
			    $newStudent->password = $_POST["password"];
			    $newStudent->groupID = 1;
			    $newStudent->create();

			    echo "Registration successful.";
		}
		else{
			echo "Invalid email format";
		}
	} else {
	    echo "Passwords do not match, please try again.";
	}
?>