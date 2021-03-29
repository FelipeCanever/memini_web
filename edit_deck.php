<?php
	require "databaseConnection.php";
	require "utils.php";

	session_start();
	require "check_logged_in.php";

	if (!isset($_GET["deck_id"])) {
		redirect("index.html");
		exit();
	}

	$deck = $database->selectDeck($_SESSION["user"], intval($_GET["deck_id"]));

	if (isset($_GET["title"]))
		$deck->setTitle($_GET["title"]);
	
	if (isset($_GET["description"]))
		$deck->setDescription($_GET["description"]);

	// Definir título da página.
	define("PAGE", "Editar baralho");
	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="display-6">Editando baralho</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<!-- Fórmulário -->
				<form method="get" action="update_deck.php">
					<input type="hidden" name="deck_id" value="<?= $deck->getDeckId() ?>">

					<!-- Título -->
					<div class="mb-3">
						<label for="title" class="form-label">Título</label>

						<?php $problem = $_SESSION["problems"]["title"] ?? false ?>

						<input
							type="text" name="title" id="title" required
							class="form-control <?= $problem ? "is-invalid" : "" ?>"
							value="<?= $deck->getTitle() ?>">

						<!-- Mensagem de validação -->
						<?php if ($problem): ?>
							<div class="invalid-feedback">
								<?= $problem ?>
							</div>
						<?php endif; ?>
					</div>
					<!-- Descrição -->
					<div class="mb-3">
						<label for="description" class="form-label">Descrição</label>
						<textarea name="description" id="description" class="form-control"><?= $deck->getDescription() ?></textarea>
					</div>

					<button type="submit" name="update_deck" class="btn btn-outline-primary mb-3">
						Salvar
					</button>
				</form>
			</div>

			<div class="col-md-4">
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>

<?php
	$_SESSION["problems"] = [];
?>
