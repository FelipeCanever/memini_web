<?php
	require "utils.php";

	session_start();

	// Criar sessão.
	if (isset($_POST["login"]))
		$_SESSION["username"] = $_POST["username"];

	redirect("index.php");
?>
