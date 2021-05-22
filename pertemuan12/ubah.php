<?php 
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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ubah data mahasiswa</title>
</head>
<body>
	<h1>Ubah data mahasiswa</h1>

	<form action="" method="post">
		<ul>
			<input type="hidden" name="id" id="id" required value="<?= $mhs['id'] ?>">
			
			<li>
				<label for="nrp">NRP:</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs['nrp'] ?>">
			</li>
			<li>
				<label for="nama">Nama:</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs['nama'] ?>">
			</li>
			<li>
				<label for="email">Email:</label>
				<input type="text" name="email" id="email" required value="<?= $mhs['email'] ?>">
			</li>
			<li>
				<label for="jurusan">Jurusan:</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs['jurusan'] ?>">
			</li>
			<li>
				<label for="gambar">Gambar:</label>
				<input type="text" name="gambar" id="gambar" value="<?= $mhs['gambar'] ?>">
			</li>
			<li>
				<button type="submit" name="submit">Ubah data</button>
				<button type="reset" name="reset">Reset</button>
			</li>
		</ul>
	</form>
</body>
</html>