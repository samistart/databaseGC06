<?php

function isEmail($inputEmail) {
	
}

function redirectTo($location = NULL) {
	if ($location != NULL) {
    header("Location: ".WEB_ROOT."{$location}");
    exit();
	}
}

function getLocation() {
  return $_SERVER["DOCUMENT_ROOT"].DS."databaseGC06".DS."peer_review_centre".DS;
}

?>
