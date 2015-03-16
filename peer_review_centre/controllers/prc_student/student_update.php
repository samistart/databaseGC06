<?php
// Author: Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../../includes/initialise_student.php");

if ($_POST["newPassword"] == $_POST["confirmPassword"]) {
    $currentStudent = Student::findByID("$session->userID");
    $email = $currentStudent->email;
    //Use the PHP 5.5 hashing API. To check password use
    // if (password_verify($password, $hashAndSalt)) {
    //   // Verified
    // }

    $foundStudent = Student::authenticate($email, $_POST["oldPassword"]);  

    $foundStudent->password = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
    $foundStudent->update();
    redirectTo("views/prc_student/students/index.php");
} else {
    $session->message("Passwords do not match.");
    redirectTo("views/prc_student/students/create.php");
}

?>
