<?php
  require_once('../../../includes/initialise_student.php');
  require_once('../../../model/report.php');
  InitialiseStudent::checkLoggedIn();

  //get an object of the current student
  $currentStudent = Student::findByID("$session->userID");
  //get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>
<html>
<body>
  <?php 
  if ($myReport) {
    echo "<h2>This is your report. Isn't it great.</h2> ";
    echo "Last edited: " . $myReport->lastEdited . "<a href='../view/edit_report.php'>Edit Report</a>";
  }
  ?><br><br>  
  <?php
    //get an object of the current student
    $currentStudent = Student::findByID("$session->userID");
    //get the current student's report by finding it with it's group ID
    $myReport = Report::findByGroupID("$currentStudent->groupID");
    if ($myReport) {
      var_dump($myReport);
    } else {
      echo "Your group hasn't created a report yet: <a href='create_report.php'>Create report</a>";
    }
  ?>
</body>

</html>
