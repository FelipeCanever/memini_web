<?php

require "databaseConnection.php";
require "utils.php";

session_start();

// Sair caso uma requisição de inserção não tenha sido feita.
if (!isset($_GET["insert_deck"])) {
	redirect("index.php");
	exit();
}

// Possíveis problemas de validação.
$_SESSION["problems"] = [];

$deck = new Deck(
	$_GET["title"],
	$_GET["description"]
);

// Voltar para o formulário caso já exista um baralho igual.
if ($database->deckExists($_SESSION["user"], $deck)) {
	$_SESSION["problems"]["title"] = "Já existe um baralho com esse nome.";
	
	$parametros_get = [
		"title" 			=> $_GET["title"],
		"description" => $_GET["description"]
	];

	redirect("new_deck.php?" . http_build_query($parametros_get));

	exit();
}

$database->insertDeck($_SESSION["user"], $deck);
redirect("index.php");
