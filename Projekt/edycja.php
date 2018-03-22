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

	$polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie
	polaczyc z serwerem");
	mysql_query("SET NAMES 'latin2'");
	mysql_select_db("baza", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");
        
	if(isset($_POST['aaa']))
        {
		 
          echo "Zapisano!<br />";  
          $zapytanie = "UPDATE produkt SET producent_ID = '" .$_POST['producent'] ."', Nazwa = '" .$_POST['Nazwa'] ."', Kategoria = '"  .$_POST['kategoria'] ."', Cena = '" .$_POST['Cena'] ."', Opis = '" .$_POST['Opis'] ."', Zdjecie =  '" .$_POST['zdjeciuchno']."' where ID = '".$_POST['ID']."'";
            
          $wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error()); 

           die();
        }
    $zapytanie = "select producent.Nazwa, produkt.Nazwa, Kategoria, Opis, Cena, Zdjecie from produkt INNER JOIN producent ON produkt.Producent_ID = producent.ID where produkt.ID = "  .$_POST['ID'];
	$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());
    $dane = mysql_fetch_array($wynik)
	
?>
        
        
        
        
        
<form action="edycja.php" method="post" style="text-align: center">
   
        Nazwa <br/>
        <input type="text" name="Nazwa"<?php echo " value='" .$dane[1]."' " ?>><br /><br />
        Cena <br>
        <input type="text" name="Cena"<?php echo " value='" .$dane[4]."' " ?>><br /><br />
        Opis <br>
        <input type="text" name="Opis"<?php echo " value='" .$dane[3]."' " ?>><br /><br />
        Zdjęcie<br>		
		<select name="zdjeciuchno"><br /><br />
				<?php
					$zapytanie = "SELECT * FROM lista_zdjec INNER JOIN zdjecia ON lista_zdjec.ID_zdjecia = zdjecia.ID_zdjecia WHERE lista_zdjec.ID_przedmiotu =". $_POST['ID'];
					$wynik = mysql_query($zapytanie, $polaczenie) or die(mysql_error());


					while($dane = mysql_fetch_array($wynik))
					{
						echo "<option>".$dane[2]."</option>";
					}



				 ?>
			</select><br /><br />
			
			

    <select name="kategoria"><br /><br />
		<option>Procesor</option>
		<option>Klawiatura</option>
		<option>Telefon</option>
	</select><br /><br />
	
    <select name="producent">
	
<?php

	$zapytanie = "SELECT ID, Nazwa from producent";
	$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error()); 

	while ($dane2 = mysql_fetch_array($wynik)) {
		
		echo "<option ";
		if($dane[0] == $dane2[1]) echo "selected ";
		echo "value = " . $dane2[0] ." >" .$dane2[1] ."</option>";
	}
	
	echo '</select> ';              
	echo '<input type="hidden" name="aaa" value="true">';
	echo '<input type="hidden" name="ID" value="' .$_POST['ID'] .'">';

?> 

<p><input type="submit" value="Zapisz" /></p>
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