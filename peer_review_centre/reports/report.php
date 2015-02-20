<?php

echo "start of the report code <br>";
/**
* Class to represent all report related information in a Report object
*/
class report {

	
	var $title;
	var $abstract;
	var $content;
	var $groupId;

	function __construct($title, $abstract, $content){
		echo "started constructor code <br>";
		$this->title = $title;
		$this->abstract = $abstract;
		$this->content = $content;
		//set the default value for groupId as 1 for now as a test (because there is only groupID 1 in the table)
		//reportId and lastEdited will be automatically filled out (AI and timestamp)
	}


	//getter methods
	function getTitle(){
		return $this->title;
	}

	function getAbstract(){
		return $this->abstract;
	}

	function getContent(){
		return $this->content;
	}

	function getGroupId(){
		return $this->groupId;
	}

	/**
	* Generation of SQL query for adding student details to "students" table
	*/
	function createInsertQuery(){
		//create a string that is a MYSQL INSERT query
		//have put the groupId as '1' for now (non-dynamic) just as a test because we only have 1 group in DB
		$query = "INSERT INTO `peerReviewCentre`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) VALUES (NULL, '$this->title', '$this->abstract', '$this->content', CURRENT_TIMESTAMP, '1');";
		//check the query for debugging purposes
		echo "the insert query is: ".$query."<br>";
		return $query;

//test simple query
//return 'INSERT INTO `peerReviewCentre`.`reports` (`reportID`, `title`, `abstract`, `content`, `lastEdited`, `groupID`) VALUES (NULL, \'test title\', \'test abstract\', \'test content\', CURRENT_TIMESTAMP, \'1\')';
//Example from Kartik's team's code
//return 'INSERT INTO students(email, firstName, lastName, password)
		 //VALUES ("'.$this->email.'","'.$this->firstName.'","'.$this->lastName.'","'.$this->password.'")';
	}

}

?>