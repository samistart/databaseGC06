<?php
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");

  if ($myReport) {
    echo "<legend><ul class='nav nav-pills'><li>Last edited: ".$myReport->lastEdited."</li>";
    echo "<li><a href='submit.php'>Edit Report</a></li></ul></legend>";
    echo "<h2>$myReport->title</h2>";
    echo "<h4>$myReport->abstract</h4><br><br>";
    echo "<p>$myReport->content</p><br>";
  }
  else {
    echo "Your group hasn't created a report yet: <a href='submit.php'>Create report</a>";
  }
?>

<?php include '../../../layouts/footer.php';?>
