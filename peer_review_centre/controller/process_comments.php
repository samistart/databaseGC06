<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once('../includes/initialise_student.php');

// Variable threadID passed in the link from the forum page.
$studentID = 1;
$thread = Thread::findByID($_GET['threadID']);

if (isset($_POST['submit'])) {
	// Title and content from form
	$content = trim($_POST['content']);

	// Create a new Thread object from information in the form and session
  $newComment = Comment::build($content, $thread->threadID, $studentID);

  if($newComment && $newComment->create()) {
  	// Comment saved
  	redirectTo("../view/view_thread.php?threadID=".$thread->threadID);
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
