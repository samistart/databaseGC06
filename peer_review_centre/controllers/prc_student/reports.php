<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../includes/initialise_student.php');
  global $session;
  
  //get an object with the current student
  $currentStudent = Student::findByID("$session->userID");

  //create a report object
  $newReport = new Report($_POST["title"], $_POST["abstract"], $_POST["content"], "$currentStudent->groupID");

  //get the current student's report by finding it with it's group ID
  $oldReport = Report::findByGroupID("$currentStudent->groupID");
  $newReport->setPk($oldReport->getPK());

  
  //use report object to create database entry
  $newReport->save();
  
  redirectTo("views/prc_student/reports/view.php");

?>
