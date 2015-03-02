<?php
require_once("../database.php");
/**
* Class to represent all student related information in a Student object
*/
class Student {
	public $studentID;
	public $firstName;
	public $lastName;
	public $email;
	public $password;
	public $lastActive;
	public $groupID;
	// Variables studentID and lastActive handled by sql

	private static function instantiate($record) {
		// Could check that $record exists and is an array
   		$object = new self;
	
     	$object->studentID = $record['studentID'];
		$object->firstName = $record['firstName'];
		$object->lastName = $record['lastName'];
		$object->email = $record['email'];
		$object->password = $record['password'];
		$object->lastActive = $record['lastActive'];
		$object->groupID = $record['groupID'];
		
		// More dynamic, short-form approach:
		// foreach($record as $attribute=>$value){
		//   if($object->has_attribute($attribute)) {
		//     $object->$attribute = $value;
		//   }
		// }
		return $object;
	}

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM students");
	}

	public static function find_by_id($id=0) {
		$result_array = self::find_by_sql("SELECT * FROM students WHERE studentID={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
    	$object_array = array();
    	while ($row = $database->fetch_array($result_set)) {
      		$object_array[] = self::instantiate($row);
    	}
    	return $object_array;
	}

	public function create() {
		global $database;
		$sql = "INSERT INTO students (";
		$sql .= "studentID, firstName, lastName, email, password, lastActive, groupID";
		$sql .= ") VALUES  (";
		$sql .= "NULL, '";
		$sql .= "$this->firstName', '";
		$sql .= "$this->lastName', '";
		$sql .= "$this->email', '";
		$sql .= "$this->password', ";
		$sql .= "CURRENT_TIMESTAMP, '";
		$sql .= "$this->groupID');";
		if($database->query($sql)) {
			$this->studentID = $database->insert_id();
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;
		$sql = "UPDATE students SET ";
		$sql .= "firstName='". $this->firstName . "', ";
		$sql .= "lastName='". $this->lastName . "', ";
		$sql .= "email='". $this->email . "', ";
		$sql .= "password='". $this->password . "', ";
		$sql .= "lastActive= CURRENT_TIMESTAMP, ";
		$sql .= "groupID='". $this->groupID . "' ";
		$sql .= "WHERE studentID=" . $this->studentID;
		//$sql = "UPDATE `GC06`.`students` SET `firstName` = 'workkkkkk' WHERE `students`.`studentID` = 3;";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		$sql = 	"DELETE FROM students ";
		$sql .= "WHERE studentID=". $this->studentID;
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
}
?>