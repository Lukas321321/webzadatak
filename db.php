<?php
function connect()
{
	$dbAddress = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "webdip";
	$dbPort = "3306";
	$connection = mysqli_connect($dbAddress, $dbUsername, $dbPassword, $dbName, $dbPort);
	mysqli_set_charset($connection, "utf8");
	return $connection;
}

function popuni()
{
	$popunilo = array("AF", "AX", "AL", "DZ", "AS", "AD", "AO", "AI", "AQ", "AG", "AR", "AM", "AW", "AU", "AT", "AZ", "BH", "BS", "BD", "BB", "BY", "BE", "BZ", "BJ", "BM", "BT", "BO", "BQ", "BA", "BW", "BV", "BR", "IO", "BN", "BG", "BF", "BI", "KH", "CM", "CA", "CV", "KY", "CF", "TD", "CL", "CN", "CX", "CC", "CO", "KM", "CG", "CD", "CK", "CR", "CI", "HR", "CU", "CW", "CY", "CZ", "DK", "DJ", "DM", "DO", "EC", "EG", "SV", "GQ", "ER", "EE", "ET", "FK", "FO", "FJ", "FI", "FR", "GF", "PF", "TF", "GA", "GM", "GE", "DE", "GH", "GI", "GR", "GL", "GD", "GP", "GU", "GT", "GG", "GN", "GW", "GY", "HT", "HM", "VA", "HN", "HK", "HU", "IS", "IN", "ID", "IR", "IQ", "IE", "IM", "IL", "IT", "JM", "JP", "JE", "JO", "KZ", "KE", "KI", "KP", "KR", "KW", "KG", "LA", "LV", "LB", "LS", "LR", "LY", "LI", "LT", "LU", "MO", "MK", "MG", "MW", "MY", "MV", "ML", "MT", "MH", "MQ", "MR", "MU", "YT", "MX", "FM", "MD", "MC", "MN", "ME", "MS", "MA", "MZ", "MM", "NA", "NR", "NP", "NL", "NC", "NZ", "NI", "NE", "NG", "NU", "NF", "MP", "NO", "OM", "PK", "PW", "PS", "PA", "PG", "PY", "PE", "PH", "PN", "PL", "PT", "PR", "QA", "RE", "RO", "RU", "RW", "BL", "SH", "KN", "LC", "MF", "PM", "VC", "WS", "SM", "ST", "SA", "SN", "RS", "SC", "SL", "SG", "SX", "SK", "SI", "SB", "SO", "ZA", "GS", "SS", "ES", "LK", "SD", "SR", "SJ", "SZ", "SE", "CH", "SY", "TW", "TJ", "TZ", "TH", "TL", "TG", "TK", "TO", "TT", "TN", "TR", "TM", "TC", "TV", "UG", "UA", "AE", "GB", "US", "UM", "UY", "UZ", "VU", "VE", "VN", "VG", "VI", "WF", "EH", "YE", "ZM", "ZW");
	
	foreach ($popunilo as $popunak)
	{
		echo ("<option value=\"$popunak\">$popunak</option>");
	}
}

function register($connection)
{
	if (isset($_POST['ime'], $_POST['prezime'], $_POST['email'], $_POST['sifraA'], $_POST['sifraB'], $_POST['zemlja'], $_POST['grad'], $_POST['ulica'], $_POST['rodjenje']))
	{
		if ($_POST['sifraA'] == $_POST['sifraB'])
		{
			$ime = htmlspecialchars($_POST['ime']);
			$prezime = htmlspecialchars($_POST['prezime']);
			$email = htmlspecialchars($_POST['email']);
			$sifra = password_hash(htmlspecialchars($_POST['sifraA']), CRYPT_BLOWFISH);
			$zemlja = htmlspecialchars($_POST['zemlja']);
			$grad = htmlspecialchars($_POST['grad']);
			$ulica = htmlspecialchars($_POST['ulica']);
			$rodjenje = htmlspecialchars($_POST['rodjenje']);
			
			
			$query = "INSERT INTO users (name, surname, email, password, country, city, street, birthdate)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?);";
	
			$statement = mysqli_stmt_init($connection);
	
			mysqli_stmt_prepare($statement, $query);
			mysqli_stmt_bind_param($statement, "sssssssi", $ime, $prezime, $email, $sifra, $zemlja, $grad, $ulica, $rodjenje);
			mysqli_stmt_execute($statement);
				
			echo("<br/>Registrirani ste!<br/>");
			
		}
		else
			echo("<br/><b>Lozinke se ne poklapaju</b><br/>");
	}
}

function prijava($connection)
{
	if (isset($_POST['email'], $_POST['password']))
	{
		
		$email = htmlspecialchars($_POST['email']);
		$sifra = htmlspecialchars($_POST['password']);
		
		$query = 'SELECT users.email, users.password, users.level FROM users WHERE email = ? LIMIT 1;';
		
		$statement = mysqli_stmt_init($connection);
	
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, "s", $email);
		mysqli_stmt_bind_result($statement, $dbEmail, $dbPassword, $dbLevel);
		mysqli_stmt_execute($statement);
		mysqli_stmt_fetch($statement);
		//echo(mysqli_error($connection));
		
		if (isset($dbEmail, $dbPassword, $dbLevel))
		{
			if (password_verify($sifra, $dbPassword))
			{
				$_SESSION["login"] = $dbLevel + 1;
				header("Refresh:0");
			}
		}
	}
}

