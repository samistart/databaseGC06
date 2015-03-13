<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();
?>

<form method="POST" action="../controller/update_report.php" name="newReport">
  <label>Title: </label>
  <input type="text" name="title" value="Test Value"><br><br>
  <label>Abstract: </label>
  <input type="test" name="abstract"><br><br>
  <label>Content: </label>
  <input type="text" name="content"><br><br>
  <input type="submit" name="submit" value="Submit">
</form>
