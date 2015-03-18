<?php 
  require_once('../../../includes/initialise_admin.php');
  InitialiseAdmin::reverseCheckLoggedIn();

  $action = WEB_ROOT."controllers/prc_admin/admin_login.php";
  $loginAsStudent = WEB_ROOT."views/prc_student/students/login.php";
  include '../../../layouts/header.php';  
?>

<legend>
  <ul class="nav nav-pills">
    <li><a href='create.php'>Register for an account</a></li>
    <li><a href='<?php echo $loginAsStudent; ?>'>Login as student</a></li>
  </ul>
</legend>
<br>
<div class="container" style="width:50%;">
  <div class="jumbotron">
    <legend>
      <h2>Admin Login</h2>
    </legend>
    
    <!-- Display possible success message in green box -->
    <?php if (($session->message)) {greenBox($session->message);} ?>
    <!-- Display possible error message in red box -->
    <?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

    <form class="form-horizontal" method='post' action='<?php echo $action; ?>' name='adminLogin'>
      <fieldset>
      <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>
      </fieldset>
    </form>
  </div>
</div>

<?php include '../../../layouts/footer.php'; ?>
