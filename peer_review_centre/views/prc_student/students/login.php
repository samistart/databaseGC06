<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  

  require_once('../../../includes/initialise_student.php');
  //echo DB_SERVER;
  InitialiseStudent::reverseCheckLoggedIn();
  echo $session->message;
  $action = WEB_ROOT."controllers/prc_student/student_login.php";
  echo $action;
?>

<?php include '../../../layouts/header.php'; ?>

<h2>Student Login</h2>
<?php 
echo $session->message;
?>
<form method='POST' action='<?php echo $action; ?>' name='studentLogin'>
  <label>Email:</label>
  <input type='text' name='email' size='30'><br>
  <label>Password:</label>
  <input type='password' name='password' size='30'><br>
  <p><input type='submit' value='Login'></p>
</form>
<a href='create.php'>Register for an account</a>
<a href='../../prc_admin/admins/login.php'>Login as admin</a>

<?php include '../../../layouts/footer.php'; ?>
