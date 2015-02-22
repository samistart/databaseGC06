<?php
/**
* Class to represent all administrator related information in an Admin object
*/
class Admin {

	var $firstName;
	var $lastName;
	var $email;
	var $password;
	// Variable adminID will be handled by sql (automatically generated)

	function __construct($firstName, $lastName, $email, $password){
		
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->password = $password;
		echo "admin object created <br>";
	}

	// Getter methods
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

	/**
	* Generation of SQL query for adding student details to "students" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO admins (firstName, lastName, email, password) VALUES  ('$this->firstName', '$this->lastName', '$this->email', '$this->password');";
		return $query;
	}

}

?>