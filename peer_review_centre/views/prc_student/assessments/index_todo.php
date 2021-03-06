<?php
  // Include controller for this view and verify whether a student user is logged in.
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get assessments the student's group needs to do
  $assessmentsToDo = Assessment::findByGroupID("$currentStudent->groupID");

?>

<!-- Display possible success message in green box -->
<?php if (($session->message)) {greenBox($session->message);} ?>
<!-- Display possible error message in red box -->
<?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

<!-- Display all reports to assess. -->
<div id="assessments">
  <legend><h3>Reports to assess</h3></legend>

  <table class="table table-striped table-hover">
    <thead>
      <th class="col-lg-2">Action </th>
      <th class="col-lg-10">Title </th>
    </thead>

    <!-- Display message if there are no reports to assess. -->
    <?php if(empty($assessmentsToDo)) {echo "No reports to assess.";} ?>
    <tbody>
    <?php foreach($assessmentsToDo as $assessment): ?>
      <tr>
        <td>
          <a href="<?php echo WEB_ROOT; ?>views/prc_student/assessments/assess.php?assessmentID=<?php echo $assessment->assessmentID; ?>">Assess</a>
        </td>
        <td>
          <?php $report = Report::findByID($assessment->reportID); 
                echo $report->title; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    
    </tbody>
  </table>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
