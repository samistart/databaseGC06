<?php 
  require_once('../includes/initialise_student.php');
  echo $session->message;
?>
<html>
<body>
  <h2>Admin Login</h2>
  <form method='POST' action='../controller/process_login_admin.php' name='studentLogin'>
    <label>Email:</label>
    <input type='text' name='email' size='30'><br>
    <label>Password:</label>
    <input type='password' name='password' size='30'><br>
    <p><input type='submit' value='Login'></p>
  </form>
  <a href='create_admin.php'>Register for an account</a>
  <a href='login_student.php'>Login as student</a>
</body>

</html>