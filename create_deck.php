<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (isset($_POST["create_deck"])) {
	$database->insertDeck(
		$_SESSION["user"]->getUserId(),
		$_POST["title"],
		$_POST["description"]
	);
}

redirect("index.php");
