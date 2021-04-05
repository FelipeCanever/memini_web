<?php

require "databaseConnection.php";
require "utils.php";

session_start();

// Sair se não houver uma requisição de inserção.
if (!isset($_GET["insert_card"])) {
	redirect("index.php");
	exit();
}

// Possíveis problemas de validação.
$_SESSION["problems"] = [];

$card = new Card(
	$_GET["front"],
	$_GET["back"],
	intval($_GET["deck_id"])
);

// Caso uma carta igual já exista, voltar para o formulário.
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
