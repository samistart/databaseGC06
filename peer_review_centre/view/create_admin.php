<html>

<head>
	<title>New Administrator Account</title>
	<!-- Change the icon to a picture of a little dinosaur -->
  <link rel="shortcut icon" href="../icon.ico" />
</head>

<body>
	<h2>Create a new Administrator Account</h2>
	<form method='post' action='../controller/process_new_admin.php' name='newAdmin'>
		<label>First Name:</label>
		<input type='text' name='firstName' size='30'><br>
		<label>Family Name:</label>
		<input type='text' name='lastName' size='30'><br>
		<label>Email:</label>
		<input type='text' name='email' size='30'><br>
		<label>Password:</label>
		<input type='password' name='password' size='30'><br>
		<label>Confirm Password:</label>
		<input type='password' name='confirmPassword' size='30'>
		<p><input type='submit' value='Register'></p>
	</form>
</body>

</html>
