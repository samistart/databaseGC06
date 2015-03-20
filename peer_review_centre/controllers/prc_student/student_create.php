<?php

require_once("../../includes/initialise_student.php");

if ($_POST["password"] == $_POST["confirmPassword"]) {
  // Check if the email is valid   
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    // Sanitizing
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Hash and salt password
    $hashAndSalt = password_hash($_POST["password"], PASSWORD_BCRYPT);  

    // Create a new Student object from information in the form (groupID = 1 for now)
    $newStudent = new Student();
    $newStudent->firstName = $firstName; 
    $newStudent->lastName = $lastName;
    $newStudent->email = $email;
    $newStudent->password = $hashAndSalt;
    $newStudent->groupID = "1";
    $newStudent->create();

    $session->message("Your student account was created successfully.");
    redirectTo("views/prc_student/students/login.php");
  } else {
    $session->errorMessage("Invalid email address.");
    redirectTo("views/prc_student/students/create.php");
  }
} else {
    $session->errorMessage("Passwords do not match.");
    redirectTo("views/prc_student/students/create.php");
}

?>
