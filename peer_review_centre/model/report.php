<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all report related information in a Report object
*/
class Report extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='reports';
	protected static $dbFields = array('reportID', 'title', 'abstract', 'content', 'dateCreated', 'groupID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $reportID = "NULL";
	public $title;
	public $abstract;
	public $content;
	public $dateCreated = "CURRENT_TIMESTAMP";
	public $groupID;

	/**
	*A constructor taking args for use in taking form data and create a new object.
	*/
	function __construct($title, $abstract, $content){
		
		$this->title = $title;
		$this->abstract = $abstract;
		$this->content = $content;
		//set the default value for groupId as 1 for now as a test (because there is only groupID 1 in the table)
		//reportId and lastEdited will be automatically filled out (AI and timestamp)
	}

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->reportID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->reportID = $value;
	}

}
?>