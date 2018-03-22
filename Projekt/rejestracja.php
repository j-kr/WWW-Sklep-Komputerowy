
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<title>Sklep komputerowy</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<br>
<div class="wrapper cz1">
	<header id="header" class="clear">
	<br><h1>Rejestracja</h1><br>
	</header>
</div>
                        
<div class="wrapper cz2"><br>                



<form method='post' action='rejestracja.php'>
Wybierz login: <input type="text" name="rej_login" /><br><br>
Wybierz hasło: <input type="password" name="rej_haslo" /><br><br>
<input type="submit" name="rejestruj" value="Zarejestruj" />
</form>


<form method='post' action='index.php'>
<input class='input-btn' type='submit' value='    Wróć    '>
</form>

<?php

if (isset($_POST['rejestruj'])) {
	
	$rej_login=$_POST['rej_login'];
	$rej_haslo=$_POST['rej_haslo'];
	
	$serwer = "localhost";
	$baza = "baza";
	$uzytkownik = "root";
	$haslo = "";

	$polaczenie = mysqli_connect($serwer, $uzytkownik, $haslo) or die ("Nie mozna sie polaczyc z serwerem");
	mysqli_select_db($polaczenie, $baza) or die ("Nie mozna skomunikowac sie z baza danych");

	$zapytanie = "insert into users values ('', '".$rej_login."', '".$rej_haslo."', '0')";
	$wynik_p = mysqli_query($polaczenie, $zapytanie) or die("Nie udalo sie wykonac zapytania");
	mysqli_close($polaczenie);


echo "Pomyślnie dodano użytkownika!";
	
}
?>

</div>
<div class="wrapper cz1">
  <footer id="stopka" class="clear">
    <br><p>Autor: Jakub Kruczkowski</p><br>
  </footer>
</div>
<br>

</body>
</html>
