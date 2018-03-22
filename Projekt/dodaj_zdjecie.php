<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<title>Sklep komputerowy</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php	if(isset($_POST['aaa']))
        {
		  echo '<META  http-equiv="refresh" content="2; URL=index.php">';
		}
	?>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<br>
<div class="wrapper cz1">
	<header id="header" class="clear">
	<br><h1>Edycja Produktu</h1><br>
	</header>
</div>

<div class="wrapper cz2"><br>

	<?php
	if(isset($_FILES['plikuzytkownika']))
	{
	 if ($_FILES['plikuzytkownika']['error'] > 0)
	 {
	 	echo 'Problem: ';
	 	switch ($_FILES['plikuzytkownika']['error'])
	 	{
	 		case 1: echo 'Rozmiar pliku przekroczyl wartosc upload_max_filesize'; break;
	 		case 2: echo 'Rozmiar pliku przekroczyl wartosc max_file_size'; break; //nie moze byc wieksze niz pierwszy parametr
	 		case 3: echo 'Plik wyslany tylko czesciowo'; break;
	 		case 4: echo 'Nie wyslano zadnego pliku'; break;
	 	}
	 exit;
	 }
	// umieszczenie pliku w pozadanej lokalizacji
	 $lokalizacja = 'wyslane/'.$_FILES['plikuzytkownika']['name'];
	 //echo $_FILES['plikuzytkownika']['tmp_name'];
	 if (is_uploaded_file($_FILES['plikuzytkownika']['tmp_name']))
	 {
	 if (!move_uploaded_file($_FILES['plikuzytkownika']['tmp_name'], $lokalizacja))
	 {
	 echo 'Problem: Plik nie moze byc skopiowany do katalogu';
	 exit;
	 }
	 }
	 else
	 {
	 echo 'Przesylanie pliku nie powiodlo sie ';
	 echo $_FILES['plikuzytkownika']['name'];

	 }

	 $polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie polaczyc z serwerem");
	 mysql_query("SET NAMES 'latin2'");
	 mysql_select_db("baza", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");

	 $zapytanie = "INSERT INTO zdjecia (Nazwa_zdjecia) VALUES ('".$_FILES['plikuzytkownika']['name']."')";
	 $cos = mysql_query($zapytanie,$polaczenie);
	 if(! $cos)
	 {
		 die('Could not enter data: ' . mysql_error());
	 }
	 echo 'Plik wyslany<br><br>';
	 echo '<br><hr>';
 }
	?>




<?php

	$polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie
	polaczyc z serwerem");
	mysql_query("SET NAMES 'latin2'");
	mysql_select_db("baza", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");

	if(isset($_POST['plikuzytkownika']))
        {

          echo "Zapisano!<br />";
          $zapytanie = "UPDATE produkt SET producent_ID = '" .$_POST['producent'] ."', Nazwa = '" .$_POST['Nazwa'] ."', Kategoria = '"  .$_POST['kategoria'] ."', Cena = '" .$_POST['Cena'] ."', Opis = '" .$_POST['Opis'] ."', Zdjecie =  '" .$_POST['Zdjecie'] ."' where ID = '" .$_POST['ID'] ."'";

          $wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());

           die();
        }


?>

<form enctype="multipart/form-data" action="dodaj_zdjecie.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
Wyslij plik: <input name="plikuzytkownika" type="file">
<input type="submit" value="Wyslij">
</form>

<br>
	<a href="dodaj.php"><button style="width: 150px; height:20px;">Dodaj produkt </button> </a>
    <a href="dodajproducenta.php"><button style="width: 150px; height:20px;">Dodaj producenta </button> </a>
	<a href="edycjaproducenta.php"><button style="width: 150px; height:20px;">Edytuj producenta </button> </a>
<br>
<br>
</div>

<div class="wrapper cz1">
  <footer id="stopka" class="clear">
    <br><p>Autor: Jakub Kruczkowski</p><br>
  </footer>
</div>
<br>

</body>
</html>
