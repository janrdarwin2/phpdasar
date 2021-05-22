<!-- Control Flow -->


  
<!-- // Pengulangan:
// -for
// -while
// -do .. while
// -foreach

// for ($i=0; $i < 5; $i++) { 
// 	echo "Hello World!<br>";
// }

// $i = 0;
// while ($i < 5) {
// 	echo "Hello World!<br>";
// 	$i++;
// }

// $i = 0;
// do {
// 	echo "Hello World!<br>";
// 	$i++;
// } while ( $i <= 4); -->

<!DOCTYPE html>
<html>
<head>
	<title>Latihan 1</title>
	<style>
		.warna-baris {
			background-color: lightgrey;
		}
	</style>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0">
	<?php for ($i=1; $i <= 5; $i++) : ?>
		<?php if ($i%2==1): ?> 
			<tr class="warna-baris">
			<?php else : ?>
			<tr>
		<?php endif; ?>
		<?php for ($j=1; $j <= 5; $j++) : ?>
			<td><?= "$i,$j"; ?></td>
		<?php endfor; ?>
		</tr>
	<?php endfor; ?>				
</table>
</body>
</html>
