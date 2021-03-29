<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (!isset($_GET["update_deck"])) {
	redirect("index.php");
	exit();
}

$_SESSION["problems"] = [];

$deck = new Deck(
	$_GET["title"],
	$_GET["description"],
	intval($_GET["deck_id"])
);

if ($database->deckExists($_SESSION["user"], $deck)) {
	$_SESSION["problems"]["title"] = "Já existe um baralho com esse nome.";

	$parametros_get = [
		"title" 			=> $_GET["title"],
		"description" => $_GET["description"],
		"deck_id"			=> intval($_GET["deck_id"])
	];

	redirect("edit_deck.php?" . http_build_query($parametros_get));

	exit();
}

$database->updateDeck($deck);
redirect("index.php");
