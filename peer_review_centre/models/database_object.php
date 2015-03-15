<?php

require_once("../includes/database.php");

/**
* Class that holds the structure for all the "table classes"
*/
abstract class DatabaseObject {

	// These need to be set only in the subclasses: leaving them here because of nostalgia.
	// protected static $tableName;
	// protected static $dbFields;

	// Methods that should be overridden in all the child classes
	protected abstract function getPk();
	protected abstract function setPk($value);

	/**
	* Method that instantiates an object with 
	*/
	private static function instantiate($record) {
   	$object = new static;

		// Instantiates all the attributes in the class
		foreach($record as $attribute=>$value) {
		  if ($object->hasAttribute($attribute)) {
		    $object->$attribute = $value;
		  }
		}
		return $object;
	}

	/**
	* Method that returns all the entries of the table.
	*/
	public static function findAll() {
		return static::findBySQL("SELECT * FROM ".static::$tableName."");
	}

	/**
	* Method that takes an id number and returns the corresponding table entry.
	*/
	public static function findByID($id=0) {
		$resultArray = static::findBySQL("SELECT * FROM ".static::$tableName." WHERE ".static::$dbFields[0]."={$id} LIMIT 1");
		return !empty($resultArray) ? array_shift($resultArray) : false;
	}

	/**
	* Method that takes a string containing a query and returns the corresponding entries found.
	*/
	public static function findBySQL($sql="") {
		global $database;
		$resultSet = $database->query($sql);
  	$objectArray = array();
  	while ($row = $database->fetchArray($resultSet)) {
    	$objectArray[] = static::instantiate($row);
  	}
  	return $objectArray;
	}

	/**
	* Method that returns true if the passed attribute exists in the class, and false otherwise.
	*/
	protected function hasAttribute($attribute) {
		$objectVars = $this->attributes();
		return array_key_exists($attribute, $objectVars);
	}

	/**
	* Method that creates and returns a hashtable with the key/value pairs for the corresponding
	* object.
	*/	
	protected function attributes() {
		$attributes = array();
		foreach (static::$dbFields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	/**
	* Method to get an objects attributes, clean and return them within an associative array.
	*/
	protected function cleanAttributes() {
		global $database;
		$cleanedAttributes = array();
		foreach($this->attributes() as $key => $value) {
			$cleanedAttributes[$key] = $database->escapeValue($value);
		}
		return $cleanedAttributes;
	}

	/**
	* Method that saves an entry into the corresponding table, by either calling the create() 
	* method if the database entry doesn't exist, or the update() method if it does.
	*/
	public function save() {
		// Calls create() or update(), depending on whether database entry exists or not
		return (null!==$this->getPk()) ? $this->update() : $this->create();
	}

	/**
	* Method that creates and inserts the table entry that corresponds to the current object.
	*/
	public function create() {
		global $database;
		// Construct the create query.
		$sql = "INSERT INTO ".static::$tableName." (";
		$sql .= join(", ", array_keys($this->cleanAttributes()));
		$sql .= ") VALUES  ('";
		$sql .= join("', '", array_values($this->cleanAttributes()));
		$sql .= "');";
		// Delete single quotes around CURRENT_TIMESTAMP values
		$sql = str_replace("'CURRENT_TIMESTAMP'","CURRENT_TIMESTAMP", $sql);
		// Sends the query to the database, returning true if succesful and false otherwise.
		if($database->query($sql)) {
			// Update id value of the current object
			$this->setPk($database->insertID());
			return true;
		} else {
			return false;
		}
	}

	/**
	* Method that updates the table entry that corresponds to the current object.
	*/
	public function update() {
		global $database;
		// Construct the update query.
		$sql = "UPDATE ".static::$tableName." SET ";
		// Calls the attributes method to get the corresponding key/value pairs for the object.
		$attributes = $this->cleanAttributes();
		$attributePairs = array();
		// Creates key/value assignments in strings
		foreach($attributes as $key => $value) {
			$attributePairs[] = "{$key}='{$value}'";
		}
		// Joins the string/value pair strings and adds them to the query
		$sql .= join(", ", $attributePairs);
		$sql .= " WHERE ".static::$dbFields[0]."=" . $this->getPk();
		// Delete single quotes around CURRENT_TIMESTAMP values
		$sql = str_replace("'CURRENT_TIMESTAMP'","CURRENT_TIMESTAMP", $sql);
		// Send query to database
		$database->query($sql);
		// Check whether a row has been affected to see if the query was successfull
		return ($database->affectedRows() == 1) ? true : false;
	}

	/**
	* Method that deletes the table entry that corresponds to the current object.
	*/
	public function delete() {
		global $database;
		// Construct the delete query.
		$sql = 	"DELETE FROM ".static::$tableName." ";
		$sql .= "WHERE ".static::$dbFields[0]."=". $this->getPk();
		$sql .= " LIMIT 1";
		// Send query to database
		$database->query($sql);
		// Check whether a row has been affected to see if the query was successfull
		return ($database->affectedRows() == 1) ? true : false;
	}
	
}
?>
