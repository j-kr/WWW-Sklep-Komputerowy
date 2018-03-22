<?php
session_start();
?>

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
	<br><h1>Logowanie</h1><br>
	</header>
</div>
                        
<div class="wrapper cz2"><br>          
<?php
$error='';


if (isset($_POST['submitlog'])) {
	//echo 'xxx  '.$_POST['login'].' xxx    '.$_POST['haslop'];
if (($_POST['login']=='') and ($_POST['haslop']=='')) {
	
$error = "Username or Password is invalid";
echo '<p>Nie wpisano loginu i hasła!</p><br>';
}
else
{
$ile_znalezionych=0;
$login=$_POST['login'];
$haslop=$_POST['haslop'];

$serwer = "localhost";
$baza = "baza";

$uzytkownik = "root";
$haslo = "";

$polaczenie = mysqli_connect($serwer, $uzytkownik, $haslo) or die ("Nie mozna sie polaczyc z serwerem");
mysqli_select_db($polaczenie, $baza) or die ("Nie mozna skomunikowac sie z baza danych");

$wynik=mysqli_query($polaczenie, "SELECT * FROM users WHERE login= '".$login."' AND password = '".$haslop."'") or die("mysql_error()");
$ile_znalezionych=mysqli_num_rows($wynik);

//echo 'yyy  '.$login.' yyy    '.$haslop;


	if ( $ile_znalezionych== 1){
	$dane= mysqli_fetch_assoc($wynik);
    $_SESSION['user'] = $login;
    $_SESSION['logowanie'] = 'zalogowano';
	echo '<p> Zalogowano pomyślnie ! </p><br>';
	if ($dane['czy_Admin']== 1){
		$_SESSION['czy_ad'] = 'admin';
		echo '<p>Konto z uprawnieniami administratora</p><br>';
	}
	else{
	 $_SESSION['czy_ad'] = 'user';
	}
	
    } else {
		


echo '<p>Nieprawidłowy login lub hasło!</p><br>';

$error = "Username or Password is invalid";
}

mysqli_close($polaczenie);
}
}
?>
	<?php	if((@$_SESSION['logowanie'] == 'zalogowano') or (@$_SESSION['logowanie'] == ''))
        {
		  echo '<META  http-equiv="refresh" content="2; URL=index.php">';
		}
	?>
<!-- <a href="index.php">Wróć</a> -->
</div>
<div class="wrapper cz1">
  <footer id="stopka" class="clear">
    <br><p>Autor: Jakub Kruczkowski</p><br>
  </footer>
</div>
<br>

</body>
</html>