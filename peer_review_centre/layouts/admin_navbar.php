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
      <a class="navbar-brand" href='<?php echo WEB_ROOT; ?>views/prc_admin/admins/index.php'>PRC</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href='<?php echo WEB_ROOT; ?>views/prc_admin/groups/index.php'>Groups </a></li>
        <li><a href='<?php echo WEB_ROOT; ?>views/prc_admin/students/index.php'>Students </a></li>
        <li><a href='<?php echo WEB_ROOT; ?>views/prc_admin/groups/allocate.php'>Group Allocation <span class="sr-only">(current)</span></a></li>
        <li><a href='<?php echo WEB_ROOT; ?>views/prc_admin/assessments/assign.php'>Assessment Assignment</a></li>
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
            <li><a href="<?php echo WEB_ROOT; ?>views/prc_admin/admins/update.php">Change password</a></li>
            <li class="divider"></li>
            <li><a href='<?php echo WEB_ROOT; ?>controllers/prc_admin/admin_logout.php'>Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <div class="container">