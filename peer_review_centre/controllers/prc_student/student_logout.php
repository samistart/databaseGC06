<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  //Can't use initialise student here because it checks for login (Which is what we're changing in this script)
  require_once('../../includes/initialise_student.php');

  $session->logout();
  redirectTo("views/prc_student/students/login.php");

?>