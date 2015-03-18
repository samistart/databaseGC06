<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
  require_once('../../../includes/initialise_student.php');
  $action = WEB_ROOT."controllers/prc_student/student_create.php";
  InitialiseStudent::checkLoggedIn();

  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_student/student_update.php";
  $createAdmin = WEB_ROOT."views/prc_admin/admins/create.php";
?>

<div class="container" style="width:60%;">
  <div class="jumbotron">
    <legend>
      <h2>Change Password</h2>
    </legend>
    
    <!-- Display possible success message in green box -->
    <?php if (($session->message)) {greenBox($session->message);} ?>
    <!-- Display possible error message in red box -->
    <?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

    <form class="form-horizontal" method='post' action='<?php echo $action; ?>' name='changePassword'>
      <fieldset>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-4 control-label">Old password</label>
        <div class="col-lg-8">
          <input type="password" class="form-control" name="oldPassword">
        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-4 control-label">New password</label>
        <div class="col-lg-8">
          <input type="password" class="form-control" name="newPassword">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-4 control-label">Confirm new password</label>
        <div class="col-lg-8">
            <input type="password" class="form-control" name="confirmPassword">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-8 col-lg-offset-4">
          <button type="submit" value='Submit changes' class="btn btn-primary">Change Password</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
