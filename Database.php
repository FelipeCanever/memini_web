<?php

require "models/Deck.php";
require "models/User.php";
require "models/Card.php";

class Database {
	private static string $database = "avii_desenvweb";
	private mysqli $connection;

	public function __construct($host, $user, $password) {
		$this->connection = new mysqli(
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

		$result = $this->connection->query(

			"SELECT `deck_id`, `title`, `description`
			FROM `$databaseName`.`deck`
			WHERE `user_id` = '{$user->getUserId()}';"
		);

		$decks = [];

		foreach ($result->fetch_all(MYSQLI_ASSOC) as $deck)
			$decks[] = new Deck(
				$deck["title"],
				$deck["description"],
				$deck["deck_id"]
			);
		
		return $decks;
	}

	public function selectDeck($deck_id) {
		$databaseName = Database::$database;

		$result = $this->connection->query(

			"SELECT `title`, `description`
			FROM `$databaseName`.`deck`
			WHERE `deck_id` = '$deck_id';"
		);

		if ($result->num_rows <= 0)
			return false;
		
		$deck = $result->fetch_assoc();
		return new Deck($deck_id, $deck["title"], $deck["description"]);
	}

	public function deckExists(Deck $deck): bool {
		$databaseName = Database::$database;

		$except =
			$deck->getDeckId() > 0
			? "AND `deck_id` != {$deck->getDeckId()}"
			: "";

		$result = $this->connection->query(
			"SELECT *
			FROM `$databaseName`.`deck`
			WHERE `title` = '{$deck->getTitle()}' $except;"
		);

		return $result->num_rows > 0;
	}

	public function insertDeck(User $user, Deck $deck): void {
		$databaseName = Database::$database;

		$this->connection->query(
			"INSERT INTO
			`$databaseName`.`deck`	(`user_id`,							`title`,								`description`)
			VALUES									({$user->getUserId()},	'{$deck->getTitle()}',	'{$deck->getDescription()}');"
		);
	}

	public function updateDeck($deck_id, $title, $description) {
		$databaseName = Database::$database;

		$this->connection->query(
			"UPDATE `$databaseName`.`deck`
			SET `title` = '$title', `description` = '$description'
			WHERE `deck_id` = $deck_id;"
		);
	}

	public function selectCards($deck) {
		$databaseName = Database::$database;

		$result = $this->connection->query(

			"SELECT `card_id`, `front`, `back`
			FROM `$databaseName`.`card`
			WHERE `deck_id` = '{$deck->getDeckId()}';"
		);

		$cards = [];

		foreach ($result->fetch_all(MYSQLI_ASSOC) as $card)
			$cards[] = new Card(
				$card["card_id"],
				$card["front"],
				$card["back"]
			);
		
		return $cards;
	}
}
