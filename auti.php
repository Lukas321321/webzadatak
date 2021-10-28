<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zadatak</title>
	<meta charset="UTF-8">
	<meta name="description" content="Ovo je zadatak">
	<meta name="author" content="Lukas Mahović">
	<meta name="keywords" content="Zadatak, Projekt, Web, SEO">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>

<body>
	<main>
		<header></header>
		<nav>
			<a href="index.html">Početna stranica</a>
			<a href="novosti.html">Novosti</a>
			<a href="kontakt.html">Kontakt</a>
			<a href="about.html">O&nbspnama</a>
			<a href="galerija.html">Galerija</a>
		</nav>

		<?php
		
		$auti = array("Nissan", "Zastava", "Fiat");
		
		echo("<ol>");
		
		foreach($auti as $auto)
		{
			echo("<li>".$auto."</li>");
		}
		
		echo("</ol>");
		
		?>
		
		<footer>
			<a href="https://github.com/Lukas321321/webzadatak">Copyright © Lukas Mahović</a> <img src="img/githubLogo.png" alt="Logo Githuba"/>
		</footer>
	</main>
</body>
</html>