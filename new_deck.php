<?php
	require "databaseConnection.php";
	require "utils.php";

	// Definir título da página.
	define("PAGE", "Novo baralho");
	require "templates/header.php";
	
	session_start();
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="display-6">Novo baralho</p>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<!-- Fórmulário -->
				<form method="POST" action="create_deck.php">
					<!-- Título -->
					<div class="mb-3">
						<label for="title" class="form-label">Título</label>

						<?php $problem = $_SESSION["data"]["title"]["problem"] ?? ""; ?>

						<input
							type="text" name="title" id="title" required
							class="form-control <?= $problem ? "is-invalid" : "" ?>"
							value="<?= $_SESSION["data"]["title"]["value"] ?? "" ?>">

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
						<textarea name="description" id="description" class="form-control"></textarea>
					</div>

					<button type="submit" name="create_deck" class="btn btn-outline-success mb-3">
						Criar baralho
					</button>
				</form>
			</div>

			<div class="col-md-4">
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>

<?php unset($_SESSION["data"]); ?>
