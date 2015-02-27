<?php
/**
* Class to represent all group related information in a Group object
*/
class Group {

	var $groupName;
	var $averageGrade;
	var $ranking;
	// Variable groupID is handled by sql

	function __construct($groupName, $averageGrade, $ranking){	
		$this->groupName = $groupName;
		$this->averageGrade = $averageGrade;
		$this->ranking = $ranking;
	}

	// Getter methods
	function getGroupName(){
		return $this->groupName;
	}

	function getAverageGrade(){
		return $this->averageGrade;
	}

	function getRanking(){
		return $this->ranking;
	}

	/**
	* Generation of SQL query for adding student details to "groups" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO groups (groupID, groupName, averageGrade, ranking) VALUES  (NULL,'$this->groupName', '$this->averageGrade', '$this->ranking');";
		return $query;
	}
}

?>