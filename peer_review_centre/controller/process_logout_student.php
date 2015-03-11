<?php
//Author Sami Start
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../includes/initialise_student.php");

$studentSession->logout();
header("Location: ../view/login_student.php");
exit();
?>