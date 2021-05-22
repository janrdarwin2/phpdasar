<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Latihan 3</title>
	<style>
		.warna-gelap {
			background-color: silver;
		}
	</style>
</head>
<body>
	<table border="1" cellpadding="10" cellspacing="0"> <?php for ($i=1; $i <= 5; $i++) : if ($i % 2 ==1) :?>
		<tr class="warna-gelap"> <?php else : ?>
		<tr> <?php endif; for ($j=1; $j <=5; $j++) : ?>
			<td> <?= "$i,$j"; ?> </td> <?php endfor; ?>
		</tr> <?php endfor; ?>
	</table> <?php echo("$i,$j"); ?>
</body>
</html>