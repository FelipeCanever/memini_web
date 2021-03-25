<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (isset($_POST["update_deck"])) {
	$_SESSION["data"] = [
		"deck_id" =>			$_POST["deck_id"],
		"title" => 				["value" => trim($_POST["title"])],
		"description" =>	["value" => trim($_POST["description"])]
	];

	$deckExists = $database->deckExists(
		$_SESSION["data"]["title"]["value"],
		$_SESSION["data"]["deck_id"]
	);

	if ($deckExists) {
		$_SESSION["data"]["title"]["problem"] = "Já existe um baralho com esse nome.";
		redirect("edit_deck.php");
		exit();
	}

	$database->updateDeck(
		$_POST["deck_id"],
		$_POST["title"],
		$_POST["description"]
	);
}

redirect("index.php");
