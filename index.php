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
				<!-- Título -->
				<p class="display-6">
					<?php if (!isset($_SESSION["username"])): ?>
						Bem-vindo ao <?= TITLE ?>
					<?php else: ?>
						Bem-vindo, <strong><?= $_SESSION["username"] ?></strong>
					<?php endif; ?>
				</p>

				<?php if (!isset($_SESSION["username"])): ?>
					<p class="lead">
						Crie <strong><em>flashcards</em></strong> e,
						utilizando o sistema de <strong>repetição espaçada</strong>,
						revise-as de forma que possa decorá-las mais eficientemente.
					</p>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
