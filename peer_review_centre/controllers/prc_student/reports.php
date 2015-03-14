<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../includes/initialise_student.php');
  global $session;
  
  //get an object with the current student
  $currentStudent = Student::findByID("$session->userID");

  //create a report object
  $myReport = new Report;

  //retrieve existing record if there is one
  if (Report::findByGroupID("$currentStudent->groupID")) {
    $myReport = Report::findByGroupID("$currentStudent->groupID");
    $myReport->title = $_POST["title"];
    $myReport->abstract = $_POST["abstract"];
    $myReport->content = $_POST["content"];
    $myReport->groupID = "$currentStudent->groupID";
    $myReport->update();
  }
  else{
    $myReport->title = $_POST["title"];
    $myReport->abstract = $_POST["abstract"];
    $myReport->content = $_POST["content"];
    $myReport->groupID = "$currentStudent->groupID";
    $myReport->create();
  }
  
  redirectTo("views/prc_student/reports/view.php");

?>
