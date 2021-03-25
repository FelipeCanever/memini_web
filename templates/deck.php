<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 text-center">
	<div class="card border-dark shadow">
		<div class="card-body">
			<!-- Título -->
			<h4 class="card-title"><?= $deck->getTitle() ?></h4>
			<!-- Descrição -->
			<p class="card-text lead"><?= $deck->getDescription() ?></p>

			<!-- Botões -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 mb-1">
						<!-- Abrir -->
						<form action="deck.php" method="post">
							<input type="hidden" name="deck_id" value="<?= $deck->getDeckId() ?>">
							<input type="submit" name="deck" value="Abrir" class="btn btn-outline-primary btn-sm w-100 h-100">
						</form>
					</div>

					<div class="col-sm-12 mb-1">
						<a href="#" class="btn btn-outline-secondary btn-sm w-100 h-100 disabled">
							Estudar
						</a>
					</div>

					<div class="col-sm-12 mb-1">
						<form action="edit_deck.php" method="post">
							<input type="hidden" name="deck_id" value="<?= $deck->getDeckId() ?>">
							<input type="submit" name="deck" value="Editar" class="btn btn-outline-primary btn-sm w-100 h-100">
						</form>
					</div>

					<div class="col-sm-12 mb-1">
						<a href="#" class="btn btn-outline-danger btn-sm w-100 h-100 disabled">
							Excluir
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
