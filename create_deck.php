<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (isset($_POST["create_deck"])) {
	$_SESSION["data"] = [
		"title" => ["value" => trim($_POST["title"])]
	];

	if ($database->deckExists($_SESSION["data"]["title"]["value"])) {
		$_SESSION["data"]["title"]["problem"] = "Já existe um baralho com esse nome.";
		redirect("new_deck.php");
		exit();
	}

	$database->insertDeck(
		$_SESSION["user"]->getUserId(),
		$_POST["title"],
		$_POST["description"]
	);
}

redirect("index.php");
