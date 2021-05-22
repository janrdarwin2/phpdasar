<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require "functions.php";

if (isset($_POST["register"])) {
	if (registrasi($_POST)>0) {
		echo "<script>alert('User baru berhasil ditambahkan!')</script>";
	} else {
		echo mysqli_error($conn);
	}
}
 ?>

<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />

	<title>Admin</title>
</head>
<body>
	<div class="container-md">
	<h2>Registrasi</h2>
	<form action="" method="post">
			<fieldset>
				<div class="md-3">
					<label class="form-label" for="username">Username:</label>
					<input class="form-control" type="text" name="username" id="username" required minlength="3">
				</div>
				<div class="md-3">
					<label class="form-label" for="password">Password:</label>
					<input class="form-control" type="password" name="password" id="password" required minlength="3">
				</div>
				<div class="md-3">
					<label class="form-label" for="password2">Retype Password:</label>
					<input class="form-control" type="password" name="password2" id="password2">
				</div>
				<button class="btn btn-primary btn-send" type="submit" name="register">Kirim</button>
			</fieldset>
	</form>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
	-->
	
</body>
</html>