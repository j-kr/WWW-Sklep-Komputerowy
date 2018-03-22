<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<title>Sklep komputerowy</title>
	<meta http-equiv="Content-Type" content="text/html, width=device-width, initial-scale=1" name="viewport"  />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<br>
<div class="wrapper cz1">
	<header id="header" class="clear">
	<br><h1>Szczegoly</h1><br>
	</header>

  <div class="wrapper cz2" style="text-align: center;font-size:25px;"></br>Szczegółowy Opis:</br></br>
    <div style="font-size:18px;">
      <?php
      $polaczenie = mysql_pconnect("localhost", "root", "") or die ("Nie mozna polaczyc sie z serwerem");
      mysql_query("SET NAMES utf8");
      mysql_select_db("baza", $polaczenie) or die ("Nie mozna skomunikowac sie z baza danych");


      $zapytanie = "SELECT Opis from produkt WHERE ID = ".$_POST['ID'];
      $wynik=mysql_query($zapytanie, $polaczenie) or die(mysql_error());
      $dane = mysql_fetch_array($wynik);
      echo $dane[0].'<br>;


       ?>
    </div>
  </div>


<div class="">
  <br>
  	<a href="dodaj.php"><button style="width: 150px; height:20px;">Dodaj produkt </button> </a>
      <a href="dodajproducenta.php"><button style="width: 150px; height:20px;">Dodaj producenta </button> </a>
  	<a href="edycjaproducenta.php"><button style="width: 150px; height:20px;">Edytuj producenta </button> </a>
  	<a href="dodaj_zdjecie.php"><button style="width: 150px; height:20px;">Dodaj Zdjecie </button> </a>
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
