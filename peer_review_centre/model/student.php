<?php
// This class will hopefully extend the databaseObject class, and will only have to define the
// getPk() and setPk() methods.

require_once("database.php");
/**
* Class to represent all student related information in a Student object
*/
class Student {

	// Name of the corresponding database table and fields are stored in static variables.
	// (will be common to every instance of the class)
	protected static $table_name='students';
	protected static $db_fields = array('studentID', 'firstName', 'lastName', 'email', 'password', 'lastActive', 'groupID');

	// Variables that correspond to the fields of the corresponding table, that will be given values
	// for each object (creating the corresponding table entry)
	public $studentID = "NULL";
	public $firstName;
	public $lastName;
	public $email;
	public $password;
	public $lastActive = "CURRENT_TIMESTAMP";
	public $groupID;

	/**
	* Method that returns the variable that corresponds to the primary key.
	*/
	protected function getPk() {
		return $this->studentID;
	}

	/**
	* Method that updates the variable that corresponds to the primary key with
	* the value that is passed as an argument.
	*/
	protected function setPk($value) {
		$this->studentID = $value;
	}

// METHODS THAT ARE COMMON TO ALL DATABASE OBJECTS - CAN BE REUSED IN ALL CLASSES

	/**
	* Method that instantiates an object with 
	*/
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

	/**
	* Method that returns all the entries of the table.
	*/
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name."");
	}

	/**
	* Method that takes an id number and returns the corresponding table entry.
	*/
	public static function find_by_id($id=0) {
		$result_array = self::find_by_sql("SELECT * FROM ".self::$table_name." WHERE studentID={$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}

	/**
	* Method that takes a string containing a query and returns the corresponding entries found.
	*/
	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
    	$object_array = array();
    	while ($row = $database->fetch_array($result_set)) {
      		$object_array[] = self::instantiate($row);
    	}
    	return $object_array;
	}

	/**
	* Method that returns true if the passed attribute exists in the class, and false otherwise.
	*/
	protected function has_attribute($attribute) {
		$object_vars = $this->attributes();
		return array_key_exists($attribute, $object_vars);
	}

	/**
	* Method that creates and returns a hashtable with the key/value pairs for the corresponding
	* object.
	*/	
	protected function attributes() {
		$attributes = array();
		foreach (self::$db_fields as $field) {
			if(property_exists($this, $field)) {
				$attributes[$field] = $this->$field;
			}
		}
		return $attributes;
	}

	/**
	* Method that saves an entry into the corresponding table, by either calling the create() 
	* method if the database entry doesn't exist, or the update() method if it does.
	*/
	public function save() {
		// Calls create() or update(), depending on whether database entry exists or not
		return isset($this->studentID) ? $this->update() : $this->create();
	}

	/**
	* Method that creates and inserts the table entry that corresponds to the current object.
	*/
	public function create() {
		global $database;
		// Construct the create query.
		$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($this->attributes()));
		$sql .= ") VALUES  ('";
		$sql .= join("', '", array_values($this->attributes()));
		$sql .= "');";
		// Delete single quotes around CURRENT_TIMESTAMP values
		$sql = str_replace("'CURRENT_TIMESTAMP'","CURRENT_TIMESTAMP", $sql);
		// Sends the query to the database, returning true if succesful and false otherwise.
		if($database->query($sql)) {
			// Update id value of the current object
			$this->setPk($database->insert_id());
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
		$sql = "UPDATE ".self::$table_name." SET ";
		// Calls the attributes method to get the corresponding key/value pairs for the object.
		$attributes = $this->attributes();
		$attribute_pairs = array();
		// Creates key/value assignments in strings
		foreach($attributes as $key => $value) {
			$attribute_pairs[] = "{$key}='{$value}'";
		}
		// Joins the string/value pair strings and adds them to the query
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE ".self::$db_fields[0]."=" . $this->getPk();
		// Send query to database
		$database->query($sql);
		// Check whether a row has been affected to see if the query was successfull
		return ($database->affected_rows() == 1) ? true : false;
	}

	/**
	* Method that deletes the table entry that corresponds to the current object.
	*/
	public function delete() {
		global $database;
		// Construct the delete query.
		$sql = 	"DELETE FROM ".self::$table_name." ";
		$sql .= "WHERE ".self::$db_fields[0]."=". $this->getPk();
		$sql .= " LIMIT 1";
		// Send query to database
		$database->query($sql);
		// Check whether a row has been affected to see if the query was successfull
		return ($database->affected_rows() == 1) ? true : false;
	}
}
?>