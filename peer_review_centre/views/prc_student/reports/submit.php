<?php
  // Initialise student files and verify whether a student user is logged in
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();

  // Cet an object containing the current student
  $currentStudent = Student::findByID("$session->userID");

  // Get the current student's report by finding it with it's group ID
  $myReport = Report::findByGroupID("$currentStudent->groupID");
?>

<h2>Submit Report</h2>

<!-- Form for report submission. Will display values of current report status -->
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

<br>

<!-- Form to upload XML files -->
<form action="../../../controllers/prc_student/upload_file.php" method="post" enctype="multipart/form-data">
  <legend>You can also import your report from an XML file.</legend>
  <label for="file">Select a file from your computer:</label>
  <input type="file" name="file" id="file" />
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<br>

<!-- Instructions for writing the XML file -->
<div class="col-lg-5">
  <b> Your XML file should have the following format: </b> <br>
  <div id="instructions-xml" class="panel panel-default">
  <div class="panel-body">
    <div style="margin-left: 1em;">
      &lt;?xml version="1.0"?> <br>
      <font color="blue"> &lt;report> <br> </font>
      <font color="blue"> &nbsp&nbsp &lt;title></font>
        Title of your report
      <font color="blue"> &lt;/title> </font> <br>
      <font color="blue"> &nbsp&nbsp &lt;abstract></font>
        Abstract of your report
      <font color="blue"> &lt;/abstract> </font> <br>
      <font color="blue"> &nbsp&nbsp &lt;content> </font>
        Content of your report
      <font color="blue"> &lt;/content> </font> <br>
      <font color="blue"> &lt;/report> </font> <br>
    </div>
  </div>
  </div>
</div>

<br></br>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
