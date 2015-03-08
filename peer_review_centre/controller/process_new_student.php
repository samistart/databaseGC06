<?php
	require_once("../model/student.php");
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	$validEmail = "[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+(?:[A-Z]{2}|com|org|net|edu|gov|mil|biz|info|mobi|name|aero|asia|jobs|museum)\b";


	if ($_POST["password"] == $_POST["confirmPassword"]) {
		//Check if the email is valid using built-in php function    
		if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		  // Create a new Student object from information in the form (groupID = 1 for now)
			    $newStudent = new Student();
			    $newStudent->firstName = $_POST["firstName"]; 
			    $newStudent->lastName = $_POST["lastName"];
			    $newStudent->email = $_POST["email"];
			    $newStudent->password = $_POST["password"];
			    $newStudent->groupID = 1;
			    $newStudent->create();
			    var_dump($newStudent);

			 // 	$user = Student::find_by_id(3);
				// $user->password = "12345wxyz";
				// $user->save();
				
				//$user = Student::find_by_id(70);
				//$user->delete();
				//echo $user->firstName . " was deleted";

			    echo "Registration successful.";
		}
		else{
			echo "Invalid email format";
		}
	} else {
	    echo "Passwords do not match, please try again.";
	}
?>