function dajVijesti($connection)
{
	$query = 'SELECT vijesti.id, vijesti.naslov, vijesti.slika, vijesti.tekst, vijesti.datum, vijesti.arhiva FROM vijesti ORDER BY vijesti.datum DESC;';
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_result($statement, $dbId, $dbNaslov, $dbSlika, $dbTekst, $dbDatum, $dbArhiva);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	
	while (mysqli_stmt_fetch($statement))
	{
		if ($dbArhiva == 0)
		{
			echo 
			"
			<div class=\"preview\">
				<img src=\"$dbSlika\"/>
				<a href=\"index.php?izbor=8&id=$dbId\"><h2>$dbNaslov</h2></a>
				<p>
				$dbTekst
				</p>
				<div class=\"datumObjave\">
				".date('d.m.Y', strtotime($dbDatum))."
				</div>	
			</div>
			";
		}
	}
}

function dajClanak($connection, $id, $polje)
{
	$query = 'SELECT vijesti.naslov, vijesti.tekst, vijesti.datum, vijesti.slika FROM vijesti WHERE id = ?;';
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param($statement, "i", $id);
	mysqli_stmt_bind_result($statement, $dbNaslov, $dbTekst, $dbDatum, $dbSlika);
	mysqli_stmt_execute($statement);
	mysqli_stmt_fetch($statement);
	
	switch ($polje)
	{
		case 0:
			echo $dbNaslov;
		break;
		case 1:
			echo $dbTekst;
		break;
		case 2:
			echo date('d.m.Y', strtotime($dbDatum));
		break;
		case 3:
			echo $dbSlika;
			break;
	}
}

function dajSlikeClanak($connection, $id)
{
	$query = 'SELECT slika FROM slike WHERE clanakId = ?;';
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param($statement, "i", $id);
	mysqli_stmt_bind_result($statement, $dbSlika);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	
	while (mysqli_stmt_fetch($statement))
	{
		echo
		"
		<img src=\"$dbSlika\">
		";
	}
}

function dajSlikeGalerija($connection)
{
	$query = 'SELECT slika, opis FROM slike;';
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_result($statement, $dbSlika, $dbOpis);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	
	while (mysqli_stmt_fetch($statement))
	{
		echo
		"
		<figure>
				<a href=\"$dbSlika\"><img class=\"galerijskaSlika\" src=\"$dbSlika\"/></a>
				<figcaption>$dbOpis</figcaption>
			</figure>
		";
	}
}

function dajPopisKorisnika($connection)
{
	$query = 'SELECT id, name, surname, email, level FROM users;';
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_result($statement, $dbId, $dbIme, $dbPrezime, $dbMail, $dbLevel);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	
	while (mysqli_stmt_fetch($statement))
	{
		echo
		"
		<b>$dbIme $dbPrezime</b> $dbMail<br/>
		Razina pristupa: $dbLevel<br/>
		<form action=\"\" method=\"POST\">
		<input id=\"razina\" name=\"razina\" type=\"number\" min = \"0\" max=\"2\" value=\"$dbLevel\" step=\"1\"/> <button value=\"$dbId\" name=\"promjeniRazinu\" id=\"promjeniRazinu\">Promjeni korisničku razinu pristupa</button><br/>
		<button value=\"$dbId\" name=\"brisalo\" id=\"brisalo\"><b style=\"color: red;\">Obriši korisnika</b></button>
		</form>  <br/><br/>
		";
	}
}

function dajPopisVijesti($connection, $level)
{
	$query = 'SELECT id, naslov, datum, arhiva FROM vijesti ORDER BY id DESC;';
	
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_result($statement, $dbId, $dbNaslov, $dbDatum, $dbArhiva);
	mysqli_stmt_execute($statement);
	mysqli_stmt_store_result($statement);
	
	while (mysqli_stmt_fetch($statement))
	{
		echo "<form action=\"\" method=\"POST\"><b>$dbNaslov</b> ".date('d.m.Y', strtotime($dbDatum))."  <button value=\"$dbId\"";
		
		if ($dbArhiva == 1)
		{
			echo "name=\"dearhiviralo\" id=\"dearhiviralo\"><b>Vrati vijest iz arhive";
		}
		else
		{
			echo "name=\"arhiviralo\" id=\"arhiviralo\"><b>Arhiviraj vijest";
		}
		if ($_SESSION["login"] > 2)
		{
			echo "<form action=\"\" method=\"POST\"><button value=\"$dbId\" name=\"vjBrisalo\" id=\"vjBrisalo\"><b style=\"color: red;\">Obriši vijest</b></button></form>";
		}
		echo "</b></button></form><br/><br/>";
	}
	
}

function arhiviraj($connection, $n, $id)
{
	$query = "UPDATE vijesti SET arhiva = ? WHERE id = ?;";
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param($statement, "ii", $n, $id);
	mysqli_stmt_execute($statement);
}
?>