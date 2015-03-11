<?php

  require_once("../model/session.php");
  require_once("../model/database.php");
  require_once("../model/student.php");

  class InitialiseStudent {
    
    public static function checkLoggedIn($session){  
      if ($session->isLoggedIn()) {
        include '../view/header_student.php';
      }

      else {

        if (!$session->isLoggedIn()) {
          $session->message("You must login first.");
          header("Location: ../view/login_student.php");
          exit();
        } 
        elseif ($session->isAdmin()) {
          //Change to login_admin when it's ready
          $session->message("Admins can't view this page - it's only for students.");
          header("Location: unfinished_page.php");
          exit();
        }

      }
    }

  }
  

?>