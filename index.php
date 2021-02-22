<?php
	session_start();

	if (isset($_POST["login"]))
		$_SESSION["username"] = $_POST["username"];

	define("PAGE", "");
	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="lead">Welcome to the <?= TITLE ?> site.</p>
			</div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
