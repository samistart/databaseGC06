<html>
  <head>
    <title>Student Login</title>
    <!-- Change the icon to a picture of a little dinosaur -->
    <link rel="shortcut icon" href="../icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <h2>Student Login</h2>
    <form method='POST' action='../controller/process_login_student.php' name='studentLogin'>
      <label>Email:</label>
      <input type='text' name='email' size='30'><br>
      <label>Password:</label>
      <input type='password' name='password' size='30'><br>
      <p><input type='submit' value='Register'></p>
    </form>
  </body>
</html>