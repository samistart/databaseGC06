<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::reverseCheckLoggedIn();
  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_student/student_login.php";
  $loginAsAdmin = WEB_ROOT."views/prc_admin/admins/login.php";
?>
<legend><ul class="nav nav-pills">
    <li><a href='create.php'>Register for an account</a></li>
    <li><a href='<?php echo $loginAsAdmin; ?>'>Login as admin</a></li> 
</ul></legend>
<div class="container">
  <h2>Student Login</h2>
  <?php echo $session->message; ?>
  <form class="form-horizontal" method='post' action='<?php echo $action; ?>' name='studentLogin'>
  <fieldset>
  <div class="form-group">
    <label>Email:</label>
    <input type='text' name='email' size='30'>
  </div>
  <div class="form-group">
    <label>Password:</label>
    <input type='password' name='password' size='30'>
  </div>
  <div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Login</button>
  </div>
  </div>
    </fieldset>
  </form>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
