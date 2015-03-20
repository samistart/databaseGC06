<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

require_once(SITE_ROOT.DS."includes/initialise_admin.php");

// Get all groups
$groups = Group::findAll();

// Check if form was submitted
if (isset($_POST['submit'])) {
  // Set groupID of the three students to the groupID 
  // specified in POST:
  if ($_POST['assesser'] != 0) {
    $assesserID = $_POST['assesser'];
    $assessee1ID = ($_POST['assessee1']) ? $_POST['assessee1'] : false;
    $assessee2ID = ($_POST['assessee2']) ? $_POST['assessee2'] : false;
    $assessee3ID = ($_POST['assessee3']) ? $_POST['assessee3'] : false;

    if ($assesserID === $assessee1ID || $assesserID === $assessee2ID
       || $assesserID === $assessee3ID) {
      $session->errorMessage('A group cannot assess its own report.');
      redirectTo("views/prc_admin/assessments/assign.php");
    }
    // Check if the assignments made already exist. If they do, then end.
    // If they do not, then create them.
    $error = true;

    if ($assessee1ID) {
      // Sql query to check if assessment already exists:
      $recGroupReport = Report::findByGroupID($assessee1ID);
      $assmt = Assessment::findByGroupAndReportID($assesserID, $recGroupReport->reportID);
      if ($assmt) {
        // Already exists, do nothing.
      } else {
        // Create the assessment
        $assmt = new Assessment($assesserID, $recGroupReport->reportID);
        $result = $assmt->create();
      }
      $error = false; 
    }

    if ($assessee2ID) {
      // Sql query to check if assessment already exists:
      $recGroupReport = Report::findByID($assessee2ID);
      $assmt = Assessment::findByGroupAndReportID($assesserID, $recGroupReport->reportID);
      if ($assmt) {
        // Already exists, do nothing.
      } else {
        // Create the assessment
        $assmt = new Assessment($assesserID, $recGroupReport->reportID);
        $result = $assmt->create();
        $error = false;
      }
    } 

    if ($assessee3ID) {
      // Sql query to check if assessment already exists
      $recGroupReport = Report::findByID($assessee3ID);
      $assmt = Assessment::findByGroupAndReportID($assesserID, $recGroupReport->reportID);
      if ($assmt) {
        // Already exists, do nothing.
      } else {
        // Create the assessment
        $assmt = new Assessment($assesserID, $recGroupReport->reportID);
        $result = $assmt->create();
        $error = false;
      }
    } 

    if ($error) {
      $session->errorMessage('You need to specify at least one receiving group.');
    } else {
      $session->message('Assessment(s) allocated successfully.');
    }

  } else {
    $session->errorMessage('You need to specify the assessing group and at least one assessment-receiving group.');
  }
  redirectTo("views/prc_admin/assessments/assign.php");

} else {
  // Do nothing
}

?>