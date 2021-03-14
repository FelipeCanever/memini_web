<?php

function redirect($destination) {
	header("Location: $destination");
}

function is_logged_in() {
	return isset($_SESSION["username"]);
}
