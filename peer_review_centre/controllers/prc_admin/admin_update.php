<?php
// Author: Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../../includes/initialise_admin.php");

if ($_POST["newPassword"] == $_POST["confirmPassword"]) {
    $currentAdmin = Admin::findByID("$session->userID");
    $email = $currentAdmin->email;
    //Use the PHP 5.5 hashing API. To check password use
    // if (password_verify($password, $hashAndSalt)) {
    //   // Verified
    // }

    $foundAdmin = Admin::authenticate($email, $_POST["oldPassword"]);  

    $foundAdmin->password = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
    $foundAdmin->update();
    redirectTo("views/prc_admin/admins/index.php");
} else {
    $session->message("Passwords do not match.");
    redirectTo("views/prc_admin/admins/create.php");
}

?>
