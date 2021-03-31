<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (isset($_POST["delete_deck"]))
	$database->deleteDeck(intval($_POST["deck_id"]));

redirect("index.php");
