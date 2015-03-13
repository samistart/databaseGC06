<?php 
require_once('../includes/initialise_student.php');
InitialiseStudent::reverseCheckLoggedIn();
echo $session->message;
?>
<html>

<head>
  <title>Student Login</title>
  <!-- Change the icon to a picture of a little dinosaur -->
  <link rel="shortcut icon" href="../icon.ico" />
</head>

<body>
  <h2>Student Login</h2>
  <?php 
  echo $session->message;
  ?>
  <form method='POST' action='../controller/process_login_student.php' name='studentLogin'>
    <label>Email:</label>
    <input type='text' name='email' size='30'><br>
    <label>Password:</label>
    <input type='password' name='password' size='30'><br>
    <p><input type='submit' value='Login'></p>
  </form>
  <a href='create_student.php'>Register for an account</a>
  <a href='login_admin.php'>Login as admin</a>
</body>

</html>
