<?php 
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require "functions.php";
$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC");

// tombol cari ditekan
if (isset($_POST["cari"])) {
	$mahasiswa = cari($_POST["keyword"]);
}

?>

<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<title>Mahasiswa</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-md-top">
    <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Mahasiswa</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="tambah.php">Tambah</a>
					</li>
					<li class="nav-item">
            <a class="nav-link" aria-current="page" href="logout.php">Logout</a>
          </li>
        </ul>
				<form action="" method="post" class="d-flex">
					<input class="form-control me-2" type="search" name="keyword" autofocus="" placeholder="Pencarian" autocomplete="off" aria-label="Search">
					<button class="btn btn-outline-light" type="submit" name="cari">Cari</button>
				</form>
      </div>
    </div>
  </nav>
	<div class="container-md">
		<h2>Daftar</h2>
		<table class="table">
			<thead>
			<tr>
				<th scope="col">No.</th>
				<th scope="col">Aksi</th>
				<th scope="col">Gambar</th>
				<th scope="col">NRP</th>
				<th scope="col">Nama</th>
				<th scope="col">Email</th>
				<th scope="col">Jurusan</th>
			</tr>
			</thead>
			<tbody>
			<?php $i = 1; foreach ($mahasiswa as $row) : ?>
			<tr>
				<td><?= $i ?></td>
				<td><a href="ubah.php?id=<?= $row["id"]; ?>"><i class="bi bi-pencil"></i></a> <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')"><i class="bi bi-eraser"></i></a></td>
				<td><img src="img/<?= $row["gambar"]; ?>" alt="img/<?= $row["gambar"]; ?>" width="40"></td>
				<td><?= $row["nrp"]; ?></td>
				<td><?= $row["nama"]; ?></td>
				<td><?= $row["email"]; ?></td>
				<td><?= $row["jurusan"]; ?></td>
			</tr>
			<?php $i++; endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
</html>