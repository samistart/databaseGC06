<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');

require_once(SITE_ROOT.DS."includes/initialise_student.php");

// not yet needed.
?>
