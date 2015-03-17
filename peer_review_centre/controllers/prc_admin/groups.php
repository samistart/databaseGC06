<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_admin.php");

  // Store current group in an group object.
  $group = Group::findByID($_GET['groupID']);

  // Get array of students in current group.
  $studentsInGroup = Student::findStudentsOn($group->groupID);

  // Get report corresponding to current group.
  $report = Report::findByGroupID($group->groupID);

?>