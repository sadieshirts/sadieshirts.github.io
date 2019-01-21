<?php
require_once("Dao.php");
require_once('phpincludes/form-helper.php');
require_once('phpincludes/session-helper.php');

session_start();

$em_id = trim($_POST['em_id']);

$errors = array();
$presets = array();
$results = array();

if(($results) < 0) {
 	$errors['results'] = "Invalid value.";
 }

try {
	$dao = new Dao();
	$user = $dao->getEmployee($em_id);
	if($user) {
		$results['total'] = $dao->getBenefits($em_id);
		redirectSuccess("index.php", $presets, $results);

	} else {
		$errors['message'] = "Invalid Employee ID.";
		redirectError("index.php", $errors, $presets);
	}
} catch (Exception $e) {
	echo $e->getMessage();
	$errors['message'] = "Something went wrong.";
	redirectError("index.php", $errors, $presets);
}	

?>




