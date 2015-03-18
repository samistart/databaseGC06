<?php
// Author: Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../../includes/initialise_student.php");

if (empty($_POST["oldPassword"]) || empty($_POST["newPassword"]) || empty($_POST["confirmPassword"])) {
    $session->errorMessage("Please fill out all fields.");
    redirectTo("views/prc_student/students/update.php");
}

if ($_POST["newPassword"] != $_POST["confirmPassword"]) {
    $session->errorMessage("Passwords do not match.");
    redirectTo("views/prc_student/students/update.php");
}

$currentStudent = Student::findByID("$session->userID");
$email = $currentStudent->email;

$foundStudent = Student::authenticate($email, $_POST["oldPassword"]); 

if ($foundStudent) {
    $foundStudent->password = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
    $foundStudent->update();

    $session->message("Your password was updated successfully.");
    redirectTo("views/prc_student/students/index.php");
} else {
    $session->errorMessage("Incorrect password.");
    redirectTo("views/prc_student/students/update.php"); 
}


?>
