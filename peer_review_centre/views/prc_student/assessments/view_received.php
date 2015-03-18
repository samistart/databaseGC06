<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../../includes/initialise_student.php');
  //require_once("../../../controllers/prc_student/assessments_todo.php");
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStu = Student::findByID($session->userID);
  // Get report of current student's group
  $report = Report::findByID($currentStu->groupID);
  // Get assessments of the report
  $receivedAssmts = Assessment::findByReportID($report->reportID);

  if (!empty($receivedAssmts)) {
    $criteria = array($receivedAssmts[0]->criteria1,
      $receivedAssmts[0]->criteria2,
      $receivedAssmts[0]->criteria3);
  } else {
    $criteria = array('Criteria 1', 'Criteria 2', 'Criteria 3');
  }
?>


<!-- Bootstrap table for received assessments (Sami) -->
<div id="assessments">
  <legend>
    <h3>Your report received the following assessments</h3>
  </legend>
  <table class="table table-striped table-hover">
    <thead>
      <th style="width:13%;">From: </th>
      <th style="width:12%;"> </th>
      <th style="width:25%;"><?php echo ucwords ($criteria[0]); ?> </th>
      <th style="width:25%;"><?php echo ucwords ($criteria[1]); ?> </th>
      <th style="width:25%;"><?php echo ucwords ($criteria[2]); ?> </th>
    </thead>
    <tbody>
        <?php foreach($receivedAssmts as $assmt): ?>
    <tr>
      <td rowspan="2">
        <?php echo "Group $assmt->groupID"; ?>
      <td>
        Grades
      </td>
      <td>
        <?php echo $assmt->grade1; ?>
      </td>
      <td>
        <?php echo $assmt->grade2; ?>
      </td>
      <td>
        <?php echo $assmt->grade3; ?>
      </td>
    </tr>
    <tr>
      <td>
        Comments
      </td>
      <td>
        <?php echo $assmt->comment1; ?>
      </td>
      <td>
        <?php echo $assmt->comment2; ?>
      </td>
      <td>
        <?php echo $assmt->comment3; ?>
      </td>
    </tr>
    <?php endforeach; ?> 
    </tbody>
  </table>
<!-- End of received assessments table -->
  <?php if(empty($receivedAssmts)) {echo "No Assessments recieved, yet.";} ?>
</div>
<?php include SITE_ROOT.DS.'layouts/footer.php';?>