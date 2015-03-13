<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  

  require_once('../../../includes/initialise_student.php');
  //echo DB_SERVER;
  InitialiseStudent::reverseCheckLoggedIn();
  echo $session->message;
?>

<h2>Student Login</h2>
<?php 
echo $session->message;
?>
<form method='POST' action='../controllers/prc_student/students.php' name='studentLogin'>
  <label>Email:</label>
  <input type='text' name='email' size='30'><br>
  <label>Password:</label>
  <input type='password' name='password' size='30'><br>
  <p><input type='submit' value='Login'></p>
</form>
<a href='create.php'>Register for an account</a>
<a href='login_admin.php'>Login as admin</a>

Here's a dummy footer.

</div>
</body>
</html>
