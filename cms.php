<b>Unos vijesti</b>
<hr/>
<?php 
if ($_SESSION["login"] > 0)
{
	if (isset($_POST["naslov"], $_FILES["slika"]["name"], $_POST["tekst"], $_POST["datum"]))
	{
		move_uploaded_file($_FILES["slika"]["tmp_name"], "img/".$_FILES["slika"]["name"]);
		$slika = "img/".$_FILES["slika"]["name"];
		
		$query = "INSERT INTO vijesti (naslov, slika, tekst, datum, arhiva) VALUES (?, ?, ?, ?, 1);";
		$statement = mysqli_stmt_init($connection);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, "ssss", $_POST["naslov"], $slika, $_POST["tekst"], $_POST["datum"]);
		mysqli_stmt_execute($statement);
	}
}
?>
<form action="" method="POST" enctype="multipart/form-data"><br/>
	<label>Naslov: </label><input type="text" id="naslov" name="naslov"/><br/>
	<label>Slika: </label><input type="file" accept="image/png" id="slika" name="slika"/><br/>
	<label>Tekst: </label><input type="text" id="tekst" name="tekst"/><br/>
	<label>Datum: </label><input type="date" id="datum" name="datum"/><br/>
	<input type="submit" value="Spremi">
</form><br/><br/>

<?php 
if ($_SESSION["login"] > 1)
{
	echo "<b>Rad s vijestima</b><hr/>";
	
	if (isset($_POST["arhiviralo"]))
	{
		arhiviraj($connection, 1, $_POST["arhiviralo"]);
	}
	if (isset($_POST["dearhiviralo"]))
	{
		arhiviraj($connection, 0, $_POST["dearhiviralo"]);
	}
	if (isset($_POST["vjBrisalo"]))
	{
		$query = "DELETE FROM vijesti WHERE id = ?;";
		$statement = mysqli_stmt_init($connection);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, "i", $_POST["vjBrisalo"]);
		mysqli_stmt_execute($statement);
	}

	dajPopisVijesti($connection, $_SESSION["login"]);
}
?>

<?php 
if ($_SESSION["login"] > 2)
{
	echo "<b>Rad s korisnicima</b><hr/>";
	if (isset($_POST["brisalo"]))
	{
		$query = "DELETE FROM users WHERE id = ?;";
		$statement = mysqli_stmt_init($connection);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, "i", $_POST["brisalo"]);
		mysqli_stmt_execute($statement);
	}
	if (isset($_POST["promjeniRazinu"]))
	{
		$query = "UPDATE users SET level = ? WHERE id = ?;";
		$statement = mysqli_stmt_init($connection);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, "ii", $_POST["razina"], $_POST["promjeniRazinu"]);
		mysqli_stmt_execute($statement);
	}

	echo "<br/>";
		dajPopisKorisnika($connection);
}
?>