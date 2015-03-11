<?php
//Author Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../includes/initialise_student.php");

if($studentSession->isLoggedIn()) {
  //var_dump($_SESSION);
  header("Location: ../view/unfinished_page.php");
  exit();
}

// // Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['email'])&isset($_POST['password'])) { // Form has been submitted.
  
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  //Check for valid email
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    // Check database to see if studentname/password exist.
    $foundStudent = Student::authenticate($email, $password);

    if ($foundStudent) {
      //$studentSession is an object that is constructed at the end
      //of the student_session include
      $studentSession->login($foundStudent);
      header("Location: ../view/index_student.php");
      exit();
    }
    else{
      echo "Email/password combination incorrect.";
    }
  
  } else { // Form has not been submitted.
    echo "That's not a valid email address.";
  }
} else{
  echo "Email or password cannot be blank.";
}
?>