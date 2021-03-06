<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');
  
require_once(SITE_ROOT.DS."includes/database.php");
require_once("database_object.php");

/**
* Class to represent all student related information in a Student object
*/
class Student extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='students';
	protected static $dbFields = array('studentID', 'firstName', 'lastName', 'email', 'password', 'lastActive', 'groupID');

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
  * Method that returns a string with the full name of the student.
  */
  public function fullName() {
    return $this->firstName." ".$this->lastName;
  }

	/**
	* Method that returns a string with the full name of the student.
	*/
	public function reverseFullName() {
		return $this->lastName.", ".$this->firstName;
	}

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	public function getPk() {
		return $this->studentID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->studentID = $value;
	}

  //Author: Sami Start
	public static function authenticate($email="", $password="") {
    global $database;
    $email = $database->escapeValue($email);
    $password = $database->escapeValue($password);

    $sql  = "SELECT * FROM students ";
    $sql .= "WHERE email = '{$email}' ";
    $sql .= "LIMIT 1;";
    $resultArray = self::findBySQL($sql);
    if ($resultArray==NULL) {
      global $session;
      require_once('../../includes/initialise_student.php');
      $session->errorMessage("Incorrect email or password.");
      redirectTo("views/prc_student/students/login.php");
    }

    $newStudent = $resultArray[0];
    
    if (password_verify($password, $newStudent->password)) {
      return !empty($resultArray) ? array_shift($resultArray) : false;
    } else {
      return false;
    }

  }

  /**
  * Method that returns all the students ordered alphabetically (by last name).
  */
  public static function findAllOrdered() {
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " ORDER BY lastName ASC";
    return self::findBySQL($sql);
  }

  /**
  * Method that returns the students in a given group.
  */
  public static function findStudentsOn($groupID) {
    global $database;
    $groupID = $database->escapeValue($groupID);
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " WHERE groupID=".$groupID;
    return self::findBySQL($sql);
  }

  /**
  * Method that returns the teammates of the current student.
  */
  public function findTeamMates() {
    global $database;
    $groupID = $database->escapeValue($this->groupID);
    $studentID = $database->escapeValue($this->studentID);
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " WHERE groupID=".$groupID;
    $sql .= " AND studentID!=".$studentID;
    return self::findBySQL($sql);
  }

}
?>
