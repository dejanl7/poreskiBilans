<?php 

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBTABLE', 'poreski_bilans');

class Connection {
	public $db_connection;

	function __construct (){
		$this->connection();
	}

	// Set Up connection
	public function connection(){
		$this->db_connection = mysqli_connect('localhost', 'root', '', 'poreski_bilans');
		$this->db_connection->set_charset('UTF8');
			if( $this->db_connection->connect_errno ){
				die( "Database connection failed badly" . mysqli_error() );
			}
			else {
				//echo "Successful connection!";
			}
	}

	// Clear inputs before inserting into Database
	public function clear_input($input){
		return  mysqli_real_escape_string($this->db_connection, $input);
	}

	// Select table -  prepare tables for loops
	public function select_table($table){
		return mysqli_query($this->db_connection, $table);
	}



}

$connection = new Connection();
global $connection

?>