<?php
// Author: Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../../includes/initialise_admin.php");

if (empty($_POST["oldPassword"]) || empty($_POST["newPassword"]) || empty($_POST["confirmPassword"])) {
    $session->errorMessage("Please fill out all fields.");
    redirectTo("views/prc_admin/admins/update.php");
}


if ($_POST["newPassword"] != $_POST["confirmPassword"]) {
    $session->errorMessage("Passwords do not match.");
    redirectTo("views/prc_admin/admins/update.php");
}

    $currentAdmin = Admin::findByID("$session->userID");
    $email = $currentAdmin->email;

    $foundAdmin = Admin::authenticate($email, $_POST["oldPassword"]);  

if ($foundAdmin) {
    $foundAdmin->password = password_hash($_POST["newPassword"], PASSWORD_BCRYPT);
    $foundAdmin->update();

    $session->message("Your password was updated successfully.");
    redirectTo("views/prc_admin/admins/index.php");
} else {
    $session->errorMessage("Incorrect password.");
    redirectTo("views/prc_admin/admins/update.php"); 
}

?>
