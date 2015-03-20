<?php
  // Initialise admin files and verify whether an admin user is logged in.
  require_once('../../../includes/initialise_admin.php');
  InitialiseAdmin::checkLoggedIn();
?>

<!-- Display possible success message in green box -->
<?php if (($session->message)) {greenBox($session->message);} ?>
<!-- Display possible error message in red box -->
<?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

<br></br>

<div class="jumbotron">
  <h2>Welcome to the Peer Review Centre!</h2>
  <h3>You are logged in as an administrator.</h3>
</div>

<?php include '../../../layouts/footer.php'; ?>
