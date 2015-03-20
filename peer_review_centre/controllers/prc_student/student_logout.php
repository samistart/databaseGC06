<?php

require_once('../../includes/initialise_student.php');

$session->logout();
redirectTo("views/prc_student/students/login.php");

?>