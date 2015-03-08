<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all group related information in a Group object
*/
class Group extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='groups';
	protected static $db_fields = array('groupID', 'groupName', 'averageGrade', 'ranking');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $groupID = "NULL";
	public $groupName;
	public $averageGrade;
	public $ranking;

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->groupID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->groupID = $value;
	}

}
?>