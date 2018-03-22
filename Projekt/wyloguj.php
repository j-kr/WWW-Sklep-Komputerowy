<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<title>Sklep komputerowy</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<?php	if($_SESSION['logowanie'] = 'zalogowano')
        {
		  echo '<META  http-equiv="refresh" content="2; URL=index.php">';
		}
	?>
	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<br>
<div class="wrapper cz1">
	<header id="header" class="clear">
	<br><h1>Wylogowanie!</h1><br>
	</header>
</div>
                        
<div class="wrapper cz2"><br>          

<?php
session_destroy();
echo '<p>Wylogowano!</p><br>';
//echo '<a href="index.php">Wróć</a>';
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


