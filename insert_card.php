<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (!isset($_GET["insert_card"])) {
	redirect("index.php");
	exit();
}

$_SESSION["problems"] = [];

$card = new Card(
	$_GET["front"],
	$_GET["back"],
	intval($_GET["deck_id"])
);

if ($database->cardExists($card)) {
	$_SESSION["problems"]["front"] = "Já existe essa carta no baralho.";
	
	$parametros_get = [
		"front" 	=> $_GET["front"],
		"back" 		=> $_GET["back"],
		"deck_id" => $_GET["deck_id"]
	];

	redirect("new_card.php?" . http_build_query($parametros_get));

	exit();
}

$database->insertCard($_SESSION["user"], $card);
redirect("deck.php?" . http_build_query(["deck_id" => $_GET["deck_id"]]));
