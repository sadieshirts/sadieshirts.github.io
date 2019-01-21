<?php
require_once("Dao.php");
require_once('phpincludes/form-helper.php');
require_once('phpincludes/session-helper.php');

session_start();

$errors = array();
$presets = array();
$dependents = array();

$em_first_name = trim($_POST['em_first_name']);
$em_last_name = trim($_POST['em_last_name']);

if(strlen($em_first_name) <= 0 || strlen($em_first_name) > 50) {
	$errors['message'] = "Full name is required.";
}
if(strlen($em_last_name) <= 0 || strlen($em_last_name) > 50) {
	$errors['message'] = "Full name is required.";
}
if (empty($errors)){
	try{
		$dao = new Dao();
		// No check for if user exists, because we are assuming 
		// that there can be people with the same name, 
		// which is why I use the ID as verification 
		if($dao->addEmployee($em_first_name, $em_last_name)){
			$presets['addedNew'] = "Successfully added employee.";
			//header("Location: newEmployee.php");
			redirectSuccess("newEmployee.php", $presets);
		} else {
			$errors['message'] = "Oh no! Something went wrong.";
			redirectError("newEmployee.php", $errors, $presets);
		}	
	}catch (Exception $e) {
		echo $e->getMessage();
		$errors['message'] = "Something went wrong.";
		redirectError("newEmployee.php", $errors, $presets);
	}
}else{
	redirectError("newEmployee.php", $errors, $presets);
}
		
?>




