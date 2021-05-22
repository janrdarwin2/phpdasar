<?php 
include "functions.php";

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek keberadaan username
	if (mysqli_num_rows($result)===1) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			header("Location:index.php");
			exit;
		}
		
	}

	$error = true;
}


?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
<h1>Login</h1>



<form action="" method="post">
	<ul>
		
		<?php if (isset($error)) : ?>
		<li>
		<p style="color: red; font-style: italic;">User atau password salah!</p>
		<?php endif; ?>
		</li>
		
		<li>
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required>
		</li>
		<li>
			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required>
		</li>
		<li>
			<button type="submit" name="submit">Login</button>
		</li>
	</ul>
</form>
</body>
</html>