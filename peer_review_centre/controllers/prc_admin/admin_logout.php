<?php
  //Author Sami Start
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);
  //Can't use initialise student here because it checks for login (Which is what we're changing in this script)
  require_once("../model/session.php");
  require_once("../model/database.php");

  $session->logout();
  redirectTo("views/prc_admin/admins/login.php");

?>