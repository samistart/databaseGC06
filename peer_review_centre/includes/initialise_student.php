<?php

  require_once("../model/session.php");
  require_once("../model/database.php");
  require_once("../model/student.php");

  class InitialiseStudent {
    
    public static function checkLoggedIn(){ 
      global $session; 

      if ($session->isLoggedIn()) {

        if ($session->isAdmin()) {
          //Change to login_admin when it's ready
          $session->message("Admins can't view that page - it's only for students. <br>");
          header("Location: ../view/index_admin.php");
          exit();
        }
        
        include '../view/header_student.php';

      }

      else {
          $session->message("You must login first.");
          header("Location: ../view/login_admin.php");
          exit();

      }
    }

  }
  

?>