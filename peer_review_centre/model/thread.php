<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all thread related information in a Thread object
*/
class Thread extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='threads';
	protected static $db_fields = array('threadID', 'title', 'dateCreated', 'forumID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $threadID = "NULL";
	public $title;
	public $dateCreated = "CURRENT_TIMESTAMP";
	public $forumID;

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->threadID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->threadID = $value;
	}

}
?>