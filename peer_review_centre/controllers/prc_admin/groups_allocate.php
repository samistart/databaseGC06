<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

require_once(SITE_ROOT.DS."includes/initialise_admin.php");

// Get all students
$students = Student::findAllOrdered();

// Get all groups
$groups = Group::findAll();

//Check if form was submitted
if(isset($_POST['submit'])) {

  // Set groupID of the three students to the groupID 
  // specified in POST:
  if ($_POST['group'] != 0) {
    $newGroupID = $_POST['group'];
    $error = true;

    if ($_POST['student1'] != 0 ) {
      $student = Student::findByID($_POST['student1']);
      $student->groupID = $newGroupID;
      $result1 = $student->update();
      $error = false;
    }

    if ( ($_POST['student2'] != 0)
      && ($_POST['student2'] !== $_POST['student1']) ) {
      $student = Student::findByID($_POST['student2']);
      $student->groupID = $newGroupID;
      $result2 = $student->update();
      $error = false;
    }

    if ( ($_POST['student3'] != 0)
      && ($_POST['student3'] !== $_POST['student1'])
      && ($_POST['student3'] !== $_POST['student2']) ) {
      $student = Student::findByID($_POST['student3']);
      $student->groupID = $newGroupID;
      $result3 = $student->update();
      $error = false;
    }

    if($error) {
      $session->errorMessage('You need to specify at least one student.');
    } else {
      $session->message('Students successfully allocated.');
    }

  } else {
    $session->errorMessage('You need to specify the group.');
  }

  redirectTo("views/prc_admin/groups/allocate.php");

} else {
  // Do nothing.
}

?>
