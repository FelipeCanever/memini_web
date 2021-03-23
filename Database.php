<?php

require "models/Deck.php";
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

	public function selectDecks($user) {
		$databaseName = Database::$database;

		$user_id = $user->getUserId();

		$result = $this->connection->query(

			"SELECT `title`, `description`
			FROM `$databaseName`.`deck`
			WHERE `user_id` = '$user_id';"
		);

		$decks = [];

		foreach ($result->fetch_all(MYSQLI_ASSOC) as $deck)
			$decks[] = new Deck(
				$deck["deck_id"],
				$deck["title"],
				$deck["description"]
			);
		
		return $decks;
	}
}
