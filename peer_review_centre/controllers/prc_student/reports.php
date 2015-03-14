<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../includes/initialise_student.php');
  global $session;

  // Get an object with the current student
  $currentStudent = Student::findByID("$session->userID");
  
  // Get the current student's report by finding it with it's group ID
  $report = Report::findByGroupID("$currentStudent->groupID");

  // If the report exists already, update it's conent, otherwise create a new object
  // to contain it.
  if ($report) {
    $report->title = $_POST["title"];
    $report->abstract = $_POST["abstract"];
    $report->content = $_POST["content"];
    $report->lastEdited = "CURRENT_TIMESTAMP";
    $report->update();
  } else {
    $report = new Report($_POST["title"], $_POST["abstract"], $_POST["content"], $currentStudent->groupID);
    $report->create();
  }

  // Report will be created or updated in the database (as necessary).
  //$report->save();
  
  // Go back to the view report page.
  redirectTo("views/prc_student/reports/view.php");

?>
