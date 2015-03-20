<?php
  // Initialise admin files and verify whether an admin user is logged in.
  require_once('../../../includes/initialise_admin.php');
  InitialiseAdmin::reverseCheckLoggedIn();

  $action = WEB_ROOT."controllers/prc_admin/admin_create.php";
  $createStudent = WEB_ROOT."views/prc_student/students/create.php";
?>

<!-- Header when user not logged in -->
<?php include '../../../layouts/header.php'; ?>

<legend>
  <ul class="nav nav-pills">
    <li><a href='login.php'>Admin Login</a></li>
    <li><a href='<?php echo $createStudent; ?>'>Create student account</a></li>
  </ul>
</legend>

<br>

<!-- Jumbotron containing form -->
<div class="container" style="width:60%;">
  <div class="jumbotron">
    <legend>
      <h2>Create a new admin account</h2>
    </legend>

    <!-- Display possible success message in green box -->
    <?php if (($session->message)) {greenBox($session->message);} ?>
    <!-- Display possible error message in red box -->
    <?php if (($session->errorMessage)) {redBox($session->errorMessage);} ?>

    <!-- Form for admin account registration -->
    <form class="form-horizontal" method='post' action='<?php echo $action; ?>' name='newUser'>
      <fieldset>

      <div class="form-group">
        <label class="col-lg-2 control-label">First Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="firstName" placeholder="First Name">
        </div>
      </div>

      <div class="form-group">
        <label class="col-lg-2 control-label">Last Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" name="lastName" placeholder="Last Name">
        </div>
      </div>

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
        <label for="inputPassword" class="col-lg-2 control-label">Confirm Password</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" name="confirmPassword" placeholder="Password">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </div>

      </fieldset>
    </form>
  </div>
</div>

<?php include '../../../layouts/footer.php'; ?>
