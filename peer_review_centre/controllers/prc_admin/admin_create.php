<?php

require_once("../../includes/initialise_admin.php");

if ($_POST["password"] == $_POST["confirmPassword"]) {
  // Check if the email is valid using built-in php function    
  if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

    // Sanitazing
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Hash and salt password
    $hashAndSalt = password_hash($_POST["password"], PASSWORD_BCRYPT);  

    // Create a new Admin object from information in the form (groupID = 1 for now)
    $newAdmin = new Admin();
    $newAdmin->firstName = $firstName; 
    $newAdmin->lastName = $lastName;
    $newAdmin->email = $email;
    $newAdmin->password = $hashAndSalt;
    $newAdmin->create();

    $session->message("Your administrator account was created successfully.");
    redirectTo("views/prc_admin/admins/login.php");
    
  } else {
        $session->errorMessage("Invalid email format.");
        redirectTo("views/prc_admin/admins/create.php");
  }
} else {
    $session->errorMessage("Passwords do not match, please try again.");
    redirectTo("views/prc_admin/admins/create.php");
}

?>
