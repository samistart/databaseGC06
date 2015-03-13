<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
  defined('SITE_ROOT') ? null : 
    define('SITE_ROOT', DS.'Applications'.DS.'MAMP'.DS.'htdocs'.DS.'databaseGC06'.DS.'peer_review_centre');
  defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
  
  require_once(SITE_ROOT.DS."models/admin.php");
  require_once(SITE_ROOT.DS."models/session.php");
  require_once(SITE_ROOT.DS."models/database.php");
  require_once(SITE_ROOT.DS."includes/utilities.php");

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