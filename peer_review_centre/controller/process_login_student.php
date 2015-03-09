<?php
echo "before error reporting <br>";

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../model/student_session.php");
require_once("../model/database.php");
require_once("../model/student.php");

if($session->is_logged_in()) {
  redirect_to("../view/index.php");
}

var_dump($_POST);

// // Remember to give your form's submit tag a name="submit" attribute!
if (isset($_POST['email'])&isset($_POST['password'])) { // Form has been submitted.

  echo "inside isset if statement <br>";
  
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  //Check for valid email
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    // Check database to see if studentname/password exist.
    $found_student = Student::authenticate($email, $password);
echo "<br> var dump of found student: ";
    var_dump($found_student);
  
//     if ($found_student) {
//       $student_session->login($found_student);
//       //redirect_to("../view/index.php");
//     } else {
//       // studentname/password combo was not found in the database
//       $message = "Email/password combination incorrect.";
//     }
//   } else{
//     echo "Not a valid email format. Please try again."
//   }

    if ($found_student) {
      $student_session->login($found_student);
      redirect_to("../view/index_student.php");
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