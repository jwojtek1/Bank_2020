<?php
session_start();

if(!isset($_SESSION['udanarejestracja']))
{
	header('Location: index.php');
	exit();
}
else
{
	unset($_SESSION['udanarejestracja']);
	
}

?>




<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="refresh" content = "5; url=logout.php">
<link rel="stylesheet" href="style.css" type="text/css">
<title>Witaj w Vertical Bank!</title>
</head>

<body>

<div id="kontener">


   <div id="logo"><a href="index.php"><img src="grafiki/logo.gif" alt="Vertical Bank" ></a></div>
<br /><br />
<center>Dziękujemy za założenie konta w naszym banku!</center><br /><br />
<br /><br />
<center><a href="index.php">Zaloguj się na swoje nowe konto!</a></center>

<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>

</div>



</body>
</html>