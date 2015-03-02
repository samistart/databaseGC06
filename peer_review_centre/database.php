<?php
require_once("config.php");

class MySQLDatabase {

	private $connection;

	function __construct() {
		$this->open_connection();
	}

	public function open_connection() {
		// Establish a connection using mysqli extension API method (improved version of mysql)
		$this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		// Check connection
		if ($this->connection->connect_error) {
		    die("Connection failed: " . $this->connection->connect_error);
		} else {
			echo "Connection successful </br>";
		}
	}

	public function close_connection() {
		if(isset($this->connection)) {
			$this->connection->close();
			unset($this->connection);
		}
	}

	public function query($sql) {
		$result = $this->connection->query($sql);
		if (!$result) {
			die("Database query failed: " . $this->connection->connect_error);
		}
		return $result;
	}

	// Some functions that will make our code reusable by avoiding the
	// use of mysql-specific functions outside of this class
	public function fetch_array($result_set) {
		return mysqli_fetch_array($result_set);
	}

	public function num_rows($result_set) {
		return mysqli_num_rows($result_set);
	}

	public function insert_id() {
		return mysqli_insert_id($this->connection);
	}

	public function affected_rows() {
		return mysqli_affected_rows($this->connection);
	}

}

$database = new MySQLDatabase();

?>