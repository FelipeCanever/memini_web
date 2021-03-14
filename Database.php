<?php

class Database {
	private static $database = "avii_desenvweb";
	private $connection;

	public function __construct($host, $user, $password) {
		$this->connection = mysqli_connect(
			$host, $user, $password, Database::$database
		);
	}

	public function __destruct() {
		mysqli_close($this->connection);
	}
}
