<?php 
  require_once('../../../includes/initialise_admin.php');
  echo $session->message;

  $action = WEB_ROOT."controllers/prc_admin/admin_login.php";
  $loginAsStudent = WEB_ROOT."views/prc_student/students/login.php";
  echo $action;
?>

<?php include '../../../layouts/header.php'; ?>

<h2>Admin Login</h2>
<form method='POST' action='<?php echo $action; ?>' name='adminLogin'>
  <label>Email:</label>
  <input type='text' name='email' size='30'><br>
  <label>Password:</label>
  <input type='password' name='password' size='30'><br>
  <p><input type='submit' value='Login'></p>
</form>
<a href='create.php'>Register for an account</a>
<a href='<?php echo $loginAsStudent; ?>'>Login as student</a>

<?php include '../../../layouts/footer.php'; ?>
