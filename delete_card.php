<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (!isset($_POST["delete_card"])) {
	redirect("index.php");
	exit();
}

$database->deleteCard(intval($_POST["card_id"]));
redirect("deck.php?" . http_build_query(["deck_id" => $_POST["deck_id"]]));
