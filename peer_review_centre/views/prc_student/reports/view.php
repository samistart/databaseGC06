<?php
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  echo "logged in";

  //get an object of the current student
  $currentStudent = Student::findByID("$session->userID");
  // //get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>
<?php 
  if ($myReport) {
    echo "<h2>This is your report. It's really good. You should be a writer.</h2> ";
    var_dump($myReport);
    echo "Last edited: " . $myReport->lastEdited . "<a href='submit.php'>Edit Report</a>";
  }
  // } else {
  //   echo "Your group hasn't created a report yet: <a href='create.php'>Create report</a>";
  //   var_dump($report);
  // }
?>
