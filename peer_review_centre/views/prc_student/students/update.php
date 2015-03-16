<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
  require_once('../../../includes/initialise_student.php');
  $action = WEB_ROOT."controllers/prc_student/student_create.php";
  InitialiseStudent::checkLoggedIn();

  // Make absolute file paths
  $action = "#";
  $createAdmin = WEB_ROOT."views/prc_admin/admins/create.php";
?>

  <h2>Change Password</h2>
  <form method='post' action='<?php echo $action; ?>' name='newUser'>
    <label>Old password:</label>
    <input type='password' name='password' size='30'><br>
    <label>New password:</label>
    <input type='password' name='password' size='30'><br>
    <label>Confirm new password:</label>
    <input type='password' name='confirmPassword' size='30'>
    <p><input type='submit' value='Submit changes'></p>
  </form>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>