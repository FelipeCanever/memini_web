<?php

require "databaseConnection.php";
require "utils.php";

session_start();

$destination = "";

if (isset($_POST["login"]))
	$user = $database->selectUser($_POST["username"], $_POST["password"]);

	// Ir para a página inicial se o usuário for autenticado.
	if ($user) {
		$_SESSION["user"] = $user;
		$destination = "index.php";
	}
	// Senão voltar para a página de login. 
	else {
		$_SESSION["invalid"] = True;
		$destination = "login.php";
	}

redirect($destination);
