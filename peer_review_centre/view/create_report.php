<!DOCTYPE html>
<html>
  <head>
    <title>Submit Report</title>
    <!-- Change the icon to a picture of a little dinosaur -->
    <link rel="shortcut icon" href="../icon.ico" />
  </head>
  <body>
    <?php include 'navbar.php' ?>

    <form method="POST" action="../controller/process_new_report.php" name="newReport">
      <label>Title: </label>
      <input type="text" name="title"><br><br>
      <label>Abstract: </label>
      <input type="test" name="abstract"><br><br>
      <label>Content: </label>
      <input type="text" name="content"><br><br>
      <input type="submit" name="submit" value="Submit">
    </form>
  </body>
  

</html>