<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once("../model/thread.php");

$forumID = 1;
$studentID = 1;

if(isset($_POST['submit'])) {
	// 
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);

	// Create a new Thread object from information in the form and session (forumID = 1 and studentID = 1 for now)
    $newThread = Thread::build($forumID, $studentID, $title, $content);

    if($newThread && $newThread->save()) {
    	// Thread saved
    	redirectTo("../view/view_forum.php");
    } else {
    	// Failed
    	$message = "There was an error that prevented the thread from being saved.";
    }

	echo "Thread was created successfully.";
} else {
	$title = "";
	$content = "";
}
$threads = Thread::findThreadsOn($forumID);
?>
