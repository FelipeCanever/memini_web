<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (!isset($_POST["insert_deck"])) {
	redirect("index.php");
	exit();
}

$deck = $_SESSION["deck"] = new Deck(
	trim($_POST["title"]),
	trim($_POST["description"])
);

$_SESSION["problems"] = [];

if ($database->deckExists($deck)) {
	$_SESSION["problems"]["title"] = "Já existe um baralho com esse nome.";
	redirect("new_deck.php");
	exit();
}

$database->insertDeck($_SESSION["user"], $deck);
redirect("index.php");
