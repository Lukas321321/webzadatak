<?php
 session_start();
 include("db.php");
 $connection = connect();

?>
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
			<a href="index.php?izbor=0">Početna stranica </a>
			<a href="index.php?izbor=1">Novosti </a>
			<a href="index.php?izbor=2">Kontakt </a>
			<a href="index.php?izbor=3">O&nbspnama </a>
			<a href="index.php?izbor=4">Galerija </a>
			<a href="index.php?izbor=9">Lebowski </a>
			
			<?php
			if (isset($_SESSION["login"]) and $_SESSION["login"] > 0)
			{
				echo("<a href=\"index.php?izbor=7\">CMS </a>");
				echo("<a href=\"index.php?izbor=10\">Odjava </a>");
			}
			else
				echo("<a href=\"index.php?izbor=5\">Prijava </a><a href=\"index.php?izbor=6\">Registracija </a>");
			?>
		</nav>

		<?php
		if (isset($_GET['izbor']))
			$switcheroo = $_GET['izbor'];
		else
			$switcheroo = 0;
			
			switch($switcheroo)
			{
				case 1: 
					include("novosti.php");
					break;
				case 2:
					include("kontakt.php");
					break;
				case 3:
					include("about.php");
					break;
				case 4:
					include("galerija.php");
					break;
				case 5:
					include("prijava.php");
					break;
				case 6:
					include("registracija.php");
					break;
				case 7:
					include("cms.php");
					break;
				case 8:
					include("clanak.php");
					break;
				case 9:
					include("nekifilm.php");
					break;
				case 10:
					{
					
					session_unset();
					session_destroy();
					header("Refresh:0, url=index.php?izbor=0");
					}
					break;
				default:
					include("glavna.php");
					break;
			}
		?>
		
		<footer>
			<a href="https://github.com/Lukas321321/webzadatak">Copyright © Lukas Mahović</a> <img src="img/githubLogo.png" alt="Logo Githuba"/>
		</footer>
	</main>
</body>
</html>