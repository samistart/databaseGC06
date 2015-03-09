<?php
require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all post related information in a Post object
*/
class Post extends DatabaseObject{

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='posts';
	protected static $db_fields = array('content', 'dateCreated', 'threadID', 'studentID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $content;
	public $dateCreated = "CURRENT_TIMESTAMP";
	public $threadID;
	public $studentID;

	//No primary key for this class

}
?>