<?php
require_once("../database/config.php");
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

	/**
	 * Returns the first and last name of employee with id $em_id.
	 */
	public function getEmployee($em_id)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT em_first_name, em_last_name FROM employees WHERE em_id = :em_id");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function getBenefits($em_id)
	{
		$conn = $this->getConnection();
		$numDependents = $this->getDependents($em_id);
		$numADependents = $this->getADependents($em_id);
		$isA = $this->isA($em_id);

		$employeeBenefit = 1000;
		$depBenefit = 500;
		$aDiscount = 0.1;
		$paycheck = 2000;
		$numPaychecks = 26;


		$totalCost = ($employeeBenefit - ($isA * $aDiscount * $employeeBenefit)) + ($numDependents["total"] * $depBenefit - ($numADependents["total"] * $aDiscount * $depBenefit));
		return $totalCost;
	}

	/**
	 * Returns the number of dependents of employee with id $em_id.
	 */
	public function getDependents($em_id) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM dependents WHERE em_id = :em_id");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();
		return $stmt->fetch();
	}

	/**
	 * Returns the number of dependents that start with 'a' of employee with id $em_id.
	 */
	public function getADependents($em_id) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT COUNT(*) AS total FROM dependents WHERE em_id = :em_id AND dep_first_name LIKE 'a%'");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();
		return $stmt->fetch();
	}

	/**
	 * Returns 1 if employee's name with id $em_id starts with 'a', else 0.
	 */
	public function isA($em_id){
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT em_id FROM employees WHERE em_first_name LIKE 'a%'
								AND em_id = :em_id");
		$stmt->bindParam(":em_id", $em_id);
		$stmt->execute();

		if(($em_id = $stmt->fetch())) {
				return 1;
		}
		return 0;
	}

	/**
	 * Adds a new employee to the database.
	 */
	public function addEmployee($em_first_name, $em_last_name){
		$conn = $this->getConnection();
		$query = "INSERT INTO employees (em_first_name, em_last_name) VALUES(:em_first_name, :em_last_name);";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':em_first_name', $em_first_name);
		$stmt->bindParam(':em_last_name', $em_last_name);

		try {
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
}