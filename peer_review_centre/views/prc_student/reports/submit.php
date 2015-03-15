<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  //get an object of the current student
  $currentStudent = Student::findByID("$session->userID");
  //get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<h2>Submit Report</h2>

<form class="form-horizontal" method="POST" action="../../../controllers/prc_student/reports.php" name="newReport">
  <fieldset>
    <legend>The time of your latest edit will count as the time of submission.</legend>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Title</label>
      <div class="col-lg-10">
        <textarea name='title' class="form-control" rows="1" id="textArea" maxlength="60"><?php
            if ($myReport) {
              echo "$myReport->title";
            }
          ?></textarea>
        <span class="help-block">Maximum 60 characters.</span>
      </div>
    </div>
        <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Abstract</label>
      <div class="col-lg-10">
        <textarea name='abstract' class="form-control" rows="3" id="textArea" maxlength="400"><?php
          if ($myReport) {
            echo "$myReport->abstract";
          }
        ?></textarea>
        <span class="help-block">Maximum 400 characters.</span>
      </div>
    </div>
        <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Content</label>
      <div class="col-lg-10">
        <textarea name='content' class="form-control" rows="20" id="textArea"  maxlength="10000"><?php
          if ($myReport) {
            echo "$myReport->content";
          }
        ?></textarea>
        <span class="help-block">Maximum 10,000 characters.</span>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Undo all changes</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
<?php include SITE_ROOT.DS.'layouts/footer.php';?>

