<?php
/**
* Class to represent all assessment related information in an Assessment object
*/
class Assessment {

	var $assessmentID;
	var $criteria;
	var $comment;
	var $grade;

	function __construct($assessmentID, $criteria, $comment, $grade){
		$this->assessmentID = $assessmentID;
		$this->criteria = $criteria;
		$this->comment = $comment;
		$this->grade = $grade;
	}

	// Getter methods
	function getAssessmentID(){
		return $this->assessmentID;
	}

	function getCriteria(){
		return $this->criteria;
	}

	function getComment(){
		return $this->comment;
	}

	function getGrade(){
		return $this->grade;
	}

	/**
	* Generation of SQL query for adding assessment details to "assessments" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO assessments (assessmentID, criteria, comment, grade) VALUES  ('$this->assessmentID', '$this->criteria', '$this->comment', '$this->grade');";
		return $query;
	}
}

?>