<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require "functions.php";

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {
	//cek keberhasilan
	if (ubah($_POST) > 0) {
		echo "<script>alert('Data berhasil diubah.'); document.location.href = 'index.php'</script>";
	} else {
		echo "<script>alert('Data gagal diubah.')</script>";
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

	<title>Ubah Mahasiswa</title>
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
						<a class="nav-link" aria-current="page" href="index.php">Kembali</a>
					</li>
					<li>
						<a class="nav-link" href="hapus.php?id=<?= $id; ?>" onclick="return confirm('Yakin?')">Hapus</i></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-md">
		<h2>Ubah</h2>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" id="id" required value="<?= $mhs['id']; ?>">
			<input type="hidden" name="gambarLama" id="id" value="<?= $mhs['gambar']; ?>">
			<div class="mb-3">
				<label class="form-label" for="nrp">NRP:</label>
				<input class="form-control" type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="nama">Nama:</label>
				<input class="form-control" type="text" name="nama" id="nama" required value="<?= $mhs['nama']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="email">Email:</label>
				<input class="form-control" type="text" name="email" id="email" required value="<?= $mhs['email']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="jurusan">Jurusan:</label>
				<input class="form-control" type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label" for="gambar">Gambar:</label> <br>
				<img src="img/<?= $mhs['gambar']; ?>" width="150px" alt="<?= $mhs['gambar']; ?>">
				<input class="form-control" type="file" name="gambar" id="gambar">
			</div>
			<button class="btn btn-primary btn-send" type="submit" name="submit">Ubah</button>
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