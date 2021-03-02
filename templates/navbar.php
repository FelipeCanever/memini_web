<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container-fluid">
		<!-- Título -->
		<a href="index.php" class="navbar-brand"><?= TITLE ?></a>

		<ul class="navbar-nav">
			<?php if (!is_logged_in()): ?>
				<!-- Entrar -->
				<li class="nav-item">
					<a	href="login.php"
							class="nav-link <?php if (PAGE == "Login") echo "active"; ?>">
						Entrar
					</a>
				</li>
			<?php else: ?>
				<!-- Nome de usuário -->
				<li class="nav-item dropdown">
					<a	href="#" class="nav-link dropdown-toggle" role="button"
							id="userDropdown" data-bs-toggle="dropdown"
							aria-expanded="false">
						<?= $_SESSION["username"] ?>
					</a>
					<!-- Sair -->
					<ul class="dropdown-menu" aria-labelledby="userDropdown">
						<li>
							<a href="logout.php" class="dropdown-item">Sair</a>
						</li>
					</ul>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>

<div class="container-fluid p-3"></div>
