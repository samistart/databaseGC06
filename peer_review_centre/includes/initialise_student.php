<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once("../model/forum.php");
  require_once("../model/thread.php");
  require_once("../model/comment.php");
  require_once("../model/session.php");
  require_once("../model/database.php");
  require_once("../model/student.php");
  require_once("utilities.php");

  class InitialiseStudent {
    
    //Check that students are logged in on pages that require login for access
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
          header("Location: ../view/login_student.php");
          exit();

      }
    }

  //Check that students are logged out on pages that require you to be logged out
  //e.g. sign in and register
  public static function reverseCheckLoggedIn(){ 
      global $session; 

      if ($session->isLoggedIn()) {

        if ($session->isAdmin()) {
          //Change to login_admin when it's ready
          $session->message("Already logged in as an admin, please log out before logging in as a student. <br>");
          header("Location: ../view/index_admin.php");
          exit();
        } else {
          $session->message("Already logged in as a student. Please logout before trying to access login page. <br>");
          header("Location: ../view/index_student.php");
          exit();
        }

      }
    }

  }

?>