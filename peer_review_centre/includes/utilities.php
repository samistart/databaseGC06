<?php

/**
* Method that displays a green dismissable box with the given string
*/
function greenBox($string) {
  echo "<html> <div class='alert alert-dismissible alert-success'>";
  echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
  echo $string."</div></html>";
}

/**
* Method that displays a red dismissable box with the given string
*/
function redBox($string) {
  echo "<html> <div class='alert alert-dismissible alert-danger'>";
  echo "<button type='button' class='close' data-dismiss='alert'>×</button>";
  echo $string."</div></html>";
}

/**
* Method that redirects to the given location using an absolute path
*/
function redirectTo($location = NULL) {
	if ($location != NULL) {
    header("Location: ".WEB_ROOT."{$location}");
    exit();
	}
}

/**
* Method that returns the location of the project
*/
function getLocation() {
  return $_SERVER["DOCUMENT_ROOT"].DS."databaseGC06".DS."peer_review_centre".DS;
}

?>
