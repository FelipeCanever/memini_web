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

	// Definir título da página.
	define("PAGE", "Baralho \"{$deck->getTitle()}\"");

	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<!-- Título -->
		<div class="row">
			<div class="col">
				<h1 class="display-6"><?= $deck->getTitle() ?></h1>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-12 d-flex">
				<!-- Ver todos os baralhos -->
				<form action="index.php" method="post" class="me-3">
					<button type="submit" class="btn btn-outline-primary">Ver todos os baralhos</button>
				</form>
				<!-- Nova carta -->
				<form action="new_card.php" method="get" class="me-3">
					<input type="hidden" name="deck_id" value="<?= $deck->getDeckId() ?>">
					<button type="submit" class="btn btn-outline-success">Nova carta</button>
				</form>
			</div>
		</div>

		<!-- Cartas -->
		<div class="row mt-4">
			<?php
				$cards = $database->selectCards($deck);

				foreach ($cards as $card)
					require "templates/card.php";
			?>
		</div>
	</div>

	<!-- Confirmação de exclusão da carta -->
	<div class="modal fade" id="deleteCardPrompt" tabindex="-1" aria-labelledby="deleteCardPromptLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteCardPromptLabel">Excluir carta</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Tem certeza que deseja excluir esta carta?
				</div>
				<div class="modal-footer">
					<!-- Excluir -->
					<form action="delete_card.php", method="post">
						<input type="hidden" name="deck_id" value="<?= $deck->getDeckId() ?>">
						<input type="hidden" id="cardIdInput" name="card_id" value="">
						<button type="submit" name="delete_card" class="btn btn-danger">Excluir</button>
					</form>
					<!-- Cancelar -->
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
	<script src="scripts/deck.js"></script>
</body>
</html>
