<?php
session_start();
//jeśli w sesji jest, że jesteśmy zalogowani, to nas przenosi do konta na które się zalogowaliśmy
if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
	header('Location: twojekonto.php');
	exit();
}

?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="description" content="Strona Verical Bank" />
<meta name="keywords" content="bank, top1, oszczędności, kredyt, pieniądze" />
<link rel="stylesheet" href="style.css" type="text/css">

<title>Witaj w Vertical Bank!</title>
</head>

<body>

<div id="kontener">


   <div id="logo"><a href="index.php"><img src="grafiki/logo.gif" alt="Vertical Bank" ></a></div>

   

   <div id="panellogowania">
   <br /><br />

<center>
<form action="logowanie.php" method="post">

Login (E-Mail): <br /> <input type="text" name="login" /> <br />
Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
<input type="submit" value="Zaloguj się" />

</form>
</center>
  </div>



<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>

</div>









<?php
if(isset($_SESSION['blad']))
echo $_SESSION['blad'];

?>








</body>
</html>