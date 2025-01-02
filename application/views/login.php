<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Login</title>

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/style.css'); ?>">
</head>

<body>
	<h2>Form Login</h2>

	<?php if ($this->session->flashdata('error')) : ?>
		<div class="alert alert-danger" role="alert">
			<?= $this->session->flashdata('error'); ?>
		</div>
	<?php endif; ?>

	<form action="<?= base_url('login/proses'); ?>" method="POST" id="loginForm">
		<label for="username">Username</label><br>
		<input type="text" id="username" name="username" required autocomplete="off"><br><br>

		<label for="password">Password</label><br>
		<input type="password" id="password" name="password" required autocomplete="off"><br><br>

		<button type="button" id="loginButton">Login</button>
	</form>

	<script src="<?= base_url('assets/front/script.js'); ?>"></script>
</body>

</html>