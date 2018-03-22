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
	<br><h1>Edycja Producenta</h1><br>
	</header>
</div>
                        
<div class="wrapper cz2"><br>
<form action="edycjaproducenta.php" method="post" style="text-align: center">

<?php
	$polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna sie polaczyc z serwerem");

	mysql_query("SET NAMES utf8");

	mysql_select_db("test", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");
	$zapytanie = "SELECT ID, Nazwa from producent";

	$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error()); 
	echo "Producent <br/>";
	echo "<select name='producent'>";
	while ($dane2 = mysql_fetch_array($wynik)) {
		
	echo "<option ";
	//if($dane[0] == $dane2[1]) echo "selected ";
	echo "value = " . $dane2[0] ." >" .$dane2[1] ."</option>";
	}

	echo '</select><br /> ';    
	//echo '<input type="hidden" name="ID" value="' .$_POST['ID'] .'">';  
							
?>
	<br>Nazwa <br/>
        <input type="text" name="Nazwa"><br /><br />
    Adres <br>
        <input type="text" name="Adres"><br /><br />
		<input type="checkbox" name="Skasuj" value="Skasuj">Skasuj</input>
        <p><input type="submit" value="Wykonaj" />
</form> 

<?php       
        if($_POST) {
		$temp = $_POST['producent'];
		
		if (isset($_POST['Skasuj'])) {
			echo "Usunięto producenta.";
			$zapytanie = "DELETE FROM producent WHERE ID = '$temp'";
			$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());
		} 
		else {
            echo "Edytowano producenta.";  
			$zapytanie = "UPDATE producent SET Nazwa = '" .$_POST['Nazwa'] ."', Adres = '"  .$_POST['Adres'] ."' WHERE ID = '$temp'";
			$wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error()); 
		}
    }
?>


<br>
	<a href="dodaj.php"><button style="width: 150px; height:20px;">Dodaj produkt </button> </a>
    <a href="dodajproducenta.php"><button style="width: 150px; height:20px;">Dodaj producenta </button> </a>
	<a href="index.php"><button style="width: 150px; height:20px;">Powrót </button> </a>
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