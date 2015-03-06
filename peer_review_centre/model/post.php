<?php
/**
* Class to represent all post related information in a Post object
*/
class Post {

	var $content;
	var $threadID;
	var $studentID;
	// Variable dateCreated handled by sql

	function __construct($content, $threadID, $studentID){
		
		$this->content = $content;
		$this->threadID = $threadID;
		$this->studentID = $studentID;
	}

	// Getter methods
	function getContent(){
		return $this->content;
	}

	function getThreadID(){
		return $this->threadID;
	}

	function getStudentID(){
		return $this->studentID;
	}

	/**
	* Generation of SQL query for adding post details to "posts" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO posts (content, dateCreated, threadID, studentID) VALUES  ('$content', CURRENT_TIMESTAMP, '$this->threadID', '$this->studentID');";
		return $query;
	}
}

?>