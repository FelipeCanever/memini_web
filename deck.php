<?php
	require "utils.php";

	session_start();

	if (!is_logged_in() || !isset($_POST["deck"]))
		redirect("index.php");
	
	require "data/decks.php";
	$deck = $decks[intval($_POST["deck_id"])];

	// Definir título da página.
	define("PAGE", "Baralho \"{$deck['title']}\"");
	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<!-- Título -->
				<h1 class="display-6"><?= $deck["title"] ?></h1>
			</div>
		</div>

		<!-- Cartas -->
		<div class="row mt-4">
			<?php
				require "data/cards.php";

				$deck_cards = array_filter($cards, function ($card) use ($deck) {
					return $card["deck_id"] == $deck["deck_id"];
				});

				foreach ($deck_cards as $card)
					require "templates/card.php";
			?>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
