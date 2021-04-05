<?php
// Se não estiver logado, voltar para a página inicial.
if (!isset($_SESSION["user"])) {
	redirect("index.php");
	exit();
}
