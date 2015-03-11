<?php

require_once("../model/session.php");
require_once("../model/database.php");
require_once("../model/student.php");

class InitialiseStudent {

  public static function checkLogin($session) {
    if (!$session->isLoggedIn()) {
      header("Location: ../controller/process_logout_student.php");
      exit();
    } 
    elseif ($session->isAdmin()) {
      //Change to login_admin when it's ready
      header("Location: unfinished_page.php");
      exit();
    }
  }
}
?>