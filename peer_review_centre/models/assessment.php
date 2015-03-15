<?php

require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all assessment related information in a Assessment object
*/
class Assessment extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='assessments';
	protected static $dbFields = array('assessmentID', 'groupID', 'reportID', 'criteria1', 'comment1', 'grade1', 'criteria2', 'comment2', 'grade2', 'criteria3', 'comment3', 'grade3');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $assessmentID = "NULL";
	public $groupID;
	public $reportID;
	public $criteria1;
	public $comment1;
	public $grade1;
	public $criteria2;
	public $comment2;
	public $grade2;
	public $criteria3;
	public $comment3;
	public $grade3;

	/**
	* Find all assessements that a group has to do of other group reports.
	*/
	public static function findByGroupID($groupID) {
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " WHERE groupID=".$groupID;
    $sql .= " ORDER BY groupID ASC";
    return self::findBySQL($sql);
  }

  /**
  * Find all assessements that a group received from other groups.
  */
  public static function findByReportID($reportID) {
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " WHERE reportID=".$reportID;
    $sql .= " ORDER BY groupID ASC";
    return self::findBySQL($sql);
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
