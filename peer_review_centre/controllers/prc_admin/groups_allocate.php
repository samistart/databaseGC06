<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_admin.php");
  InitialiseAdmin::checkLoggedIn();

  // Get all students
  $students = Student::findAll();

  // Get all groups
  $groups = Group::findAll();

  $global = $session;
  
  //Check if form was submitted
  if(isset($_POST['submit'])) {
    // set groupID of the three students to the groupID 
    // specified in POST:

    $session->message("success".$_POST['student1']);

    redirectTo('views/prc_admin_groups_allocate.php');

  } else {
    //echo 'POST submit NOT set.';
  }

?>
