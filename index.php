<?php
	define("TITLE", "Desenvolvimento de Sistemas Web");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= TITLE ?></title>

	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
		crossorigin="anonymous"
	>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container-fluid">
			<a href="#" class="navbar-brand"><?= TITLE ?></a>
			
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="nav-link">Entrar</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col">
				<p class="lead">Bem-vindo ao <em>site</em> de <?= TITLE ?>.</p>
			</div>
		</div>
	</div>

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
		crossorigin="anonymous"
	>
	</script>
</body>
</html>
