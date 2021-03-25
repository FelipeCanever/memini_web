<?php
	require "utils.php";
	require "models/User.php";

	session_start();

	$user = $_SESSION["login_user"] ?? new User("", "");

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
				<?php $problem = $_SESSION["problems"]["invalid_login"] ?? false ?>

				<!-- Formulário -->
				<form method="POST" action="authentication.php">
					<!-- Nome de usuário -->
					<div class="mb-3">
						<label for="username" class="form-label">Nome de usuário</label>

						<input
							type="text" name="username"
							class="form-control <?= $problem ? "is-invalid" : "" ?>"
							value="<?= $user->getUsername() ?>"
							required>
					</div>

					<!-- Senha -->
					<div class="mb-3">
						<label for="password" class="form-label">Senha</label>

						<input
							type="password" name="password"
							class="form-control <?= $problem ? "is-invalid" : "" ?>"
							value="<?= $user->getPassword() ?>"
							required>
					</div>

					<button type="submit" name="login" class="btn btn-primary mb-3">
						Entrar
					</button>
				</form>

				<!-- Mensagem de validação -->
				<?php if ($problem): ?>
					<div class="alert alert-danger" role="alert">
						<?= $problem ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-md-4"></div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>

<?php
	unset($_SESSION["login_user"]);
	$_SESSION["problems"] = [];
?>
