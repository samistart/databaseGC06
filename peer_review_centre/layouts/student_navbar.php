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
      <a class="navbar-brand" href="<?php echo WEB_ROOT; ?>views/prc_student/students/index.php">PRC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo WEB_ROOT; ?>views/prc_student/groups/view.php">My Group </a></li>
        <li><a href="<?php echo WEB_ROOT; ?>views/prc_student/reports/view.php">My Report <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo WEB_ROOT; ?>views/prc_student/forums/view.php">Forum</a></li>
        <li class="dropdown">
          <!-- Assessments Tab -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Assessments<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo WEB_ROOT; ?>views/prc_student/assessments/view_received.php">Received</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo WEB_ROOT; ?>views/prc_student/assessments/index_todo.php">To Do</a></li>
            <!-- <li><a href="#">Something else here</a></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li> -->
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
          <?php 
            $currentStudent = Student::findByID("$session->userID");
            echo $currentStudent->fullName();
          ?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo WEB_ROOT; ?>views/prc_student/students/update.php">Change password</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo WEB_ROOT; ?>controllers/prc_student/student_logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">