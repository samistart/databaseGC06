<?php
  require_once("../model/student.php");
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  Student->login($email, $password);

 ?>