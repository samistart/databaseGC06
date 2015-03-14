<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once('../../../includes/initialise_student.php');
InitialiseStudent::checkLoggedIn($session);

// Variable threadID passed in the link from the forum page.
global $session;
$studentID = $session->userID;
$thread = Thread::findByID($_GET['threadID']);

if (isset($_POST['submit'])) {
	// Title and content from form
	$content = trim($_POST['content']);

	// Create a new Thread object from information in the form and session
  $newComment = Comment::build($content, $thread->threadID, $studentID);

  if($newComment && $newComment->create()) {
  	// Comment saved
  	redirectTo("views/prc_student/threads/views.php?threadID=".$thread->threadID);
  } else {
  	// Failed
  	$message = "There was an error that prevented the post from being saved.";
  }

	echo "Comment was created successfully.";
} else {
	$title = "";
	$content = "";
}

$comments = Comment::findCommentsOn($thread->threadID);
?>
