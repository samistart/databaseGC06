<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

  require_once(SITE_ROOT.DS."includes/initialise_student.php");
  //require_once("../../../controllers/prc_student/assessments_todo.php");
  InitialiseStudent::checkLoggedIn();

  // Get an object of the current student
  $currentStudent = Student::findByID($session->userID);

  $currentAssessmentID = $database->escapeValue((int)trim($_GET['assessmentID']));
  // Get assessments the student's group needs to do
  $assessment = Assessment::findByID($currentAssessmentID);
  if ($assessment->groupID !== $currentStudent->groupID) {
    exit();
  }
  $report = Report::findByID($assessment->reportID);
?>

<?php echo $session->message; ?>

<!-- Report to assess -->
<div class="panel panel-default">
  <div class="panel-body">
    <h2><?php echo $report->title; ?></h2>
    <p class="lead"><?php echo $report->abstract; ?></p>
    <p><?php echo $report->content; ?></p>
  </div>
</div>

<!-- Grading -->
<form class="form-vertical" method="POST" action="../../../controllers/prc_student/assessments.php" name="assessment">
  <fieldset>
  <div style="width: 100%;">
    <div style="float: left; width: 30%;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $assessment->criteria1; ?></h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-lg-2 control-label">Grade</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="grade1" value="<?php if ( !empty(trim($assessment->grade1))) { echo "$assessment->grade1"; } ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Comment</label>
            <div class="col-lg-10">
              <textarea type="text" class="form-control" rows="4" maxlength="400" name="comment1"><?php if ( !empty(trim($assessment->comment1))) { echo "$assessment->comment1"; } ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="float: right; width: 30%;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $assessment->criteria2; ?></h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-lg-2 control-label">Grade</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="grade2" value="<?php if ( !empty(trim($assessment->grade2))) { echo "$assessment->grade2"; } ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Comment</label>
            <div class="col-lg-10">
              <textarea type="text" class="form-control" rows="4" maxlength="400" name="comment2"><?php if ( !empty(trim($assessment->comment2))) { echo "$assessment->comment2"; } ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div style="margin: auto; width: 30%;">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title"><?php echo $assessment->criteria3; ?></h3>
        </div>
        <div class="panel-body">
          <div class="form-group">
            <label class="col-lg-2 control-label">Grade</label>
            <div class="col-lg-10">
              <input type="text" class="form-control" name="grade3" value="<?php if ( !empty(trim($assessment->grade3))) { echo "$assessment->grade1"; } ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-2 control-label">Comment</label>
            <div class="col-lg-10">
              <textarea type="text" class="form-control" rows="4" maxlength="400" name="comment3"><?php if ( !empty(trim($assessment->comment3))) { echo "$assessment->comment3"; } ?></textarea>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br style="clear: both;" />
  </div>
    <input type="hidden" name="assessmentID" value="<?php echo $assessment->assessmentID; ?>">
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </fieldset>
</form>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
