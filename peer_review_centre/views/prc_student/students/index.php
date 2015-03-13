<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();
  echo $session->message;
?>

<h1>Welcome to the home page!</h1>
<h2>I hope you like my minimalist design.</h2>

<?php include '../../../layouts/student_footer.php'; ?>
