<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once('../../../includes/initialise_student.php');
  InitialiseStudent::reverseCheckLoggedIn();
  // Echo the session message
  echo $session->message;
  // Make absolute file paths
  $action = WEB_ROOT."controllers/prc_student/student_login.php";
  $loginAsAdmin = WEB_ROOT."views/prc_admin/admins/login.php";
?>

<div class="container">
  <h2>Student Login</h2>
  <form class="form-sigin" method='POST' action='<?php echo $action; ?>' name='studentLogin'>
    <h2 class="form-signin-heading"><?php echo $session->message; ?></h2>
    <label for="inputEmail" class="sr-only">Email:</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" name='email'>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" name='password'>
    <table style="width:100%">
      <tr>
        <td><a href='create.php'>Register for an account</a></td>
        <td><a href='<?php echo $loginAsAdmin; ?>'>Login as admin</a></td>    
    </table>
    <div>
      
      
    </div>
    <input type='submit' value='Login'>
  </form>
</div>

<?php include '../../../layouts/footer.php'; ?>
