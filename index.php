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
			</div>
		</div>

		<div class="row">
			<div class="col">	
				<?php if (!isset($_SESSION["username"])): ?>
					<p class="lead">
						Crie <strong><em>flashcards</em></strong> e,
						utilizando o sistema de <strong>repetição espaçada</strong>,
						revise-as de forma que possa decorá-las mais eficientemente.
					</p>
				<?php else: ?>
					<!-- Baralhos -->
					<h2>Seus baralhos</h2>
				<?php endif; ?>
			</div>
		</div>

		<div class="row">
			<?php require "data.php"; ?>

			<?php foreach ($decks as $deck): ?>
				<!-- Baralho -->
				<div class="col-12 col-sm-6 col-md-4 col-lg-3">
					<div class="card text-dark bg-light">
						<div class="card-body">
							<h5 class="card-title"><?= $deck["title"] ?></h5>
							<p class="card-text"><?= $deck["description"] ?></p>

							<a href="#" class="btn btn-sm btn-primary">Abrir</a>
							<a href="#" class="btn btn-sm btn-secondary disabled">Estudar</a>
							<a href="#" class="btn btn-sm btn-danger disabled">Excluir</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
