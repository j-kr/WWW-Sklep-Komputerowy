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
	<br><h1>Dodawanie produktu</h1><br>
	</header>
</div>

<div class="wrapper cz2"><br>

<form action="dodaj.php" method="post" style="text-align: center">
    Nazwa <br/>
        <input type="text" name="Nazwa"><br /><br />
    Cena <br>
        <input type="text" name="Cena"><br /><br />
    Opis <br>
        <input type="text" name="Opis"><br /><br />	
	Zdjecie <br/> <br/>
				
				<?php

				$polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie polaczyc z serwerem");
				mysql_query("SET NAMES 'latin2'");
				mysql_select_db("baza", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");
				$zapytanie = "SELECT ID_zdjecia, Nazwa_zdjecia FROM zdjecia";
				$wynik = mysql_query($zapytanie,$polaczenie) or die(mysql_error());
				$ilosc = 0;
				$tab= array();
				while($dane = mysql_fetch_array($wynik))
				{
					$ilosc++;
					$tab[$ilosc] = $dane[1];
					echo '<input type="checkbox" name="img'.$ilosc.'" value="'.$dane[0].'"><img src="wyslane/'.$dane[1].'" alt="obrazek"></br>';
				}
				?>
		
        <select name="kategoria"><br /><br />
			<option>Procesor</option>
			<option>Klawiatura</option>
			<option>Telefon</option>
		</select><br /><br />
		
        <select name="producent">
<?php
    
    $polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie polaczyc z serwerem");
	mysql_query("SET NAMES 'latin2'");
	mysql_select_db("baza", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");
			
	$zapytanie = "SELECT ID, Nazwa from producent";

	$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error()); 

	while ($dane = mysql_fetch_array($wynik)) {   
		echo "<option value = " . $dane[0] ." >" .$dane[1] ."</option>";
	}

?> 
		</select>         
    
	<p> <input type="submit" value="Dalej" />
</form> 

<a href="index.php"><button> Wracaj </button> </a></p>

<?php

    if($_POST){
				$zapytanie = "SELECT ID FROM baza.produkt ORDER BY ID ASC";
				$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());
				while ($dane = mysql_fetch_array($wynik))
				{
					$id = $dane[0];
				}
				$set = false;
				$id++;
				for($i=1;$i<=$ilosc;$i++)
				{
					$imago = "img".$i;
					echo $imago;

					if(isset($_POST[$imago]))
					{
						echo $set;
						if ($set == false)
						{
							$set = true;
							$zapytanie = "INSERT INTO produkt (ID, Producent_ID, Nazwa, Kategoria, Cena, Opis, Zdjecie) VALUES ($id, '" .$_POST['producent'] ."', '" .$_POST['Nazwa'] ."', '"  .$_POST['kategoria'] ."', '" .$_POST['Cena'] ."', '" .$_POST['Opis'] ."', '".$tab[$i]."')";
							$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());
						}
						$zapytanie = "INSERT INTO lista_zdjec (ID_przedmiotu, ID_zdjecia) VALUES ($id,'".$_POST[$imago]."')";
						$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());
					}
				}
		echo "Dodano produkt.";
	}

?>


<br>
	<a href="index.php"><button style="width: 150px; height:20px;">Powrót </button> </a>
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