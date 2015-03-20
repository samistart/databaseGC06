<?php 
  // For debugging only
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  // Initialise student files and verify whether a student user is logged in.
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::reverseCheckLoggedIn();

  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_student/student_login.php";
  $loginAsAdmin = WEB_ROOT."views/prc_admin/admins/login.php";
?>

<!-- Navigation from login/registration/admin -->
<legend>
  <ul class="nav nav-pills">
    <li><a href='create.php'>Register for an account</a></li>
    <li><a href='<?php echo $loginAsAdmin; ?>'>Login as admin</a></li> 
  </ul>
</legend>

<br>

<!-- Container for login form -->
<div class="container" style="width:50%;">
  <div class="jumbotron">

    <legend>
      <h2>Student Login</h2>
    </legend>

    <!-- Display possible success message in green box -->
    <?php if (($session->message)) {greenBox($session->message);} ?>
    <!-- Display possible error message in red box -->
    <?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>
    
    <form class="form-horizontal" method='post' action='<?php echo $action; ?>' name='studentLogin'>
      <fieldset>

      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>

      </fieldset>
    </form>
  </div>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
