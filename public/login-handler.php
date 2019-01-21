<?php
require_once("Dao.php");
require_once('phpincludes/form-helper.php');
require_once('phpincludes/session-helper.php');

session_start();


$email = trim($_POST['email']);
$password = trim($_POST['password']);

$errors = array();
$presets = array();

 if(strlen($email) <= 0 || strlen($email) > 50) {
 	$errors['email'] = "Email is required.";
 } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
 	$errors['email'] = "Must be a valid email address.";
 } if(strlen($password) <= 0) {
    $errors['password'] = "Password is required.";
 } 

$presets['email'] = htmlspecialchars($email);

if (empty($errors)) {
	try {
		$dao = new Dao();
		$user = $dao->validateUser($email, $password);
		if($user) {
			loginUser($user);
			redirectSuccess("youRegistered.php");

		} else {
			$errors['message'] = "Invalid username or password.";

			redirectError("login.php", $errors, $presets);
		}
	} catch (Exception $e) {
		echo $e->getMessage();

		$errors['message'] = "Something went wrong.";
		redirectError("login.php", $errors, $presets);
	}	
}else{
	redirectError("login.php", $errors, $presets);
}
?>




