<?php

function isEmail($inputEmail) {
	
}

function redirectTo($location = NULL) {
	if ($location != NULL) {
    header("Location: {$location}");
    exit();
	}
}

?>
