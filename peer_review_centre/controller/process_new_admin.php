<?php
	require_once("../model/admin.php");
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	//Sanitize to prevent naughty hackers from putting HTML tags
	$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
	$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

	if ($_POST["password"] == $_POST["confirmPassword"]) {
		//Check if the email is valid using built-in php function    
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  // Create a new Admin object from information in the form (groupID = 1 for now)
			    $newAdmin = new Admin();
			    $newAdmin->firstName = $firstName; 
			    $newAdmin->lastName = $lastName;
			    $newAdmin->email = $email;
			    $newAdmin->password = $_POST["password"];
			    $newAdmin->create();

			    echo "Registration successful.";
		}
		else{
			echo "Invalid email format";
		}
	} else {
	    echo "Passwords do not match, please try again.";
	}
?>