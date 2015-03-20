<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

require_once(SITE_ROOT.DS."includes/initialise_student.php");

// Take studentID from the current session and create the corresponding student object.
global $session;
$studentID = $session->userID;
$student = Student::findByID($studentID);

// Since forum-group have a one to one relationship, findForumOn() will only
// return one result which will be the corresponding forum.
$forums = Forum::findForumOn($student->groupID);
$forum = $forums[0];
$forumID = $forum->forumID;

if (isset($_POST['submit'])) {
  // Title and content from form
  $title = trim($_POST['title']);
  $content = trim($_POST['content']);

  if (empty($title) || empty($content)) {
    // Redirect to form and display error message
    $session->errorMessage("Can't create a new thread without a title or content.");
    redirectTo("views/prc_student/forums/view.php");

  } else {
    // Create a new Thread object from information in the form and session
    $newThread = Thread::build($forumID, $studentID, $title, $content);

    if (!($newThread && $newThread->create())) {
      // Failed to create thread
      $session->errorMessage("There was an error that prevented your thread from being saved.");
      redirectTo("views/prc_student/forums/view.php");
    }
    $session->message("Your thread was successfully created.");
  }
  redirectTo("views/prc_student/forums/view.php");
} else {
  // If form wasn't submited title and content must be empty.
  $title = "";
  $content = "";
}

$threads = Thread::findThreadsOn($forumID);
?>
