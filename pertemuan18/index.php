<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require "functions.php";

// pagination
$batas = 2;


// tombol cari ditekan
if (isset($_GET["cari"])) {

	$jumlahData = count(cari($_GET["keyword"]));
	$jumlahHalaman = ceil($jumlahData / $batas);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($batas * $halamanAktif) - $batas;
	$keyword = $_GET["keyword"];
	$mahasiswa = query("SELECT * FROM mahasiswa WHERE nrp LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR jurusan LIKE '%$keyword%' ORDER BY id DESC LIMIT $awalData, $batas");
} else {
	$jumlahData = count(query("SELECT id FROM mahasiswa"));
	$jumlahHalaman = ceil($jumlahData / $batas);
	$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
	$awalData = ($batas * $halamanAktif) - $batas;

	$mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id DESC LIMIT $awalData, $batas");
}

?>

<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />

	<!-- bootstrap icon -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

	<title>Mahasiswa</title>
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-primary sticky-top">
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
					<?php if (isset($_GET["cari"])) : ?>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="index.php">Semua</a>
						</li>
					<?php endif; ?>
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="logout.php">Logout</a>
					</li>
				</ul>
				<form action="" method="GET" class="d-flex">
					<input class="form-control me-2" type="search" name="keyword" autofocus="" placeholder="Pencarian" autocomplete="off" aria-label="Search" required>
					<button class="btn btn-outline-light" type="submit" name="cari">Cari</button>
				</form>
			</div>
		</div>
	</nav>
	<div class="container-md">
		<h2>Daftar</h2>

		<!-- navigasi -->

		<?php if (!isset($_GET["cari"])) : ?>
			<nav aria-label="navigasi">
				<ul class="pagination">
					<?php if ($halamanAktif > 1) : ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>">&lt</a></li>
					<?php endif; ?>
					<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
						<?php if ($i == $halamanAktif) : ?>
							<li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
						<?php else : ?>
							<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
						<?php endif; ?>
					<?php endfor; ?>
					<?php if ($halamanAktif < $jumlahHalaman) : ?>
						<li class="page-item"><a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>">&gt</a></li>
					<?php endif; ?>
				</ul>
			</nav>

		<?php else : ?>
			<nav aria-label="navigasi">
				<ul class="pagination">
					<?php if ($halamanAktif > 1) : ?>
						<li class="page-item"><a class="page-link" href="?keyword=<?= $keyword; ?>&cari=&halaman=<?= $halamanAktif - 1; ?>">&lt</a></li>
					<?php endif; ?>
					<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
						<?php if ($i == $halamanAktif) : ?>
							<li class="page-item active"><a class="page-link" href="?keyword=<?= $keyword; ?>&cari=&halaman=<?= $i; ?>"><?= $i; ?></a></li>
						<?php else : ?>
							<li class="page-item"><a class="page-link" href="?keyword=<?= $keyword; ?>&cari=&halaman=<?= $i; ?>"><?= $i; ?></a></li>
						<?php endif; ?>
					<?php endfor; ?>
					<?php if ($halamanAktif < $jumlahHalaman) : ?>
						<li class="page-item"><a class="page-link" href="?keyword=<?= $keyword; ?>&cari=&halaman=<?= $halamanAktif + 1; ?>">&gt</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		<?php endif; ?>

		<table class="table">
			<thead>
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Aksi</th>
					<th scope="col">Gambar</th>
					<th scope="col">Nama</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
				foreach ($mahasiswa as $row) : ?>
					<tr>
						<td><?= $i ?></td>
						<td><a href="ubah.php?id=<?= $row["id"]; ?>"><i class="bi bi-eyeglasses"></i></a></td>
						<td><img src="img/<?= $row["gambar"]; ?>" alt="img/<?= $row["gambar"]; ?>" width="40"></td>
						<td><?= $row["nama"]; ?></td>
					</tr>
				<?php $i++;
				endforeach; ?>
			</tbody>
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>