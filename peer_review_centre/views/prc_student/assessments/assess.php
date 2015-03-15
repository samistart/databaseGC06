<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_student.php");
  //require_once("../../../controllers/prc_student/assessments_todo.php");
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID("$session->userID");

  $currentAssessmentID = $database->escapeValue((int)trim($_GET['assessmentID']));
  // Get assessments the student's group needs to do
  $assessment = Assessment::findByID($currentAssessmentID);
  if ($assessment->groupID !== $currentStudent->groupID) {
    exit();
  }
  $report = Report::findByID($assessment->reportID);
?>
<p>
<table>
  <tr><td><h2>Report by Group <?php echo $report->groupID; ?></h2></td></tr>
  <tr><td><?php echo $report->title; ?></td></tr>
  <tr><td><?php echo $report->abstract; ?></td></tr>
  <tr><td><?php echo $report->content; ?></td></tr>
</table>
</p>

<hr>

<p>
<form method="POST" action="../../../controllers/prc_student/assessment_todo.php" name="assessment">
  <table border="1">
    <tr>
      <td><b><?php echo $assessment->criteria1; ?></b></td>
      <td><b><?php echo $assessment->criteria2; ?></b></td>
      <td><b><?php echo $assessment->criteria3; ?></b></td>
    </tr>
    <tr>
      <td>
        <label>Grade1</label>
        <input type="text" name="grade1" value="<?php if ( !empty(trim($assessment->grade1))) { echo "$assessment->grade1"; } ?>">
      </td>
      <td>
        <label>Grade2</label>
        <input type="text" name="grade2" value="<?php if ( !empty(trim($assessment->grade2))) { echo "$assessment->grade2"; } ?>">
      </td>
      <td>
        <label>Grade</label>
        <input type="text" name="grade3" value="<?php if ( !empty(trim($assessment->grade3))) { echo "$assessment->grade3"; } ?>">
      </td>
    </tr>
    <tr>
      <td>
        <label>Comment1</label>
        <input type="text" name="comment1" value="<?php if ( !empty(trim($assessment->comment1))) { echo "$assessment->comment1"; } ?>">
      </td>
      <td>
        <label>Comment2</label>
        <input type="text" name="comment2" value="<?php if ( !empty(trim($assessment->comment2))) { echo "$assessment->comment2"; } ?>">
      </td>
      <td>
        <label>Comment3</label>
        <input type="text" name="comment3" value="<?php if ( !empty(trim($assessment->comment3))) { echo "$assessment->comment3"; } ?>">
      <td>
    </table>
    <input type="submit" name="submit" value="Submit">
</form>
<p>


<?php include '../../../layouts/student_footer.php';?>
