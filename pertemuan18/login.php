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

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Login</title>
  </head>

  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Login</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="profile/index.html">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-md">
    <form action="" method="post">
      <?php if (isset($error)) : ?>
          <div class="alert alert-primary" role="alert">Username / password salah!</div>
      <?php endif; ?>
      <div class="mb-0">
        <label for="username" class="form-label">Username:</label>
        <input type="text" class="form-control" name="username" id="username" required>
      </div>
      <div class="mb-0">
        <label for="password" class="form-label">Password:</label>
        <input class="form-control" type="password" name="password" id="password" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>
      <button class="btn btn-primary mb-0" type="submit" name="submit">Login</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->
  </body>
</html>
