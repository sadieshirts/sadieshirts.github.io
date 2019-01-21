<?php
function redirectError($location, $errors, $presets = NULL) {
	$_SESSION['errors'] = $errors;
	if($presets) {
		$_SESSION['presets'] = $presets;
	}
	header("Location: $location");
	die;
}

function redirectSuccess($location, $presets = NULL, $results = NULL) {
	if($presets){
		$_SESSION['presets'] = $presets;
	}
	if($results){
		$_SESSION['results'] = $results;
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



