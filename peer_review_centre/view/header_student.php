<html>
<head>
  <link rel='shortcut icon' href='../icon.ico' />
  <title>Peer Review Centre</title>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../includes/bootstrap/css/bootstrap.min.css">
  <script src="../includes/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

<!-- <div class="navbar">
  <div class="navbar-inner">
    <a class="brand" href="#">Peer Assessment Centre</a>
    <ul class="nav">
      <li class="active"><a href="index_student.php">Home</a></li>
      <li><a href="view_my_report.php">My Report</a></li>
      <li><a href="unfinished_page.php">Assess</a></li>
      <li><a href="unfinished_page.php">My Assessments</a></li>
      <li><a href="view_forum.php">Forum</a></li>
      <li><a href="../controller/process_logout.php">Logout</a></li>

    </ul>
  </div>
</div>
 -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index_student.php">PRC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../view_my_report.php">My Report <span class="sr-only">(current)</span></a></li>
        <li><a href="../">Forum</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Assessments<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://www.lemonparty.org">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <?php 
            $currentStudent = Student::findByID("$session->userID"); 
            echo "$currentStudent->firstName $currentStudent->lastName";
          ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="../../controller/process_logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

</body>

</html>
