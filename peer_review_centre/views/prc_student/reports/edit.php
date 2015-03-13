<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();
  require_once('../model/report.php');

  //get the current student from the session
  $currentStudent = Student::findByID("$session->userID");
  //get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<form method="POST" action="../controller/update_report.php" name="newReport">
  <label>Title: </label>
  <input type="text" name="title" value="<?php echo $myReport->title; ?>"><br><br>
  <label>Abstract: </label>
  <input type="test" name="abstract" value="<?php echo $myReport->abstract; ?>"><br><br>
  <label>Content: </label>
  <input type="text" name="content" value="<?php echo $myReport->content; ?>"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>
