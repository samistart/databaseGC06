<?php
require_once("database.php");
/**
* Class to represent all administrator related information in an Admin object
*/
class Admin {

	protected static $table_name='admins';
	protected static $db_fields = array('adminID', 'firstName', 'lastName', 'email', 'password');

	public $adminID = "NULL";
	public $firstName;
	public $lastName;
	public $email;
	public $password;

	// Function that returns variable corresponding to the table's primary key 
	// (so we can identify rows in table)
	protected function getPk() {
		return $this->adminID;
	}

	protected function setPk($value) {
		$this->adminID = $value;
	}


	private static function instantiate($record) {
   		$object = new self;

		// Instantiates all the attributes in the class
		foreach($record as $attribute=>$value){
		  if($object->has_attribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}

	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name."");
	}

	public static function find_by_id($id=0) {
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE studentID={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
    	$object_array = array();
    	while ($row = $database->fetch_array($result_set)) {
      		$object_array[] = self::instantiate($row);
    	}
    	return $object_array;
	}

	protected function has_attribute($attribute) {
		$object_vars = $this->attributes();
		return array_key_exists($attribute, $object_vars);
	}

	protected function attributes() {
		$attributes = array();
		foreach (self::$db_fields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	public function save() {
		// Calls create() or update(), depening on whether database entry exists or not
		return isset($this->studentID) ? $this->update() : $this->create();
	}

	public function create() {
		global $database;
		$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($this->attributes()));
		$sql .= ") VALUES  ('";
		$sql .= join("', '", array_values($this->attributes()));
		$sql .= "');";
		echo $sql;
		// CURRENT_TIMESTAMP not working because it is passed between 's
		if($database->query($sql)) {
			$this->setPk($database->insert_id());
			return true;
		} else {
			return false;
		}
	}

	public function update() {
		global $database;
		$sql = "UPDATE ".self::$table_name." SET ";

		$attributes = $this->attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE ".self::$db_fields[0]."=" . $this->getPk();
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public function delete() {
		global $database;
		$sql = 	"DELETE FROM ".self::$table_name." ";
		$sql .= "WHERE ".self::$db_fields[0]."=". $this->getPk();
		$sql .= " LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

}

?>