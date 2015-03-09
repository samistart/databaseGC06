<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all groupReportAssessment related information in a grou object
*/
class GroupReportAssessment extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='groupReportAssessments';
	protected static $db_fields = array('assessmentID', 'reportID', 'groupID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $assessmentID = "NULL";
	public $reportID;
	public $groupID;

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