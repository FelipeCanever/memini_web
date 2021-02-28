<?php
	session_start();

	// Definir título da página.
	define("PAGE", "");

	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="lead">Bem-vindo ao <em>site</em> de <?= TITLE ?>.</p>
			</div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
