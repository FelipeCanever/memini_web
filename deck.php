<?php
	require "databaseConnection.php";
	require "utils.php";

	session_start();
	require "check_logged_in.php";

	if (!isset($_POST["deck_id"])) {
		redirect("index.html");
		exit();
	}
	
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
				$deck_cards = $database->selectCards($deck);

				foreach ($deck_cards as $card)
					require "templates/card.php";
			?>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
	<script src="deck.js"></script>
</body>
</html>
