<?php

require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all thread related information in a Thread object
*/
class Thread extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName = 'threads';
	protected static $dbFields = array('threadID', 'title', 'content', 'lastEdited', 'forumID', 'studentID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $threadID = "NULL";
	public $title;
	public $content;
	public $lastEdited = "CURRENT_TIMESTAMP";
	public $forumID;
	public $studentID;

  /**
  * Method that takes forumID, studentID, title and content as an arguments and builds a new thread 
  * with the corresponding values.
  */
  public static function build($forumID, $studentID, $title="", $content="") {
  	// Checks that all the arguments where 
    if (!empty($forumID) && !empty($studentID) && !empty($title) && !empty($content)) {
      $thread = new Thread();
      $thread->forumID = $forumID;
      $thread->studentID = $studentID;
      $thread->title = $title;
      $thread->content = $content;
      return $thread;
    } else {
        return false;
    }
  }

  /**
  * Method that takes a forumID as an argument and returns the result to the query for finding
  * the threads it contains, ordered in ascending lastEdited.
  */
  public static function findThreadsOn($forumID) {
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " WHERE forumID=".$forumID;
    $sql .= " ORDER BY lastEdited ASC";
    return self::findBySQL($sql);
  }

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	public function getPk() {
		return $this->threadID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	public function setPk($value) {
		$this->threadID = $value;
	}
}
?>
