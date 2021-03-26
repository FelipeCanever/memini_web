<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (!isset($_POST["update_deck"])) {
	redirect("index.php");
	exit();
}

$deck = $_SESSION["deck"] = new Deck(
	trim($_POST["title"]),
	trim($_POST["description"]),
	intval($_POST["deck_id"])
);

$_SESSION["problems"] = [];

if ($database->deckExists($_SESSION["user"], $deck)) {
	$_SESSION["problems"]["title"] = "Já existe um baralho com esse nome.";
	redirect("edit_deck.php");
	exit();
}

$database->updateDeck($deck);
redirect("index.php");
