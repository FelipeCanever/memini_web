<?php

require "databaseConnection.php";
require "utils.php";

session_start();

if (!isset($_POST["login"])) {
	redirect("index.php");
	exit();
}

$loginUser = $_SESSION["login_user"] = new User(
	trim($_POST["username"]),
	$_POST["password"]
);

$_SESSION["problems"] = [];

$savedUser = $database->selectUser($loginUser);

if (!$savedUser) {
	$_SESSION["problems"]["invalid_login"] = "Nome de usuário ou senha inválido.";
	redirect("login.php");
	exit();
}

$_SESSION["user"] = $savedUser;
redirect("index.php");
