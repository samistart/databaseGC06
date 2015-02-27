<?php
/**
* Class to represent all thread related information in a Thread object
*/
class Thread {

	var $title;
	var $forumID;
	// Variables threadID and dateCreated handled by sql

	function __construct($title, $forumID){
		
		$this->title = $title;
		$this->forumID = $forumID;
	}

	// Getter methods
	function getTitle(){
		return $this->title;
	}

	function getForumID(){
		return $this->forumID;
	}

	/**
	* Generation of SQL query for adding thread details to "threads" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO threads (threadID, title, dateCreated,forumID) VALUES  (NULL,'$this->title', CURRENT_TIMESTAMP, '$this->forumID');";
		return $query;
	}
}

?>