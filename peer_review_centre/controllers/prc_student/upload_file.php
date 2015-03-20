<?php
  // Initialise student files and verify whether a student user is logged in
  require_once('../../includes/initialise_student.php');
  global $session;

  // Get an object with the current student
  $currentStudent = Student::findByID("$session->userID");
  
  // Get the current student's report by finding it with it's group ID
  $report = Report::findByGroupID("$currentStudent->groupID");

  if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br />";
  } else {
    $string = file_get_contents($_FILES['file']['tmp_name']);

    $xml = simplexml_load_string($string) or die();
    if ($xml) {

      if ($report) {
        $report->title = $xml->title;
        $report->abstract = $xml->abstract;
        $report->content = $xml->content;
        $report->lastEdited = "CURRENT_TIMESTAMP";
        $report->update();
        if(!$report) {
          $session->errorMessage("There was an error updating your report.");
        } else {
          $session->message("Your report was updated successfully.");
        }
      } else {
        $report = new Report($xml->title, $xml->abstract, $xml->content, $currentStudent->groupID);
        $report->create();
        if(!$report) {
          $session->errorMessage("There was an error creating your report.");
        } else {
          $session->message("Your report was created successfully.");
        }
      }
    } else {
      $session->errorMessage("Could not parse your XML file");
    }
  }

  // Go back to the view report page.
  redirectTo("views/prc_student/reports/view.php");

?>
