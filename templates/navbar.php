<nav class="navbar navbar-dark bg-dark">
	<div class="container-fluid">
		<a href="index.php" class="navbar-brand"><?= TITLE ?></a>

		<ul class="navbar-nav">
			<li class="nav-item">
				<?php if (!isset($_SESSION["username"])): ?>
					<a
						href="login.php"
						class="nav-link <?php if (PAGE == "Entrar") echo "active"; ?>"
					>
						Entrar
					</a>
				<?php else: ?>
					<span class="nav-link"><?= $_SESSION["username"] ?></span>
				<?php endif; ?>
			</li>
		</ul>
	</div>
</nav>

<div class="container-fluid p-3"></div>
