<?php 
//koneksi mysql
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data dari tabel mahasiswa /query
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);

// mysqli_fetch_row()
// mysqli_fetch_assoc()
// mysqli_fetch_array()
// mysqli_fetch_object()
// while ($mhs = mysqli_fetch_assoc($result)) {
// 	var_dump($mhs);
// }


// if (!$result) {
// 	echo mysqli_error($conn);
// }
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daftar Mahasiswa</title>
</head>
<body>
	<h1>Daftar Mahasiswa</h1>
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
		<?php 
		$i = 1;
		while ($row = mysqli_fetch_assoc($result)) :
		?>
		<tr>
			<td><?= $i ?></td>
			<td><a href="">Ubah</a> | <a href="">Hapus</a></td>
			<td><img src="img/<?= $row["gambar"]; ?>" alt="img/<?= $row["gambar"]; ?>" width="40"></td>
			<td><?= $row["nrp"]; ?></td>
			<td><?= $row["nama"]; ?></td>
			<td><?= $row["email"]; ?></td>
			<td><?= $row["jurusan"]; ?></td>
		</tr>
		<?php 
		$i++;
		endwhile; 
		?>
	</table>
</body>
</html>