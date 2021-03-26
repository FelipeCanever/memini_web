<?php
	require "databaseConnection.php";
	require "utils.php";

	session_start();
	require "check_logged_in.php";

	$card = $_SESSION["card"] ?? new Card("", "");

	// Definir título da página.
	define("PAGE", "Nova carta");
	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="display-6">Nova carta</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<!-- Fórmulário -->
				<form method="POST" action="insert_card.php">
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

					<button type="submit" name="insert_card" class="btn btn-outline-success mb-3">
						Criar carta
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
	unset($_SESSION["card"]);
	$_SESSION["problems"] = [];
?>
