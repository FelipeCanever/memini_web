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
				<p class="display-6">Bem-vindo ao Memini</p>

				<p class="lead">
					Crie <strong><em>flashcards</em></strong> e,
					utilizando o sistema de <strong>repetição espaçada</strong>,
					revise-as de forma que possa decorá-las mais eficientemente.
				</p>
			</div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
