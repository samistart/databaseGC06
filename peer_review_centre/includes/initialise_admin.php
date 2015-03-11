<?php

require_once("../model/session.php");
require_once("../model/database.php");
require_once("../model/admin.php");

  class InitialiseAdmin {
    
    public static function checkLoggedIn(){ 
      global $session; 

      if ($session->isLoggedIn()) {

        if (!($session->isAdmin())) {
          $session->message("Studens can't view that page - it's only for admins. <br>");
          header("Location: ../view/index_student.php");
          exit();
        }
        
        include '../view/header_admin.php';

      }

      else {
          $session->message("You must login first.");
          header("Location: ../view/login_admin.php");
          exit();

      }
    }

  }
?>