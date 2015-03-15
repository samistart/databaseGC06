<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::reverseCheckLoggedIn();
  // Echo the session message
  echo $session->message;
  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_student/student_login.php";
  $loginAsAdmin = WEB_ROOT."views/prc_admin/admins/login.php";
?>
<div class="container">
  <legend><ul class="nav nav-pills">
      <li><a href='create.php'>Register for an account</a></li>
      <li><a href='<?php echo $loginAsAdmin; ?>'>Login as admin</a></li> 
  </ul></legend>
  <h2>Student Login</h2>
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
</div>

<?php include '../../../layouts/footer.php'; ?>
