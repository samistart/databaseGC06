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
	var $groupId;
	// Variables studentID and lastActive handled by sql

	function __construct($studentNumber, $firstName, $lastName, $email, $password){
		
		$this->studentNumber = $studentNumber;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->password = $password;
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

	function getGroupId(){
		return $this->groupId;
	}

	/**
	* Generation of SQL query for adding student details to "students" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		// Have put the groupId as '1' for now (non-dynamic) just as a test because we only have 1 group in DB
		$query = "INSERT INTO students (studentID, studentNumber, firstName, lastName, email, password, lastActive, groupID) VALUES  (NULL,'$this->studentNumber', '$this->firstName', '$this->lastName', '$this->email', '$this->password', CURRENT_TIMESTAMP, '1');";
		return $query;
	}

}

?>