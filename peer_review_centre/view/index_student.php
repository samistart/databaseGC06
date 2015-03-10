<html>
  <head>
    <title>Student Login</title>
    <!-- Change the icon to a picture of a little dinosaur -->
    <link rel="shortcut icon" href="../icon.ico" />
  </head>
  <body>
    <?php 
    include 'navbar.php'; 
    require_once("../includes/initialise_student.php"); 
     var_dump($_SESSION); ?>
    <h1>Welcome to the home page!</h1>
    <h2>I hope you like my minimalist design.</h2>
  </body>
</html>