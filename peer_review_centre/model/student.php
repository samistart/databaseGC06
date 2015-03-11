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
	* Method that returns a string with the full name of the student.
	*/
	public function fullName() {
		return $this->firstName." ".$this->lastName;
	}

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

  //Author: Sami Start
	public static function authenticate($email="", $password="") {
    global $database;
    //TO DO: UNCOMMENT THESE LINES ONCE AXEL HAS MADE ESCAPE_VALUE (written by Sami)
    // $email = escape_value($email);
    // $password = escape_value($password);

    $sql  = "SELECT * FROM students ";
    $sql .= "WHERE email = '{$email}' ";
    $sql .= "LIMIT 1;";
    $resultArray = self::find_by_sql($sql);
    $newStudent = $resultArray[0];
    //You need to take the first 61 chars of the hash and salt
    // see http://stackoverflow.com/questions/27610403/php-password-verify-not-working-with-database
    // TODO this is liable to change so is a bad (tempoary) bug fix
    $newStudent->password = substr( $newStudent->password, 0, 60 );
    if (password_verify($password, $newStudent->password)) {
        return !empty($resultArray) ? array_shift($resultArray) : false;
    }
    else{
      return false;
    }

		
	}

}
?>