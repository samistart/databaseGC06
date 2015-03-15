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

<div id="">
  <h3>Your report received the following Assessments</h3>
  <table border="1">
    <tr>
      <td colspan="2" rowspan="2"></td>
      <td colspan="3">Criteria</td>
    </tr>
    <tr>
      <th><?php echo $criteria[0]; ?></th>
      <th><?php echo $criteria[1]; ?></th>
      <th><?php echo $criteria[2]; ?></th>
    </tr>
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
  </table>
  <?php if(empty($receivedAssmts)) {echo "No Assessments recieved, yet.";} ?>
</div>