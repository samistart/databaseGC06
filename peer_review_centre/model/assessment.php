<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all assessment related information in a Assessment object
*/
class Assessment extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='assessments';
	protected static $db_fields = array('assessmentID', 'criteria', 'comment', 'grade');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $assessmentID = "NULL";
	public $criteria;
	public $comment;
	public $grade;


	/**
	*A constructor taking args for use in taking form data and create a new object.
	*/
	function __construct($criteria, $comment, $grade){
		
		$this->criteria = $criteria;
		$this->comment = $comment;
		$this->grade = $grade;
		//set the default value for groupId as 1 for now as a test (because there is only groupID 1 in the table)
		//assessmentId and lastEdited will be automatically filled out (AI and timestamp)
	}

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->assessmentID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->assessmentID = $value;
	}

}
?>