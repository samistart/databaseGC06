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

	public static function authenticate($email="", $password="") {
    global $database;
    //TO DO: UNCOMMENT THESE LINES ONCE AXEL HAS MADE ESCAPE_VALUE
    // $email = escape_value($email);
    // $password = escape_value($password);

    $sql  = "SELECT * FROM students ";
    $sql .= "WHERE email = '{$email}' ";
    $sql .= "LIMIT 1";
    $result_array = self::find_by_sql($sql);
    echo "<br> email of result array is: ";
    echo "<br>Var dump of the result array: ";
    var_dump($result_array);
    echo "<br>array shift of result array is: ";
    var_dump(array_shift($result_array));
		return !empty($result_array) ? array_shift($result_array) : false;
	}

}
?>