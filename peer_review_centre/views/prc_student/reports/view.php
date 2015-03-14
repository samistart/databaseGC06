<?php
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");

  if ($myReport) {
    echo "<h3>This is your report. It's really good. You should be a writer.</h3>";
    echo "Last edited: ".$myReport->lastEdited." by ".$currentStudent->fullName().".<br>";
    echo "<a href='submit.php'>Edit Report</a>";
    echo "<h2>$myReport->title</h2>";
    echo "<h3>$myReport->abstract</h3><br><br>";
    echo "<p>$myReport->content</p><br>";
  }
  else {
    echo "Your group hasn't created a report yet: <a href='submit.php'>Create report</a>";
  }
?>
