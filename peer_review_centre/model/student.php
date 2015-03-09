<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all student related information in a Student object
*/
class Student extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='students';
	protected static $db_fields = array('studentID', 'firstName', 'lastName', 'email', 'password', 'lastActive', 'groupID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $studentID = "NULL";
	public $firstName;
	public $lastName;
	public $email;
	public $password;
	public $lastActive = "CURRENT_TIMESTAMP";
	public $groupID;

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->studentID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->studentID = $value;
	}

	//incomplete (almost pseudo-code) and needs changing
	static function login($email, $password){
		$query = "SELECT userID, username FROM User ";
		$query .= "WHERE username = '$username' AND ";
 		$query .=	"password = SHA('$password')";
		$data = mysqli_query($connection, $query);
		if (mysqli_num_rows($data) == 1) {
 			$row = mysqli_fetch_array($data);
 			setcookie('userID', $row['userID']);
 			setcookie('username', $row['username']);
 			$indexURL = 'http://' . $_SERVER['HTTP_HOST'] .
 			dirname($_SERVER['PHP_SELF']) . '/index.php';
 			header('Location: ' . $indexURL);
		} else {
 			echo ‘Invalid username or password, try again’;
		}

}
?>