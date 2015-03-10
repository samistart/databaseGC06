<?php
require_once("config.php");

/**
* Class that holds all the database-related information and operations.
*/
class MySQLDatabase {

	private $connection;
	
	/**
	* Constructor automatically opens the connection when a database is instantiated
	*/
	function __construct() {
		$this->open_connection();
	}

	/**
	* Method that opens a connection with the specified database.
	*/
	public function open_connection() {
		// Establish a connection using mysqli extension API method (improved version of mysql)
		// Takes the database details from the config file.
		$this->connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		// Check connection and return the corresponding success/failure message.
		if ($this->connection->connect_error) {
		    die("Connection failed: " . $this->connection->connect_error);
		} else {
			//I have taken out this line of code as it is setting a header
			//and causing problems with my redirect. Sami
			// echo "Connection successful </br>";
		}
	}

	/**
	* Method that closes a connection with the specified database.
	*/
	public function close_connection() {
		if(isset($this->connection)) {
			$this->connection->close();
			unset($this->connection);
		}
	}

	/**
	* Method that takes a string containing an SQL query and sends it to the database. Will
	* return either the result of the query or a failure message.
	*/
	public function query($sql) {
		$result = $this->connection->query($sql);
		if (!$result) {
			die("Database query failed: " . $this->connection->connect_error);
		}
		return $result;
	}

	// Some functions that will make our code reusable by avoiding the use of mysql-specific
	// functions outside of this class (this way it will be easily extendable to different 
	// kinds of databases)
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