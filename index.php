<?php
	require "databaseConnection.php";
	require "utils.php";

	// Definir título da página.
	define("PAGE", "");
	require "templates/header.php";
	
	session_start();
?>
<body>
	<?php require "templates/navbar.php"; ?>
	<div class="container">
		<!-- Título -->
		<div class="row">
			<div class="col">
				<p class="display-6">
					<?php if (!is_logged_in()): ?>
						Bem-vindo ao <?= TITLE ?>
					<?php else: ?>
						Bem-vindo, <strong><?= $_SESSION["user"]->getUsername() ?></strong>
					<?php endif; ?>
				</p>
			</div>
		</div>
		<!-- Subtítulo -->
		<div class="row">
			<div class="col">	
				<?php if (!is_logged_in()): ?>
					<p class="lead">
						Crie <strong><em>flashcards</em></strong> e,
						utilizando o sistema de <strong>repetição espaçada</strong>,
						revise-as de forma que possa decorá-las mais eficientemente.
					</p>
				<?php else: ?>
					<h2>Seus baralhos</h2>
				<?php endif; ?>
			</div>
		</div>
		<!-- Baralhos -->
		<?php if (is_logged_in()): ?>
			<!-- Novo baralho -->
			<div class="row mt-4">
				<form action="new_deck.php" method="post">
					<input type="submit" name="new_deck" value="Novo baralho" class="btn btn-outline-success">
				</form>
			</div>
			<!-- Baralhos -->
			<div class="row mt-4">
				<?php
					$decks = $database->selectDecks($_SESSION["user"]);

					foreach ($decks as $deck)
						require "templates/deck.php";
				?>
			</div>
		<?php endif; ?>
	</div>
	<!-- Confirmação de exclusão da baralho -->
	<div class="modal fade" id="deleteDeckPrompt" tabindex="-1" aria-labelledby="deleteDeckPromptLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="deleteDeckPromptLabel">Excluir baralho</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Tem certeza que deseja excluir este baralho?
				</div>
				<div class="modal-footer">
					<!-- Excluir -->
					<form action="delete_deck.php", method="post">
						<input type="hidden" id="deckIdInput" name="deck_id" value="">
						<button type="submit" name="delete_deck" class="btn btn-danger">Excluir</button>
					</form>
					<!-- Cancelar -->
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
				</div>
			</div>
		</div>
	</div>
	<?php require "templates/script.php"; ?>
	<script src="scripts/decks.js"></script>
</body>
</html>
