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

<!-- Display possible error message in red box -->
<?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

<!-- Report to assess -->
<div class="panel panel-default">
  <div class="panel-body">
    <p><h2><?php echo $report->title; ?></h2></p>
    <br>
    <p><i><?php echo $report->abstract; ?></i></p>
    <br>
    <p><?php echo $report->content; ?></p>
  </div>
</div>

<!-- Grading -->
<div id="performance" class="panel panel-default">
<div class="panel-body">
  <legend>
    <h3>Report Assessment</h3>
  </legend>
  <form class="form-vertical" method="POST" action="../../../controllers/prc_student/assessments.php" name="assessment">
    <fieldset>
      <!-- Box with 2nd criteria -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $assessment->criteria1; ?></h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-lg-3 control-label">Grade</label>
              <div class="col-lg-10">
                <select class="form-control" id="grade1" name="grade1">
                  <?php for ($x = 1; $x <= 5; $x++) {
                    $sel = ($x == $assessment->grade1) ? 'selected' : '';
                    echo "<option $sel>$x</option>"; } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Comment</label>
              <div class="col-lg-10">
                <textarea type="text" class="form-control" rows="4" maxlength="400" name="comment1"><?php if ( !empty(trim($assessment->comment1))) { echo "$assessment->comment1"; } ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Box with 2nd criteria -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $assessment->criteria2; ?></h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-lg-3 control-label">Grade</label>
              <div class="col-lg-10">
                <select class="form-control" id="grade2" name="grade2">
                  <?php for ($x = 1; $x <= 5; $x++) {
                    $sel = ($x == $assessment->grade2) ? 'selected' : '';
                    echo "<option $sel>$x</option>"; } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Comment</label>
              <div class="col-lg-10">
                <textarea type="text" class="form-control" rows="4" maxlength="400" name="comment2"><?php if ( !empty(trim($assessment->comment2))) { echo "$assessment->comment2"; } ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Box with 3rd criteria -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><?php echo $assessment->criteria3; ?></h3>
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="col-lg-3 control-label">Grade</label>
              <div class="col-lg-10">
                <select class="form-control" id="grade3" name="grade3">
                  <?php for ($x = 1; $x <= 5; $x++) {
                    $sel = ($x == $assessment->grade3) ? 'selected' : '';
                    echo "<option $sel>$x</option>"; } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-3 control-label">Comment</label>
              <div class="col-lg-10">
                <textarea type="text" class="form-control" rows="4" maxlength="400" name="comment3"><?php if ( !empty(trim($assessment->comment3))) { echo "$assessment->comment3"; } ?></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Submit button -->
      <div class="col-lg-4">
        <input type="hidden" name="assessmentID" value="<?php echo $assessment->assessmentID; ?>">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </fieldset>
    </div>
  </form>
</div>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
