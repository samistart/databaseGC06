<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');
  
require_once(SITE_ROOT.DS."includes/database.php");
require_once("database_object.php");

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
  * Method that returns a string with the full name of the student.
  */
  public function fullName() {
    return $this->firstName." ".$this->lastName;
  }

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
      require_once('../../includes/initialise_admin.php');
    	$session->errorMessage("That email has not been registered for an admin account.");
      redirectTo("views/prc_admin/admins/login.php");
    }
    $newAdmin = $resultArray[0];

    if (password_verify($password, $newAdmin->password)) {
      return !empty($resultArray) ? array_shift($resultArray) : false;
    } else {
      return false;
    }

  }
}
?>
