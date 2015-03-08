<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all aministrator related information in an Admin object
*/
class Admin extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='admins';
	protected static $db_fields = array('adminID', 'firstName', 'lastName', 'email', 'password');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $adminID = "NULL";
	public $firstName;
	public $lastName;
	public $email;
	public $password;

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->adminID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->adminID = $value;
	}
}
?>