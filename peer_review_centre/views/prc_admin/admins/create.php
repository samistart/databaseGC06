<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../../../includes/initialise_admin.php');
  InitialiseAdmin::reverseCheckLoggedIn();
  echo $session->message;
  $action = WEB_ROOT."controllers/prc_admin/admin_create.php";
  $createStudent = WEB_ROOT."views/prc_student/students/create.php";
?>
<?php include '../../../layouts/header.php'; ?>
  <legend><ul class="nav nav-pills">
      <li><a href='login.php'>Admin Login</a></li>
      <li><a href='<?php echo $createStudent; ?>'>Create student account</a></li>
    </ul></legend>
  <h2>Create a new admin account</h2>
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

<?php include '../../../layouts/footer.php'; ?>
