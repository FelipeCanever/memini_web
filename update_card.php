<?php

require "databaseConnection.php";
require "utils.php";

session_start();

// Sair caso uma requisição de atualização não tenha sido enviada.
if (!isset($_GET["update_card"])) {
	redirect("index.php");
	exit();
}

// Possíveis problemas de validação.
$_SESSION["problems"] = [];

$card = new Card(
	$_GET["front"],
	$_GET["back"],
	intval($_GET["deck_id"]),
	intval($_GET["card_id"])
);

// Voltar ao formulário caso já exista uma carta igual.
if ($database->cardExists($card)) {
	$_SESSION["problems"]["front"] = "Já existe essa carta no baralho.";

	$parametros_get = [
		"front" 	=> $_GET["front"],
		"back" 		=> $_GET["back"],
		"card_id"	=> intval($_GET["card_id"])
	];

	redirect("edit_card.php?" . http_build_query($parametros_get));

	exit();
}

$database->updateCard($card);
redirect("deck.php?" . http_build_query(["deck_id" => $_GET["deck_id"]]));
