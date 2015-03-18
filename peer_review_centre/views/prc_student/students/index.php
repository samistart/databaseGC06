<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  
  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();
?>

<!-- Display possible success message in green box -->
<?php if (($session->message)) {greenBox($session->message);} ?>
<!-- Display possible error message in red box -->
<?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

<br></br>

<div class="jumbotron">
<h2>Welcome to the Peer Review Centre!</h2>
<h3>This is your homepage.</h3>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
