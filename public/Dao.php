<?php
require_once("../database/config.php");
//require_once('includes/password_compat/lib/password/php');
class Dao
{
	/**
	 * Creates and returns a PDO connection using the database connection
	 * url specified in the CLEARDB_DATABASE_URL environment variable.
	 */
	private function getConnection()
	{
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$host = $url["host"];
		$db   = substr($url["path"], 1);
		$user = $url["user"];
		$pass = $url["pass"];

		$conn = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);

		// Turn on exceptions for debugging. Comment this out for
		// production or make sure to use try-catch statements.
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conn; 
	}

	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}

		public function getEmployee($em_id)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM employees WHERE em_id = :em_id");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getBenefits($em_id)
	{
		$conn = $this->getConnection();
		$numDependents = $this->getDependents($em_id);
		$numADependents = $this->numADependents($em_id);
		$isA = $this->isA($em_id);

		$employeeBenefit = 1000;
		$depBenefit = 500;
		$aDiscount = 0.1;
		$paycheck = 2000;
		$numPaychecks = 26;


		$totalCost = ($employeeBenefit - ($isA * $aDiscount * $employeeBenefit)) +
						($numDependents * $depBenefit - ($numADependents * $aDiscount * $depBenefit));
		return $totalCost;
	}

	public function getDependents($em_id) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT COUNT(dep_first_name) FROM dependents WHERE em_id = :em_id");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getADependents($em_id) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT COUNT(dep_first_name) FROM dependents WHERE em_id = :em_id AND dep_first_name LIKE 'a%'");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function isA($em_id){
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT em_id FROM employees WHERE em_first_name LIKE 'a%'
								AND em_id = :em_id");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();

		if(($em_id = $stmt->fetch())) {
			// $digest = $user['password'];
				return 1;
		}
		return 0;
		// return $stmt->fetch();
	}

	public function validateUser($em_id){
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM employees WHERE em_id = :em_id");

		$stmt->bindParam(':em_id', $em_id);
		$stmt->execute();

		if(($user = $stmt->fetch())) {
			$digest = $user['password'];
			if(password_verify($password, $digest)) {
				return array('name' => $user['username'], 'id' => $user['user_id']);
			}
		}
		return false;
	}
}