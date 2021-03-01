<?php
	session_start();

	// Definir título da página.
	define("PAGE", "Deck");

	require "templates/header.php";

	if (!is_logged_in())
		redirect("index.php");
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<!-- Título -->
				<h1>Baralho</h1>
			</div>
		</div>

		<!-- Cartas -->
		<div class="row">
			<?php
				require "data/cards.php";

				$deck_cards = array_filter($cards, function ($card) {
					return $card["deck_id"] == 0;
				});

				foreach ($deck_cards as $card)
					require "templates/card.php";
			?>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
