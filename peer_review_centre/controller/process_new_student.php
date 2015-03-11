<?php
	// Author: Sami Start
	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);
	require_once("../includes/initialise_student.php");

	if ($_POST["password"] == $_POST["confirmPassword"]) {
		//Check if the email is valid using built-in php function    
		if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

			//Sanitize to prevent naughty hackers from putting HTML tags
			//mysql_escape_string is tested here but needs to be replaced with mysqli_real_escape_string(connection,escapestring)
			$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
			$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
			$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
			//Use the PHP 5.5 hashing API. To check password use
			// if (password_verify($password, $hashAndSalt)) {
		 	//   // Verified
			// }
			// See http://stackoverflow.com/questions/14992367/using-php-5-5s-password-hash-and-verify-function-am-i-doing-it-right
			$hashAndSalt = password_hash($_POST["password"], PASSWORD_BCRYPT);	


		  // Create a new Student object from information in the form (groupID = 1 for now)
	    $newStudent = new Student();
	    $newStudent->firstName = $firstName; 
	    $newStudent->lastName = $lastName;
	    $newStudent->email = $email;
	    $newStudent->password = $hashAndSalt;
	    $newStudent->groupID = "1";
	    $newStudent->create();

			header("Location: ../view/login_student.php");
      exit();
		} else {
			echo "Invalid email format";
		}
	} else {
	  echo "Passwords do not match, please try again.";
	}
?>
