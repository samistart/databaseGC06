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

// Since forum-group have a one to one relationship, findForumsOn() will
// only return one result which will be the corresponding forum.
$forums = Forum::findForumsOn($student->groupID);
$forum = $forums[0];
$forumID = $forum->forumID;

if(isset($_POST['submit'])) {

	// Title and content from form
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);

	// Create a new Thread object from information in the form and session (forumID = 1 and studentID = 1 for now)
    $newThread = Thread::build($forumID, $studentID, $title, $content);

    if($newThread && $newThread->create()) {
    	// Thread saved
        redirectTo("views/prc_student/forums/view.php");
    } else {
    	// Failed
    	$message = "There was an error that prevented the thread from being saved.";
    }

	//echo "Thread was created successfully.";
} else {
	$title = "";
	$content = "";
}
$threads = Thread::findThreadsOn($forumID);
?>
