<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

require_once(SITE_ROOT.DS."includes/initialise_student.php");

// Variable threadID passed in the link from the forum page.
global $session;
$studentID = $session->userID;
$thread = Thread::findByID($_GET['threadID']);

$student = Student::findByID($studentID);
$group = Group::findByID($student->groupID);
$forum = Forum::findForumsOn($student->groupID);
$forum = $forum[0];

if ( $thread->forumID !== $forum->forumID ) {
  exit();
}

if (isset($_POST['submit'])) {
	// Title and content from form
	$content = trim($_POST['content']);

  if (empty($content)) {
    // Redirect to form and display error message
    $session->errorMessage("Can't post without content.");
    redirectTo("views/prc_student/threads/view.php?threadID=".$thread->threadID);
  
  } else {
	  // Create a new Comment object from information in the form and session
    $newComment = Comment::build($content, $thread->threadID, $studentID);

    if (!($newComment && $newComment->create())) {
  	  // Failed to create comment
      $session->errorMessage("There was an error that prevented your comment from being saved.");
      redirectTo("views/prc_student/threads/view.php?threadID=".$thread->threadID);
    } else {
      $thread->lastEdited = "CURRENT_TIMESTAMP";
      $thread->update();
      $session->message("Your comment was successfully posted.");
    }
  }
  redirectTo("views/prc_student/threads/view.php?threadID=".$thread->threadID);
} else {
  // If form wasn't submited content must be empty.
  $content = "";
}

$comments = Comment::findCommentsOn($thread->threadID);
?>
