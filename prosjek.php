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
		
		<form action="" method="POST">
			<label>Ocjena prvog kolokvija:</label><br/>
			<input type="number" name= "prviBroj" id="prviBroj" min="1" max="5" step="1"/><br/>
			<label>Ocjena drugog kolokvija:</label><br/>
			<input type="number" name="drugiBroj" id="drugiBroj" min="1" max="5" step="1"/><br/>
			<input type="submit" value="Izračun prosjeka"/>
		</form>
		
		<hr/>
		<?php 
		if (isset($_POST["prviBroj"]) and isset($_POST["drugiBroj"]))
		{
			if ($_POST["prviBroj"] >= 1 and $_POST["prviBroj"] <= 5 and $_POST["drugiBroj"] >= 1 and $_POST["drugiBroj"] <= 5)
			{
				if ($_POST["prviBroj"] < 1.5 or $_POST["drugiBroj"] < 1.5)
					echo ("1<br/>");
				else
					echo("Prosjek ocjena<br/>".((round($_POST["prviBroj"], 0) + round($_POST["drugiBroj"], 0))/2)."<br/>");
			}
			else
				echo("Neispravan broj");
		}
		
		
		?>
		<br/>
		<hr/>
		
		<footer>
			<a href="https://github.com/Lukas321321/webzadatak">Copyright © Lukas Mahović</a> <img src="img/githubLogo.png" alt="Logo Githuba"/>
		</footer>
	</main>
</body>
</html>