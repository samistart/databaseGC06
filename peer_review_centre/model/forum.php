<?php

require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all forum related information in a Forum object
*/
class Forum extends DatabaseObject {

    // Name of the corresponding database table and fields are stored in static variables.
    // (will be common to every instance of the class)
    protected static $tableName='forums';
    protected static $dbFields = array('forumID', 'groupID');

    // Variables that correspond to the fields of the corresponding table, that will be given values
    // for each object (creating the corresponding table entry)
    public $forumID = "NULL";
    public $groupID;

    /**
    * Method that takes a groupID as an argument and builds a new forum for said group.
    */
    public static function build($groupID) {
        if (!empty($groupID)) {
            $forum = new Forum();
            $forum->groupID = $groupID;
            return $forum;
        } else {
            return false;
        }
    }

    /**
    * Method that takes a groupID as an argument and returns the result to the query for finding
    * the forum associated to it.
    */
    public static function findForumsOn($groupID) {
        $sql = "SELECT * FROM " .self::$tableName;
        $sql .= " WHERE groupID=".$groupID;
        return self::find_by_sql($sql);
    }

    /**
    * Method that returns the variable that corresponds to the primary key.
    */
    protected function getPk() {
        return $this->forumID;
    }

    /**
    * Method that updates the variable that corresponds to the primary key with
    * the value that is passed as an argument.
    */
    protected function setPk($value) {
        $this->forumID = $value;
    }

}
?>
