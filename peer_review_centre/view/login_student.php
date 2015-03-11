<html>

<head>
  <title>Student Login</title>
  <!-- Change the icon to a picture of a little dinosaur -->
  <link rel="shortcut icon" href="../icon.ico" />
</head>

<body>
  <h2>Student Login</h2>
  <?php 
  require_once('../includes/initialise_student.php');
  echo $session->message;
  ?>
  <br><br>
  <form method='POST' action='../controller/process_login_student.php' name='studentLogin'>
    <label>Email:</label>
    <input type='text' name='email' size='30'><br>
    <label>Password:</label>
    <input type='password' name='password' size='30'><br>
    <p><input type='submit' value='Login'></p>
  </form>
</body>

</html>
