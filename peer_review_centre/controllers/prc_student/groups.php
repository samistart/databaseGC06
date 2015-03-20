<?php

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_student.php");

  // Take studentID from the current session and create the corresponding student object.
  global $session;
  $studentID = $session->userID;
  $student = Student::findByID($studentID);

  // Returns the students in the same group as current student.
  $members = $student->findTeamMates();

  // Get total average score among all groups
  $totalAverage = Group::groupsAverageGrade();

  // Get group object corresponding to current student, update the rank fields
  // and return the group's rank.
  Group::updateRank();
  $group = Group::findByID($student->groupID);
  $groupRank = $group->ranking;

  // Number of groups in the system.
  $noGroups = Group::noGroups();
  
?>
