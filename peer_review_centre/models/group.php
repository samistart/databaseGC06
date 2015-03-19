<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER["DOCUMENT_ROOT"].DS.'databaseGC06'.DS.'peer_review_centre');
  
require_once(SITE_ROOT.DS."includes/database.php");
require_once("database_object.php");

/**
* Class to represent all group related information in a Group object
*/
class Group extends DatabaseObject {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $tableName='groups';
	protected static $dbFields = array('groupID', 'averageGrade', 'ranking');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $groupID = "NULL";
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
	* Method that finds and returns all groups ordered by ranking.
	*/
	public static function groupsByRank() {
		global $database;
		$sql = "SELECT * FROM ".static::$tableName;
		$sql .= " ORDER BY ranking ASC";
		return static::findBySQL($sql);
	}

  /**
	* Method that updates the ranking variables in all the groups in the table.
	*/
	public static function updateRank() {
		global $database;
		$sql = "SET @r=0; ";
		$database->query($sql);
		$sql = "UPDATE groups SET ranking= (@r:= @r+1) ORDER BY averageGrade DESC;";
		$database->query($sql);
	}

	/**
	* Gets all assignment grades and updates overall average grade.
	*/
	public function updateGrade() {
		global $database;

		$sql = "SELECT * FROM assessments";
		$sql .= " WHERE groupID =$this->groupID";
		$assessments = Assessments::findBySQL($sql);
		$avgGrade = 0;
		foreach ($assessments as $assmt) {
			$avgGrade += ($assmt->grade1 + $assmt->grade2 + $assmt->grade3) / 3;
		}
		$this->averageGrade = $avgGrade / sizeof($assessments);
		$this->update();
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
			$totalAverage = bcdiv($totalAverage, $noGroups, 2);
			return $totalAverage;
		}
	}
}

?>
