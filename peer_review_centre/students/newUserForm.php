<html>
	<head>
		<title>New Student Account</title>
	</head>
	<body>
		<h2>Create a new Student Account</h2>
		<form method='post' action='processNewStudent.php' name='newUser'>
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
	</body>
</html>