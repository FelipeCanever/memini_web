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
		$this->connection->close();
	}

	public function selectUser($username, $password) {
		$databaseName = Database::$database;

		$result = $this->connection->query(

			"SELECT `user_id`, `username`
			FROM `$databaseName`.`user`
			WHERE `username` = '$username' AND `password` = '$password';"
		);

		if ($result->num_rows <= 0)
			return false;
		
		$user = $result->fetch_assoc();
		return new User($user["user_id"], $user["username"]);
	}
}
