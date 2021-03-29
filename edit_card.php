<?php
	require "databaseConnection.php";
	require "utils.php";

	session_start();
	require "check_logged_in.php";

	if (!isset($_GET["card_id"])) {
		redirect("index.html");
		exit();
	}

	$card = $database->selectCard($_SESSION["user"], intval($_GET["card_id"]));

	if (isset($_GET["front"]))
		$card->setFront($_GET["front"]);
	
	if (isset($_GET["back"]))
		$card->setBack($_GET["back"]);

	// Definir título da página.
	define("PAGE", "Editar carta");
	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="display-6">Editando carta</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<!-- Fórmulário -->
				<form method="get" action="update_card.php">
					<input type="hidden" name="card_id" value="<?= $card->getCardId() ?>">

					<!-- Frente -->
					<div class="mb-3">
						<label for="front" class="form-label">Frente</label>

						<?php $problem = $_SESSION["problems"]["front"] ?? false ?>

						<input
							type="text" name="front" id="front" required
							class="form-control <?= $problem ? "is-invalid" : "" ?>"
							value="<?= $card->getFront() ?>">

						<!-- Mensagem de validação -->
						<?php if ($problem): ?>
							<div class="invalid-feedback">
								<?= $problem ?>
							</div>
						<?php endif; ?>
					</div>
					<!-- Trás -->
					<div class="mb-3">
						<label for="back" class="form-label">Trás</label>

						<input
							type="text" name="back" id="back" required
							class="form-control"
							value="<?= $card->getBack() ?>">
					</div>

					<button type="submit" name="update_card" class="btn btn-outline-primary mb-3">
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
