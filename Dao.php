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

	public function getAllProducts(){
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT * FROM products");
		return $stmt->fetchAll();
	}

	public function getProduct($id) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM products WHERE product_id = :id");
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function addToCart($user_id, $product_id, $orderNum, $size = NULL){
		$conn = $this->getConnection();
		$stmt = $conn->prepare("INSERT INTO shoppingCart (user_id, product_id, quantity, size) VALUES(:user_id, :product_id, :orderNum, :size)");

		
		$stmt->bindParam(':user_id', $user_id);
		$stmt->bindParam(':product_id', $product_id);
		$stmt->bindParam(':orderNum', $orderNum);
		$stmt->bindParam(':size', $size);

		try {
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function getAllCart($user_id) {
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM shoppingCart WHERE user_id = :id");
		$stmt->bindParam(":id", $user_id);
		$stmt->execute();
		return $stmt->fetchAll();
	}


	public function removeFromCart($user_id){
		$conn = $this->getConnection();
		$stmt = $conn->prepare("DELETE FROM shoppingCart WHERE user_id = :user_id");
		$stmt->bindParam("user_id", $user_id);
		try {
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}
	/**
	 * Returns the database connection status string.
	 */
	public function getConnectionStatus()
	{
		$conn = $this->getConnection();
		return $conn->getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));
	}

	public function validateUser($email, $password){
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT user_id, password, username FROM users WHERE email = :email");

		$stmt->bindParam(':email', $email);
		$stmt->execute();

		if(($user = $stmt->fetch())) {
			$digest = $user['password'];
			if(password_verify($password, $digest)) {
				return array('name' => $user['username'], 'id' => $user['user_id']);
			}
		}
		return false;
	}

	public function getUsernameList()
	{
		$conn = $this->getConnection();
		$stmt = $conn->query("SELECT username FROM users");
		return $stmt->fetchAll();
	}
	public function userExists($username)
	{
		if($this->getUser($username)) {
			return true;
		} else {
			return false;
		}
	}

	public function addUser($email, $password, $name)
	{
		$conn = $this->getConnection();

		$digest = password_hash($password, PASSWORD_DEFAULT);
		if(!$digest) {
			throw new Exception("Passowrd could not be hashed.");
		}

		$query = "INSERT INTO users(email, password, username) VALUES(:uemail, :upassword, :uname);";

		$stmt = $conn->prepare($query);
		$stmt->bindParam(':uemail', $email);
		$stmt->bindParam(':upassword', $digest);
		$stmt->bindParam(':uname', $name);

		try {
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			echo $e->getMessage();
			return false;
		}
	}

	public function getUser($username)
	{
		$conn = $this->getConnection();
		$stmt = $conn->prepare("SELECT * FROM users WHERE username = :uname");
		$stmt->bindParam(":uname", $username);
		$stmt->execute();
		return $stmt->fetch();
	}
}