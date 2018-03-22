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
	<br><h1>Dodawanie producnta</h1><br>
	</header>
</div>

<div class="wrapper cz2"><br>
                        
<form action="dodajproducenta.php" method="post" style="text-align: center">
    Nazwa <br/>
        <input type="text" name="Nazwa"><br /><br />
    Adres <br>
        <input type="text" name="Adres"><br /><br />
        <p><input type="submit" value="Wykonaj" />
</form> 


       
<?php
        
	if($_POST){
		echo "Dodano producenta.";  
		
		$polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie polaczyc z serwerem");
		mysql_query("SET NAMES 'latin2'");
		mysql_select_db("test", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");
		
		$zapytanie = "INSERT INTO baza.producent (ID, Nazwa, Adres) VALUES (NULL, '" .$_POST['Nazwa'] ."', '" .$_POST['Adres'] ."')";
		$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error()); 
	}
?>

<br>
	<a href="dodaj.php"><button style="width: 150px; height:20px;">Dodaj produkt </button> </a>
    <a href="index.php"><button style="width: 150px; height:20px;">Powrót </button> </a>
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