<?php
  // Initialise student files and verify whether a student user is logged in.
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  // Get an object containing the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<div class="container">
  <!-- Display message if no report exists yet -->
  <?php 
      if (empty($myReport->title) && empty($myReport->abstract) && empty($myReport->content)) {
        echo "Your group hasn't created a report yet: <a href='submit.php'>Create report</a>";
      } else {
  ?>

  <!-- If a report exists, display the following -->
  <legend>
    <ul class='nav nav-pills'>
      <li>Last edited: <?php echo $myReport->lastEdited; ?></li>
      <li><a href='submit.php'>Edit Report</a></li>
    </ul>
  </legend>

  <!-- Display possible success message in green box -->
  <?php if (($session->message)) {greenBox($session->message);} ?>
  <!-- Display possible error message in red box -->
  <?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

  <!-- Display report -->
  <div class="panel panel-default">
    <div class="panel-body">
      <p><h2><?php echo $myReport->title; ?></h2></p>
      <br>
      <p><i><?php echo $myReport->abstract; ?></i></p>
      <br>
      <p><?php echo $myReport->content; ?></p>
    </div>
  </div>

<?php } ?>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
