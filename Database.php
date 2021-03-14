<?php

require "models/User.php";

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

	public function selectUser($username, $password) {
		$databaseName = Database::$database;

		$result = mysqli_query(
			$this->connection,

			"SELECT `username`
			FROM `$databaseName`.`user`
			WHERE `username` = '$username' AND `password` = '$password';"
		);

		if ($result->num_rows <= 0)
			return false;
		
		$user = mysqli_fetch_assoc($result);
		return new User($user["username"]);
	}
}
