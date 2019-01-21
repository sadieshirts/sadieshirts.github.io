<?php
function redirectError($location, $errors, $presets = NULL) {
	$_SESSION['errors'] = $errors;
	if($presets) {
		$_SESSION['presets'] = $presets;
	}
	header("Location: $location");
	die;
}

function redirectSuccess($location, $user = NULL) {
	if($user) {
		$_SESSION['user'] = $user;
	}
	header("Location: $location");
}

function validateSession() {
	if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"] === true) {
		return true;
	} else {
		return false;
	}
}



