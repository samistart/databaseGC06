<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../includes/initialise_student.php');

  //Don't check for login because that would be silly for a login page
  if($session->isLoggedIn()) {
    //var_dump($_SESSION);
    redirectTo("views/prc_student/students/index.php");
  }
  // // Remember to give your form's submit tag a name="submit" attribute!
  if (isset($_POST['email']) & isset($_POST['password'])) { // Form has been submitted.
    
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    //Check for valid email
    if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
      // Check database to see if studentname/password exist.
      $foundStudent = Student::authenticate($email, $password);
      if ($foundStudent) {
        //$studentSession is an object that is constructed at the end
        //of the student_session include
        $session->login($foundStudent, false);
        redirectTo("views/prc_student/students/index.php");
      } else {
        $session->message("Incorrect email or password");
        redirectTo("views/prc_student/students/login.php");
      }
    
    } else { // Form has not been submitted.
      echo "That's not a valid email address.";
    }
  } else {
    echo "Email or password cannot be blank.";
  }
?>
