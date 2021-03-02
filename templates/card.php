<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mb-4 text-center">
	<?php $cardId = "card" . $card["card_id"]; ?>

	<div class="card border-dark shadow" id="<?= $cardId ?>">
		<div class="card-body">
			<!-- Frente -->
			<h5 class="card-title mt-5 mb-5" id="<?= $cardId . "Front" ?>">
				<?= $card["front"] ?>
			</h5>

			<!-- Trás -->
			<h5 class="card-title mt-5 mb-5" id="<?= $cardId . "Back" ?>" style="display: none;">
				<?= $card["back"] ?>
			</h5>

			<!-- Botões -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 mb-1">
						<a	href="#" class="btn btn-outline-primary btn-sm w-100 h-100"
							onclick="flipCard('<?= $cardId ?>')">
							Virar
						</a>
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
