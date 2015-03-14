<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  //get an object of the current student
  $currentStudent = Student::findByID("$session->userID");
  // //get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<h2>The time of your latest edit will count as the time of submission.</h2>

<p>
<form method="POST" action="../../../controllers/prc_student/reports.php" name="newReport">
  <label>Title: </label>
  <input type="text" name="title" value="<?php
    if ($myReport) {
      echo "$myReport->title";
    }
  ?>"><br><br>
  <label>Abstract: </label>
  <input type="test" name="abstract" value="<?php
    if ($myReport) {
      echo "$myReport->abstract";
    }
  ?>"><br><br>
  <label>Content: </label>
  <input type="text" name="content" value="<?php
    if ($myReport) {
      echo "$myReport->content";
    }
  ?>"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>
<p>