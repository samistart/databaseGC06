<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
  require_once('../../../includes/initialise_student.php');
  $action = WEB_ROOT."controllers/prc_student/student_create.php";
  InitialiseStudent::reverseCheckLoggedIn();

  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_student/student_create.php";
  $createAdmin = WEB_ROOT."views/prc_admin/admins/create.php";
?>
<div class="container">
  <legend><ul class="nav nav-pills">
      <li><a href='login.php'>Student Login</a></li>
      <li><a href='<?php echo $createAdmin; ?>'>Create admin account</a></li>
    </ul></legend>
	<h2>Create a new Student Account</h2>
	<form class="form-horizontal" method='post' action='<?php echo $action; ?>' name='newUser'>
  <fieldset>
  <div class="form-group">
		<label>First Name:</label>
		<input type='text' name='firstName' size='30'>
  </div>
  <div class="form-group">
		<label>Last Name:</label>
		<input type='text' name='lastName' size='30'>
  </div>
  <div class="form-group">
		<label>Email:</label>
		<input type='text' name='email' size='30'>
  </div>
  <div class="form-group">
		<label>Password:</label>
		<input type='password' name='password' size='30'>
  </div>
  <div class="form-group">
		<label>Confirm Password:</label>
		<input type='password' name='confirmPassword' size='30'>
  </div>
  <div class="form-group">
  <div class="col-lg-10 col-lg-offset-2">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
  </div>
    </fieldset>
	</form>
</div>
<?php include SITE_ROOT.DS.'layouts/footer.php';?>
