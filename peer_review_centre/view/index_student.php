<?php
  //Author Sami Start
  require_once('../includes/initialise_student.php');
  InitialiseStudent::checkLoggedIn();
  echo $session->message;
?>
<html>

<body>
  <h1>Welcome to the home page!</h1>
  <h2>I hope you like my minimalist design.</h2>

  <?php include 'footer.php'; ?>

</body>

</html>
