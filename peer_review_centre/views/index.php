<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../includes/initialise_student.php');
  InitialiseStudent::reverseCheckLoggedIn();
?>

<br> <br> <br>

<div class ="container" styled="width:50%">
  <div class="jumbotron">
    <h1>Peer Review Center</h1>
    <p>Welcome! Start by registering for an account or sign into an existing one.</p>
    <p>
      <a class="btn btn-primary btn-lg" href="prc_student/students/create.php">Register</a>
      <a class="btn btn-primary btn-lg" href="prc_student/students/login.php">Login</a>
    </p>
  </div>
</div>

<?php include SITE_ROOT.DS.'layouts/footer.php';?>
