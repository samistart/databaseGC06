<?php
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<div class="container">
<?php 
    if (!$myReport) {
      echo "Your group hasn't created a report yet: <a href='submit.php'>Create report</a>";
    } else { ?>
  <legend>
    <ul class='nav nav-pills'>
      <li>Last edited: <?php echo $myReport->lastEdited; ?></li>
      <li><a href='submit.php'>Edit Report</a></li>
    </ul>
  </legend>
  <h2><?php echo $myReport->title; ?></h2>
  <p class="lead"><?php echo $myReport->abstract; ?></p>
  <p><?php echo $myReport->content; ?></p>
  <?php
    }
  ?>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
