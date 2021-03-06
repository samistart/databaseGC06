<?php
// Definition of directory separators and absolute paths
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'includes');
defined('WEB_ROOT') ? null : define('WEB_ROOT', 'http://localhost:8888/databaseGC06/peer_review_centre/');

// Requires that will be needed in all the student interface's files
require_once(SITE_ROOT.DS."includes/session.php");
require_once(SITE_ROOT.DS."includes/database.php");
require_once(SITE_ROOT.DS."models/forum.php");
require_once(SITE_ROOT.DS."models/assessment.php");
require_once(SITE_ROOT.DS."models/report.php");
require_once(SITE_ROOT.DS."models/group.php");
require_once(SITE_ROOT.DS."models/thread.php");
require_once(SITE_ROOT.DS."models/comment.php");
require_once(SITE_ROOT.DS."models/student.php");
require_once(SITE_ROOT.DS."includes/utilities.php");

/**
* Class that holds the methods for initialising the student interface.
*/
class InitialiseStudent {

  /**
  * Method to check that students are logged in on pages that require login for access.
  */
  public static function checkLoggedIn() { 
    global $session;

    if ($session->isLoggedIn()) {

      if ($session->isAdmin()) {
        // Change to login_admin when it's ready
        $session->errorMessage("Admins can't view that page - it's only for students. <br>");
        redirectTo("views/prc_admin/admins/index.php");
      }
      
      // Update timestamp for student's last activity.
      $student = Student::findByID($session->userID);
      $student->lastActive = "CURRENT_TIMESTAMP";
      $student->update();

      include SITE_ROOT.DS.'layouts/header.php';
      include SITE_ROOT.DS.'layouts/student_navbar.php';
    } 
    else {
      $session->errorMessage("You must login first.");
      redirectTo("views/prc_student/students/login.php");
    }
  }

  /**
  * Method to check that students are logged out on pages that require you to be logged out
  * e.g. sign in and register
  */
  public static function reverseCheckLoggedIn() { 
    global $session; 

    if ($session->isLoggedIn()) {

      if ($session->isAdmin()) {
        // Change to login_admin when it's ready
        $session->errorMessage("Already logged in as an admin, please log out before logging in as a student. <br>");
        redirectTo("views/prc_admin/admins/index.php");
      } 
      else {
        $session->errorMessage("Already logged in as a student. Please logout before trying to access login page. <br>");
        redirectTo("views/prc_student/students/index.php");
      }
    } else {
      include SITE_ROOT.DS.'layouts/header.php';
    }
  }

}

?>
