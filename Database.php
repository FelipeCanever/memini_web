<?php

require "models/Deck.php";
require "models/User.php";
require "models/Card.php";

class Database {
	private static string $database = "avii_desenvweb";
	private mysqli $connection;

	public function __construct(string $host, string $user, string $password) {
		$this->connection = new mysqli(
			$host, $user, $password, Database::$database
		);
	}

	public function __destruct() {
		$this->connection->close();
	}

	public function selectUser(User $user) {
		$databaseName = Database::$database;

		$result = $this->connection->query(
			"SELECT `user_id`, `username`
			FROM `$databaseName`.`user`
			WHERE `username` = '{$user->getUsername()}' AND `password` = '{$user->getPassword()}';"
		);

		if ($result->num_rows <= 0)
			return false;
		
		$user = $result->fetch_assoc();
		return new User($user["username"], "", $user["user_id"]);
	}

	public function selectDecks(User $user): array {
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

	public function selectDeck(User $user, int $deck_id) {
		$databaseName = Database::$database;

		$result = $this->connection->query(
			"SELECT `title`, `description`
			FROM `$databaseName`.`deck`
			WHERE `deck_id` = '$deck_id' and `user_id`= {$user->getUserId()};"
		);

		if ($result->num_rows <= 0)
			return null;
		
		$deck = $result->fetch_assoc();

		return new Deck(
			$deck["title"],
			$deck["description"],
			$deck_id
		);
	}

	public function deckExists(User $user, Deck $deck): bool {
		$databaseName = Database::$database;

		$except =
			$deck->getDeckId() > 0
			? "AND `deck_id` != {$deck->getDeckId()}"
			: "";

		$result = $this->connection->query(
			"SELECT *
			FROM `$databaseName`.`deck`
			WHERE `title` = '{$deck->getTitle()}' AND `user_id` = {$user->getUserId()} $except;"
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

	public function updateDeck(Deck $deck): void {
		$databaseName = Database::$database;

		$this->connection->query(
			"UPDATE `$databaseName`.`deck`
			SET `title` = '{$deck->getTitle()}', `description` = '{$deck->getDescription()}'
			WHERE `deck_id` = {$deck->getDeckId()};"
		);
	}

	public function selectCards(Deck $deck): array {
		$databaseName = Database::$database;

		$result = $this->connection->query(
			"SELECT `card_id`, `front`, `back`
			FROM `$databaseName`.`card`
			WHERE `deck_id` = '{$deck->getDeckId()}';"
		);

		$cards = [];

		foreach ($result->fetch_all(MYSQLI_ASSOC) as $card)
			$cards[] = new Card(
				$card["front"],
				$card["back"],
				0,
				intval($card["card_id"])
			);
		
		return $cards;
	}

	public function selectCard(User $user, int $card_id) {
		$databaseName = Database::$database;

		$result = $this->connection->query(
			"SELECT `card_id`, `deck_id`, `front`, `back`
			FROM `$databaseName`.`card`
			WHERE `card_id` = $card_id and `user_id`= {$user->getUserId()};"
		);

		if ($result->num_rows <= 0)
			return null;
		
		$card = $result->fetch_assoc();

		return new Card(
			$card["front"],
			$card["back"],
			intval($card["deck_id"]),
			intval($card["card_id"])
		);
	}

	public function cardExists(Card $card): bool {
		$databaseName = Database::$database;

		$except =
			$card->getCardId() > 0
			? "AND `card_id` != {$card->getCardId()}"
			: "";

		$result = $this->connection->query(
			"SELECT *
			FROM `$databaseName`.`card`
			WHERE `front` = '{$card->getFront()}' AND `deck_id` = {$card->getDeckId()} $except;"
		);

		return $result->num_rows > 0;
	}

	public function insertCard(User $user, Card $card): void {
		$databaseName = Database::$database;

		$this->connection->query(
			"INSERT INTO
			`$databaseName`.`card`	(`user_id`,							`deck_id`,						`front`,								`back`)
			VALUES									({$user->getUserId()},	{$card->getDeckId()},	'{$card->getFront()}',	'{$card->getBack()}');"
		);
	}

	public function updateCard(Card $card): void {
		$databaseName = Database::$database;

		$this->connection->query(
			"UPDATE `$databaseName`.`card`
			SET `front` = '{$card->getFront()}', `back` = '{$card->getBack()}'
			WHERE `card_id` = {$card->getCardId()};"
		);
	}

	public function deleteCard(int $card_id): void {
		$databaseName = Database::$database;

		$this->connection->query(
			"DELETE FROM `$databaseName`.`card`
			WHERE `card_id` = {$card_id};"
		);
	}
}
