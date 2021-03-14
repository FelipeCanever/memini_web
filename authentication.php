<?php

require "utils.php";

session_start();

define("USERNAME", "felipe");
define("PASSWORD", "12345");

$destination = "";

if (isset($_POST["login"]))
	// Ir para a página inicial se o usuário for autenticado.
	if ($_POST["username"] == USERNAME && $_POST["password"] == PASSWORD) {
		$_SESSION["username"] = $_POST["username"];
		$destination = "index.php";
	}
	// Senão voltar para a página de login. 
	else {
		$_SESSION["invalid"] = True;
		$destination = "login.php";
	}

redirect($destination);
