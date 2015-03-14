<?php

require_once("database.php");
require_once("database_object.php");

/**
* Class to represent all group related information in a Group object
*/
class Group extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='groups';
	protected static $dbFields = array('groupID', 'groupName', 'averageGrade', 'ranking');

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

	/**
	* Method that returns the number of groups in the table.
	*/
	public static function noGroups() {
		$allGroups = static::findAll();
		return sizeof($allGroups);
	}

  /**
	* Method that updates the ranking variables in all the groups in the table.
	*/
	public static function updateRank() {
		global $database;
		$sql = "SELECT * FROM ".static::$tableName;
		$sql .= " ORDER BY averageGrade DESC";
		$groupsByRank = static::findBySQL($sql);
		$i = 1;
		foreach ($groupsByRank as $group) {
		  $group->ranking = $i;
		  $group->save();
		  $i += 1;
		}
	}

	/**
	* Method that returns the total average grade of all the groups.
	*/
	public static function groupsAverageGrade() {
		$allGroups = static::findAll();
		$noGroups = sizeof($allGroups);
		if ($noGroups == 0) {
			return 0;
		} else {
			$totalAverage = 0;
			foreach ($allGroups as $group) {
				$totalAverage += $group->averageGrade;
			}
			$totalAverage = bcdiv($totalAverage, $noGroups, 3);
			return $totalAverage;
		}
	}
}

?>
