<?php
Class dbObj{
	/* Database connection start */
	public $username;
	public $password;
	public $servername;
	public $dbname;
	public $conn = null;
	
	function __construct($username, $password, $servername, $dbname) {
		$this->username = $username;
		$this->password = $password;
		$this->servername = $servername;
		$this->dbname = $dbname;
	}
	function getConnstring() {
		try {
			$conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname, $this->username, $this->password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn = $conn;
		} catch(PDOException $e) {
			printf("Connection failed: ". $e->getMessage());
		}
		return $conn;
	}
}
 
?>
