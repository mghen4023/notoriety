<?php

define("DB_SERVER", "db383239122.db.1and1.com" );
define("DB_USER", "dbo383239122");
define("DB_PASS", "PennApps");
define("DB_NAME", "db383239122");

//MIKE GHEN
// exxectue querys: $result = $database->query($sql);
// fetch results in an array: $resultSet = $database->fetch_array($sql);

class MySQLDatabase {
	
	private $connection;
	public $last_query;
	
	//This just opens a connection
	function __construct() {
		$this->open_connection();
	}

	//This function opens the connection to MySQL 
	//it is called in the __construct()
	public function open_connection() {
		// 1. Create a database connection
		$this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
		if (!$this->connection) {
			die("Database connection failed: " . mysql_error());
		}else {
			$db_select = mysql_select_db(DB_NAME, $this->connection);
			if (!$db_select) {
				die("Database selection failed: " . mysql_error());
			}
		}
	}

	//This just closes the connection 
	public function close_connection(){
		// 5. Close connection
		if(isset($this->connection)) {
			mysql_close($this->connection);
			unset($this->connection);
		}
	}

	//This will do querys and will retrun the result if 
	//query was successfull
	public function query($sql) {
		$this->last_query = $sql;
		$result = mysql_query($sql, $this->connection);
		$this->confirm_query($result);
		return $result;
	}

	
	//This fetchs the mysql array and puts it into a php array
	public function fetch_array($result) {
		return mysql_fetch_array($result);
	}
	
	//This will return the number of rows
	public function num_rows($result){
		return mysql_num_rows($result);
	}
	
	//Confirms queries, is called in query()
	private function confirm_query($result) {
	if (!$result) {
		$output = "Database query failed: " . mysql_error() . "<br />";
		$output.= "Last SQL Query: ".$this->last_query;
		die($output);
	}
}
}

$database = new MySQLDatabase();

?>