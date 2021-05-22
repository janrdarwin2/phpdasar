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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<h1>Daftar Mahasiswa</h1>
	<a href="tambah.php">Tambah data mahasiswa</a>
	<br><br>
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus="" placeholder="keyword pencarian..." autocomplete="off">
		<button type="submit" name="cari">Cari</button>
		<button type="reset" name="reset">Batal</button>
	</form>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NRP</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i = 1; foreach ($mahasiswa as $row) : ?>
		<tr>
			<td><?= $i ?></td>
			<td><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> | <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin?')">Hapus</a></td>
			<td><img src="img/<?= $row["gambar"]; ?>" alt="img/<?= $row["gambar"]; ?>" width="40"></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<?php $i++; endforeach; ?>
	</table>
</body>
</html>