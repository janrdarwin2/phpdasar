<!--
User Defined Function 
-->
<?php  
function salam($waktu = "datang", $nama = "Admin") {
	return "Selamat $waktu, $nama!";
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Latihan Function</title>
</head>
<body>
	<h1><?= salam(); ?></h1>
</body>
</html>