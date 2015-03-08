<?php
	require_once("../model/admin.php");
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);



	if ($_POST["password"] == $_POST["confirmPassword"]) {
	    // Create a new Student object from information in the form (groupID = 1 for now)
	    $newAdmin = new Admin();
	    $newAdmin->firstName = $_POST["firstName"]; 
	    $newAdmin->lastName = $_POST["lastName"];
	    $newAdmin->email = $_POST["email"];
	    $newAdmin->password = $_POST["password"];
	    $newAdmin->create();

	 // 	$user = Student::find_by_id(3);
		// $user->password = "12345wxyz";
		// $user->save();
		
		//$user = Student::find_by_id(70);
		//$user->delete();
		//echo $user->firstName . " was deleted";

	    echo "Registration successful.";
	} else {
	    echo "Passwords do not match, please try again.";
	}
?>