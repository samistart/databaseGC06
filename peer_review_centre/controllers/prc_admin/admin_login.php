<?php

require_once("../../includes/initialise_admin.php");

if($session->isLoggedIn()) {
  redirectTo("views/prc_admin/admins/index.php");
}

if (isset($_POST['email']) & isset($_POST['password'])) { // Form has been submitted.
  
  $email = trim($_POST['email']);
  $password = $_POST['password'];

  // Check for valid email
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    // Check database to see if adminname/password exist.
    $foundAdmin = Admin::authenticate($email, $password);

    if ($foundAdmin) {
      $session->login($foundAdmin, true);
      redirectTo("views/prc_admin/admins/index.php");

    } else {
      $session->errorMessage("Email/password combination incorrect.");
      redirectTo("views/prc_admin/admins/login.php");
    }
  
  } else { 
      $session->errorMessage("That's not a valid email address.");
      redirectTo("views/prc_admin/admins/login.php");
  }
} else {
  $session->errorMessage("Email or password cannot be blank.");
  redirectTo("views/prc_admin/admins/login.php");
}
?>
