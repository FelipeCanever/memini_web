<?php

require "databaseConnection.php";
require "utils.php";

session_start();

// Sair se não receber informação de login.
if (!isset($_POST["login"])) {
	redirect("index.php");
	exit();
}

$loginUser = new User(
	trim($_POST["username"]),
	$_POST["password"]
);

// Para mandar de volta para o formulário de login caso haja problemas.
$_SESSION["login_user"] = $loginUser;
// Possíveis problemas com os dados inseridos.
$_SESSION["problems"] = [];

// Verificar se o usuário já existe.
$savedUser = $database->selectUser($loginUser);

// Se não existir, voltar para o login.
if (!$savedUser) {
	$_SESSION["problems"]["invalid_login"] = "Nome de usuário ou senha inválido.";
	redirect("login.php");
	exit();
}

// Caso contrário, guardar usuário na sessão e voltar para a página inicial.
$_SESSION["user"] = $savedUser;
redirect("index.php");
