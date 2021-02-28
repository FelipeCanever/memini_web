<?php
	session_start();

	// Definir título da página.
	define("PAGE", "Entrar");

	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<!-- Formulário -->
				<form method="POST" action="authentication.php">
					<!-- Nome de usuário -->
					<div class="mb-3">
						<label for="username" class="form-label">Nome de usuário</label>
						<input type="text" name="username" class="form-control">
					</div>
					<!-- Senha -->
					<div class="mb-3">
						<label for="password" class="form-label">Senha</label>
						<input type="password" name="password" class="form-control">
					</div>

					<button type="submit" name="login" class="btn btn-primary">
						Entrar
					</button>
				</form>
			</div>

			<div class="col-md-4"></div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
