<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  require_once('../includes/initialise_student.php');
?>
<html>
<body>
	<h2>Create a new Student Account</h2>
	<form method='post' action='../controller/process_new_student.php' name='newUser'>
		<label>First Name:</label>
		<input type='text' name='firstName' size='30'><br>
		<label>Last Name:</label>
		<input type='text' name='lastName' size='30'><br>
		<label>Email:</label>
		<input type='text' name='email' size='30'><br>
		<label>Password:</label>
		<input type='password' name='password' size='30'><br>
		<label>Confirm Password:</label>
		<input type='password' name='confirmPassword' size='30'>
		<p><input type='submit' value='Register'></p>
	</form>
  <a href='login_student.php'>Go to login</a>
  <a href='create_admin.php'>Create admin account</a>
</body>

</html>
