<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL | E_STRICT);

	include 'student.php';

	// Create a new Student object from information in the form
	$newStudent = new Student($_POST["studentNumber"], $_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"]);

	echo "created a new student with constructor and will var_dump the Student object on the next line<br><br>";
	var_dump($newStudent);
	echo "<br><br>";

	// Create an insert query to send to mySQL and check that it isn't null
	if (($query = $newStudent->createInsertQuery()) != null){
		include '../connect_to_db.php';
		$result = $conn->query($query);
		$conn->close();
	}

?>