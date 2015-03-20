<?php

require_once('../../includes/initialise_admin.php');

$session->logout();
redirectTo("views/prc_admin/admins/login.php");

?>