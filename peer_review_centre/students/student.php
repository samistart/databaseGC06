<?php
/**
* Class to represent all student related information in a Student object
*/
class Student {

	var $studentNumber;
	var $firstName;
	var $lastName;
	var $email;
	var $password;
	var $groupID;
	// Variables studentID and lastActive handled by sql

	function __construct($studentNumber, $firstName, $lastName, $email, $password, $groupID){
		
		$this->studentNumber = $studentNumber;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->password = $password;
		$this->groupID = $groupID;
	}

	// Getter methods
	function getStudentNumber(){
		return $this->studentNumber;
	}

	function getFirstName(){
		return $this->firstName;
	}

	function getLastName(){
		return $this->lastName;
	}

	function getEmail(){
		return $this->email;
	}

	function getPassword(){
		return $this->password;
	}

	function getGroupID(){
		return $this->groupID;
	}

	/**
	* Generation of SQL query for adding student details to "students" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO students (studentID, studentNumber, firstName, lastName, email, password, lastActive, groupID) VALUES  (NULL,'$this->studentNumber', '$this->firstName', '$this->lastName', '$this->email', '$this->password', CURRENT_TIMESTAMP, '$this->groupID');";
		return $query;
	}
}

?>