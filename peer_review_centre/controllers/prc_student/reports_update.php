<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../includes/initialise_student.php');
  global $session;

  //get an object with the current student
  $currentStudent = Student::findByID("$session->userID");
  $newReport = Report::findByGroupID("$currentStudent->groupID");
  //create a report object
  $newReport->title = $_POST["title"];
  $newReport->abstract = $_POST["abstract"];
  $newReport->content = $_POST["content"];
  //use report object to create database entry
  $newReport->update();
  
  redirectTo("views/prc_student/reports/my_report.php");

?>
