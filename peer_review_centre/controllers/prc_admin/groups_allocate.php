<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_admin.php");

  // Get all students
  $students = Student::findAll();

  // Get all groups
  $groups = Group::findAll();

  //global $session;
  
  //Check if form was submitted
  if(isset($_POST['submit'])) {
    // set groupID of the three students to the groupID 
    // specified in POST:
    if ($_POST['group'] != 0) {
      $newGroupID = $_POST['group'];

      $msg = 'You need to specify at least one student.';
      if ($_POST['student1'] != 0 ) {
        $student = Student::findByID($_POST['student1']);
        $student->groupID = $newGroupID;
        $result1 = $student->update();
        $msg1 = ($result1) ? 'true ' : 'false ';
      }
      if ( ($_POST['student2'] != 0)
        && ($_POST['student2'] !== $_POST['student1']) ) {
        $student = Student::findByID($_POST['student2']);
        $student->groupID = $newGroupID;
        $result2 = $student->update();
        $msg2 = ($result2) ? 'true ' : 'false ';
      }
      if ( ($_POST['student3'] != 0)
        && ($_POST['student3'] !== $_POST['student1'])
        && ($_POST['student3'] !== $_POST['student2']) ) {
        $student = Student::findByID($_POST['student3']);
        $student->groupID = $newGroupID;
        $result3 = $student->update();
        $msg3 = ($result3) ? 'true ' : 'false ';
      }

      if (isset($msg1) || isset($msg2) || isset($msg3)) {
        $msg = 'Allocation result: ';
        $msg .= (isset($msg1)) ? $msg1 : '-'; $msg .= ' , ';
        $msg .= (isset($msg2)) ? $msg2 : '-'; $msg .= ' , ';
        $msg .= (isset($msg3)) ? $msg3 : '-'; $msg .= ' .';
  
      }
      $session->message($msg);
    } else {
      $session->errorMessage('You need to specify the group.');
    }

    redirectTo("views/prc_admin/groups/allocate.php");

  } else {
    //echo 'POST submit NOT set.';
  }

?>
