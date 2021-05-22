<?php 
session_start();
include "functions.php";

// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
	
	$id = $_COOKIE["id"];
	$key = $_COOKIE["key"];

	// ambil user berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($key===hash("sha256", $row["username"])) {
		$_SESSION["login"] = true;
	}

		
	
}

if (isset($_SESSION["login"])) {
	header("Location: index.php");
	exit;
}

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek keberadaan username
	if (mysqli_num_rows($result)===1) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// set session
			$_SESSION["login"] = true;

			// cek remember me
			if (isset($_POST["remember"])) {
				// buat cookie
				setcookie("id", $row["id"], time()+3600);
				setcookie("key", hash("sha256", $row["username"]), time()+3600);
			}

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
			<input type="checkbox" name="remember" id="remember">
			<label for="remember">Remember me</label>
		</li>
		<li>
			<button type="submit" name="submit">Login</button>
		</li>
	</ul>
</form>
</body>
</html>