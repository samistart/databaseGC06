<?php
// This class will hopefully extend the databaseObject class, and will only have to define the
// getPk() and setPk() methods.

require_once("database.php");
require_once("databaseObject.php");
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

}
?>