<?php
	require "databaseConnection.php";
	require "utils.php";

	session_start();

	// Sair se não estiver logado ou se não tiver baralho.
	if (!is_logged_in() || !isset($_POST["deck"]))
		redirect("index.php");
	
	$deck = $database->selectDeck(intval($_POST["deck_id"]));

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

		<!-- Cartas -->
		<div class="row mt-4">
			<?php
				require "data/cards.php";

				// Obter cartas que pertencem ao baralho.
				$deck_cards = array_filter($cards, function ($card) use ($deck) {
					return $card["deck_id"] == $deck->getTitle();
				});

				foreach ($deck_cards as $card)
					require "templates/card.php";
			?>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
	<script src="deck.js"></script>
</body>
</html>
