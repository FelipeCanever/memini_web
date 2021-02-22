<?php
	session_start();
	define("PAGE", "Login");
	require "templates/header.php";
?>

<body>
	<?php require "templates/navbar.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<form method="POST" action="index.php">
					<div class="mb-3">
						<label for="username" class="form-label">Username</label>
						<input type="text" name="username" class="form-control">
					</div>

					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" name="password" class="form-control">
					</div>

					<button type="submit" name="login" class="btn btn-primary">
						Log In
					</button>
				</form>
			</div>

			<div class="col-md-4"></div>
		</div>
	</div>

	<?php require "templates/script.php"; ?>
</body>
</html>
