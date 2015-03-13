<?php
  ini_set('display_errors', 'On');
  error_reporting(E_ALL | E_STRICT);

  require_once("../models/forum.php");
  require_once("../models/thread.php");
  require_once("../models/comment.php");
  require_once("../models/session.php");
  require_once("../models/database.php");
  require_once("../models/student.php");
  require_once("utilities.php");

  class InitialiseStudent {
    
    //Check that students are logged in on pages that require login for access
    public static function checkLoggedIn(){ 
      global $session; 

      if ($session->isLoggedIn()) {

        if ($session->isAdmin()) {
          //Change to login_admin when it's ready
          $session->message("Admins can't view that page - it's only for students. <br>");
          header("Location: ../views/prc_admin/admins/index.php");
          exit();
        }
        
        include '../layouts/student_header.php';

      }

      else {
          $session->message("You must login first.");
          header("Location: ../views/prc_student/students/login.php");
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
          header("Location: ../views/prc_admin/admins/index.php");
          exit();
        } else {
          $session->message("Already logged in as a student. Please logout before trying to access login page. <br>");
          header("Location: ../views/prc_student/students/index.php");
          exit();
        }

      }
    }

  }

?>