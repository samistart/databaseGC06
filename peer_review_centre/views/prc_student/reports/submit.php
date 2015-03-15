<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  //get an object of the current student
  $currentStudent = Student::findByID("$session->userID");
  //get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<h2>The time of your latest edit will count as the time of submission.</h2>

<p>
<form class="navbar-form navbar-left" method="POST" action="../../../controllers/prc_student/reports.php" name="newReport">
  <div class="form-group">
    <label>Title: </label><br>
    <input type="text" style="width:100%" maxlength="60" class="form-control" name="title" value="<?php
    if ($myReport) {
      echo "$myReport->title";
    }
    ?>">
  </div><br><br>
  <div class="form-group">
    <label>Abstract: </label><br>
    <input type="textarea" style="width:100%" maxlength="200" class="form-control" name="abstract" value="<?php
    if ($myReport) {
      echo "$myReport->abstract";
    }
    ?>">
  </div><br><br>
  <div class="form-group">
  <label>Content: </label><br>
    <input type="textarea" maxlength="10000" class="form-control" name="content" value="<?php
    if ($myReport) {
      echo "$myReport->content";
    }
    ?>">
  </div><br><br>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<p>
