<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	if ($_POST["password"] == $_POST["confirmPassword"]) {

		include 'student.php';

		// Create a new Student object from information in the form
		$newStudent = new Student($_POST["studentNumber"], $_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

		// Create an insert query to send to mySQL and check that it isn't null
		if (($query = $newStudent->createInsertQuery()) != null){
			include '../connect_to_db.php';
			$result = $conn->query($query);
			$conn->close();
		}
		echo "Registration successful.";

	} else {
		echo "Passwords do not match, please try again.";
	}
?>