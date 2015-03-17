<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_admin.php");

  // Get all groups
  $groups = Group::findAll();
  
  //Check if form was submitted
  if(isset($_POST['submit'])) {
    // set groupID of the three students to the groupID 
    // specified in POST:
    if ($_POST['assesser'] != 0) {
      $assesserID = $_POST['assesser'];
      $assassee1ID = ($_POST['assassee1']) ? $_POST['assassee1'] : false;
      $assassee2ID = ($_POST['assassee2']) ? $_POST['assassee2'] : false;

      // check if the assignments made already exist. If they do, then end.
      // If they do not, then create them.
      $msg = 'You need to specify at least receiving group.';

      if ($assassee1ID) {
        // sql query to check if assessment already exists:
        $recGroup = findByID(assassee1ID);
        $assmt = findByGroupAndReportID(assesserID, $recGroup->reportID);
        if $assmt {
          // already exists, do nothing or write a message.
        } else {
          // create the assessment
          $assmt = new Assessment(assesserID, $recGroup->reportID);
          $assmt->save();
          $msg1 = ($assmt) ? 'true ' : 'false ';
        }
      }
      if ($assassee2ID) {
        // sql query to check if assessment already exists:
        $recGroup = findByID(assassee2ID);
        $assmt = findByGroupAndReportID(assesserID, $recGroup->reportID);
        if $assmt {
          // already exists, do nothing or write a message.
        } else {
          // create the assessment
          $assmt = new Assessment(assesserID, $recGroup->reportID);
          $assmt->save();
          $msg2 = ($assmt) ? 'true ' : 'false ';
        }
      }

      if ( isset($msg1) || isset($msg2) ) {
        $msg = 'Assignment result: ';
        $msg .= (isset($msg1)) ? $msg1 : '-'; $msg .= ' , ';
        $msg .= (isset($msg2)) ? $msg2 : '-'; $msg .= ' .';
      }
      $session->message($msg);
    } else {
      $session->message('You need to specify the assessing group and at least one assessment-receiving group.');
    }
    redirectTo("views/prc_admin/assessments/assign.php");

  } else {
    //echo 'POST submit NOT set.';
  }

?>