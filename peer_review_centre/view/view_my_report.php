<?php
  require_once('../includes/initialise_student.php');
  require_once('../model/report.php');
  InitialiseStudent::checkLoggedIn();
?>
<html>
<body>

  <h2>This is your report. Isn't it great.</h2>
  <a href='../view/edit_report.php'>Edit Report</a><br>
  <?php
    //get an object of the current student
    $currentStudent = Student::findByID("$session->userID");
    //get the current student's report by finding it with it's group ID
    $myReport = Report::findByGroupID("$currentStudent->groupID");
    var_dump($myReport);
  ?>
</body>

</html>
