<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
  require_once('../../../includes/initialise_admin.php');
  $action = WEB_ROOT."controllers/prc_admin/admin_create.php";
  InitialiseAdmin::checkLoggedIn();

  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_admin/admin_update.php";
  $createAdmin = WEB_ROOT."views/prc_admin/admins/create.php";
?>

<h2>Change Password</h2>

<!-- Display possible success message in green box -->
<?php if (($session->message)) {greenBox($session->message);} ?>
<!-- Display possible error message in red box -->
<?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

<form method='post' action='<?php echo $action; ?>' name='newUser'>
  <label>Old password:</label>
  <input type='password' name='oldPassword' size='30'><br>
  <label>New password:</label>
  <input type='password' name='newPassword' size='30'><br>
  <label>Confirm new password:</label>
  <input type='password' name='confirmPassword' size='30'>
  <p><input type='submit' value='Submit changes'></p>
</form>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>