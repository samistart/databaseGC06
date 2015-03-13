<?php

require_once("../model/session.php");
require_once("../model/database.php");
require_once("../model/admin.php");
require_once("utilities.php");

  class InitialiseAdmin {
    
    //Use this function to check that admins are logged in on pages that require login for access
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

    //Check that amins are logged out on pages that require you to be logged out
    //e.g. sign in and register
    public static function reverseCheckLoggedIn(){ 
      global $session; 

      if ($session->isLoggedIn()) {

        if (!($session->isAdmin())) {
          //Change to login_admin when it's ready
          $session->message("Already logged in as an student, please log out before logging in as an admin. <br>");
          header("Location: ../view/index_student.php");
          exit();
        } else {
          $session->message("Already logged in as an admin. Please logout before trying to access login page. <br>");
          header("Location: ../view/index_admin.php");
          exit();
        }

      }
    }

  }
?>