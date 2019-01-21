<?php
require_once("Dao.php");
// require_once('phpincludes/form-helper.php');
// require_once('phpincludes/session-helper.php');

session_start();

$em_id = trim($_POST['em_id']);

$errors = array();
$presets = array();
$results = array();



try {
	$dao = new Dao();
	$user = $dao->getEmployee($em_id);
	if($user) {
		$results['total'] = $dao->getBenefits($em_id);
		// loginUser($user);
		// redirectSuccess("youRegistered.php");

	} else {
		$errors['message'] = "Invalid username or password.";

		redirectError("index.php", $errors, $presets);
	}
} catch (Exception $e) {
	echo $e->getMessage();

	$errors['message'] = "Something went wrong.";
	redirectError("login.php", $errors, $presets);
}	






// if (empty($errors)) {
// 	try {
// 		$dao = new Dao();
// 		$user = $dao->getEmployee($em_id);
// 		if($user) {
// 			loginUser($user);
// 			redirectSuccess("youRegistered.php");

// 		} else {
// 			$errors['message'] = "Invalid username or password.";

// 			redirectError("login.php", $errors, $presets);
// 		}
// 	} catch (Exception $e) {
// 		echo $e->getMessage();

// 		$errors['message'] = "Something went wrong.";
// 		redirectError("login.php", $errors, $presets);
// 	}	
// }else{
// 	redirectError("login.php", $errors, $presets);
// }

?>




