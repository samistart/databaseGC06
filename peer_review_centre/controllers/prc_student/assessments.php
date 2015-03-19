<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

require_once(SITE_ROOT.DS."includes/initialise_student.php");
//var_dump($_POST);

// Variable threadID passed in the link from the forum page.
global $session;
$studentID = $session->userID;
$assessment = Assessment::findByID($_POST['assessmentID']);


if (isset($_POST['submit'])) {

  // check that none is empty:
  if ( empty(trim($_POST['grade1'])) || empty(trim($_POST['comment1'])) ||
       empty(trim($_POST['grade2'])) || empty(trim($_POST['comment2'])) ||
       empty(trim($_POST['grade3'])) || empty(trim($_POST['comment3'])) ) {
    $session->errorMessage("There is at least one field missing.");
    // nice to have: be able to keep entered values.
    redirectTo("views/prc_student/assessments/assess.php?assessmentID=".$assessment->assessmentID);
  }
  else {
    $assessment->grade1   = (int) trim($_POST['grade1']);
    $assessment->comment1 = trim($_POST['comment1']);
    $assessment->grade2   = (int) trim($_POST['grade2']);
    $assessment->comment2 = trim($_POST['comment2']);
    $assessment->grade3   = (int) trim($_POST['grade3']);
    $assessment->comment3 = trim($_POST['comment3']);

    if (!$assessment->update()) {
      $session->errorMessage("There was an error that prevented your assessment from being saved.");
      redirectTo("views/prc_student/assessments/assess.php?assessmentID=".$assessment->assessmentID);
    }
  }
}

$session->message("Your assessment has successfully been 
  registered and can be edited until the deadline");

redirectTo("views/prc_student/assessments/index_todo.php");

?>
