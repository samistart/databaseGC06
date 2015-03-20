<?php

require_once('../../includes/initialise_student.php');

if($session->isLoggedIn()) {
  $session->errorMessage("You're already logged in. <br>");
  redirectTo("views/prc_student/students/index.php");
}

if (isset($_POST['email']) & isset($_POST['password'])) { // Form has been submitted.
  
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  //Check for valid email
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    // Check database to see if studentname/password exist.
    $foundStudent = Student::authenticate($email, $password);
    if ($foundStudent) {
      $session->login($foundStudent, false);
      redirectTo("views/prc_student/students/index.php");
    } else {
      $session->errorMessage("Incorrect email or password.");
      redirectTo("views/prc_student/students/login.php");
    }
  
  } else { // Form has not been submitted.
    $session->errorMessage("Incorrect email or password.");
    redirectTo("views/prc_student/students/login.php");
  }
} else {
  $session->errorMessage("Email or password cannot be blank.");
  redirectTo("views/prc_student/students/login.php");
}

?>
