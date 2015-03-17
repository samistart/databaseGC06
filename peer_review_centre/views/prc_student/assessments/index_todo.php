<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../../includes/initialise_student.php');
  //require_once("../../../controllers/prc_student/assessments_todo.php");
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get assessments the student's group needs to do
  $assessmentsToDo = Assessment::findByGroupID("$currentStudent->groupID");

?>
<?php echo $session->message; ?>

<!-- Display all reports to assess. -->
<div id="assessments">
  <legend>
    <h3>Reports to assess</h3>
  </legend>
  <table class="table table-striped table-hover">
    <thead>
      <th style="width:40%;">Title </th>
      <th style="width:10%;">Action </th>
      <th style="width:40%;">Progress </th>
    </thead>
    <!-- Display message if there are no reports to assess. -->
    <?php if(empty($assessmentsToDo)) {echo "No reports to assess.";} ?>
    <tbody>
    <?php foreach($assessmentsToDo as $assessment): ?>
      <tr>
        <td>
          <?php $report = Report::findByID($assessment->reportID); 
                echo $report->title; ?>
        </td>
        <td>
          <a href="<?php echo WEB_ROOT; ?>views/prc_student/assessments/assess.php?assessmentID=<?php echo $assessment->assessmentID; ?>">Assess</a>
        </td>
        <td>
          <?php echo 'We could count how many criteria have been commented and graded to show progress.' ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
