<?php

  // Initialise student files and verify whether a student user is logged in
  require_once('../../includes/initialise_student.php');
  global $session;

  // Get an object with the current student
  $currentStudent = Student::findByID("$session->userID");
  
  // Get the current student's report by finding it with it's group ID
  $report = Report::findByGroupID("$currentStudent->groupID");

  // If the report exists already, update it's content, otherwise create a new object
  // to contain it.
  if ($report) {
    $report->title = $_POST["title"];
    $report->abstract = $_POST["abstract"];
    $report->content = $_POST["content"];
    $report->lastEdited = "CURRENT_TIMESTAMP";
    $report->update();
    if(!$report) {
      $session->errorMessage("There was an error updating your report.");
    } else {
      $session->message("Your report was updated successfully.");
    }
  } else {
    $report = new Report($_POST["title"], $_POST["abstract"], $_POST["content"], $currentStudent->groupID);
    $report->create();
    if(!$report) {
      $session->errorMessage("There was an error creating your report.");
    } else {
      $session->message("Your report was created successfully.");
    }
  }

  // Go back to the view report page.
  redirectTo("views/prc_student/reports/view.php");

?>
