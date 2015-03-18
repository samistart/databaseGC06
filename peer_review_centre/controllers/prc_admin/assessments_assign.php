<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

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

      if ($assesserID === $assessee1ID || $assesserID === $assessee2ID) {
        $session->errorMessage('A group cannot assess its own report.');
        redirectTo("views/prc_admin/assessments/assign.php");
      }
      // Check if the assignments made already exist. If they do, then end.
      // If they do not, then create them.
      $msg = 'You need to specify at least receiving group.';
      $error = false;

      if ($assessee1ID) {
        // Sql query to check if assessment already exists:
        $recGroupReport = Report::findByGroupID($assessee1ID);
        //var_dump($recGroupReport);
        $assmt = Assessment::findByGroupAndReportID($assesserID, $recGroupReport->reportID);
        if ($assmt) {
          // Already exists, do nothing or write a message.
          $msg1 = 'exists already';
        } else {
          // Create the assessment
          $assmt = new Assessment($assesserID, $recGroupReport->reportID);
          $result = $assmt->create();
          $msg1 = ($result) ? 'true ' : 'false ';
        }
      }

      if ($assessee2ID && ($assessee1ID !== $assessee2ID)) {
        // Sql query to check if assessment already exists:
        $recGroupReport = Report::findByID($assessee2ID);
        $assmt = Assessment::findByGroupAndReportID($assesserID, $recGroupReport->reportID);
        if ($assmt) {
          // Already exists, do nothing or write a message.
          $msg2 = 'exists already';
        } else {
          // Create the assessment
          $assmt = new Assessment($assesserID, $recGroupReport->reportID);
          $result = $assmt->create();
          $msg2 = ($result) ? 'true ' : 'false ';
        }
      } else {
        $msg2 = 'Receiving group IDs were identical.';
      }

      if ( isset($msg1) || isset($msg2) ) {
        $msg = 'Assignment result: ';
        $msg .= (isset($msg1)) ? $msg1 : '-'; $msg .= ' , ';
        $msg .= (isset($msg2)) ? $msg2 : '-'; $msg .= ' .';
      }

      if ($error) {
        $session->errorMessage($msg);
      } else {
        $session->message($msg);
      }

    } else {
      $session->errorMessage('You need to specify the assessing group and at least one assessment-receiving group.');
    }
    redirectTo("views/prc_admin/assessments/assign.php");

  } else {
    //echo 'POST submit NOT set.';
  }

?>