<?php
	require "utils.php";

	session_start();

	define("USERNAME", "felipe");
	define("PASSWORD", "12345");

	$destination = "";

	if (isset($_POST["login"]))
		if ($_POST["username"] == USERNAME && $_POST["password"] == PASSWORD) {
		$_SESSION["username"] = $_POST["username"];
			$destination = "index.php";
		} else {
			$destination = "login.php";
		}

	redirect($destination);
?>
