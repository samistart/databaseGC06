<?php 
  require_once('../../../includes/initialise_admin.php');
  InitialiseAdmin::reverseCheckLoggedIn();

  $action = WEB_ROOT."controllers/prc_admin/admin_login.php";
  $loginAsStudent = WEB_ROOT."views/prc_student/students/login.php";
  include '../../../layouts/header.php';  
?>
<legend><ul class="nav nav-pills">
      <li><a href='create.php'>Register for an account</a></li>
      <li><a href='<?php echo $loginAsStudent; ?>'>Login as student</a></li>
</ul></legend>
<div class="container">
<h2>Admin Login</h2>
<?php echo $session->message; ?>
<form method='POST' action='<?php echo $action; ?>' name='adminLogin'>
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
</form>

<?php include '../../../layouts/footer.php'; ?>
