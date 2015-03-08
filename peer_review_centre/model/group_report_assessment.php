<?php
/**
* Class to represent all groupReportAssessment related information in a GroupReportAssessment object
*/
class GroupReportAssessment {

	var $reportID;
	var $groupID;
	// Variable assessmentID handled by sql

	function __construct($reportID, $groupID){
		$this->reportID = $reportID;
		$this->groupID = $groupID;
	}

	// Getter methods
	function getReportID(){
		return $this->reportID;
	}

	function getGroupID(){
		return $this->groupID;
	}

	/**
	* Generation of SQL query for adding groupReportAssessment details to "groupReportAssessment" table
	*/
	function createInsertQuery(){
		// Create a string that is a MYSQL INSERT query
		$query = "INSERT INTO groupReportAssessment (assessmentID, reportID, groupID) VALUES  (NULL, '$this->reportID', '$this->groupID');";
		return $query;
	}
}

?>