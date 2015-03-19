<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');
  
require_once(SITE_ROOT.DS."includes/database.php");
require_once("database_object.php");

/**
* Class to represent all post related information in a Comment object
*/
class Comment extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='comments';
	protected static $dbFields = array('commentID', 'content', 'lastEdited', 'threadID', 'studentID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $commentID = "NULL";
  public $content;
	public $lastEdited = "CURRENT_TIMESTAMP";
	public $threadID;
	public $studentID;

  /**
  * Method that takes content, threadID and studentID as an arguments and builds a new 
  * comment with the corresponding values.
  */
  public static function build($content="", $threadID, $studentID) {
    if (!empty($content) && !empty($threadID) && !empty($studentID)) {
      $comment = new Comment();
      $comment->content = $content;
      $comment->threadID = $threadID;
      $comment->studentID = $studentID;
      return $comment;
    } else {
      return false;
    }
  }

  /**
  * Method that takes a threadID as an argument and returns the result to the query for finding
  * the comments it contains, ordered in ascending lastEdited.
  */
  public static function findCommentsOn($threadID) {
    global $database;
    $threadID = $database->escapeValue($threadID);
    $sql = "SELECT * FROM " .self::$tableName;
    $sql .= " WHERE threadID=".$threadID;
    $sql .= " ORDER BY lastEdited ASC";
    return self::findBySQL($sql);
  }

  /**
  * Method that returns the variable that corresponds to the primary key.
  */
  protected function getPk() {
    return $this->commentID;
  }

  /**
  * Method that updates the variable that corresponds to the primary key with
  * the value that is passed as an argument.
  */
  protected function setPk($value) {
    $this->commentID = $value;
  }
}
?>
