<?php

require_once("database.php");
require_once("database_object.php");
require_once('../includes/initialise_admin.php');

/**
* Class to represent all administrator related information in an Admin object
*/
class Admin extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='admins';
	protected static $dbFields = array('adminID', 'firstName', 'lastName', 'email', 'password');

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
	public function getPk() {
		return $this->adminID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->adminID = $value;
	}

	  //Author: Sami Start
	public static function authenticate($email="", $password="") {
		global $database;
    $email = $database->escapeValue($email);
    $password = $database->escapeValue($password);

    $sql  = "SELECT * FROM admins ";
    $sql .= "WHERE email = '{$email}' ";
    $sql .= "LIMIT 1;";
    $resultArray = self::findBySQL($sql);
    if ($resultArray==NULL) {
    	global $session;
    	$session->message("That email has not been registered for an admin account.");
      header("Location: ../view/login_admin.php");
      exit();
    }
    $newAdmin = $resultArray[0];

    if (password_verify($password, $newAdmin->password)) {
      return !empty($resultArray) ? array_shift($resultArray) : false;
    } else {
      echo "passwords don't match";
      return false;
    }

  }
}
?>
