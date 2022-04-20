<?php

session_start();

if (!isset($_SESSION['zalogowany']))
{
	header('Location: ../index.php');
	exit();
}



?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta http-equiv="refresh" content = "300; url=../logout.php">
<link rel="stylesheet" href="../style.css" type="text/css">
<title>Twoje konto w Vertical Bank</title>
</head>

<body>

<div id="kontenerkonto">


<div id="logoadmin"><a href="../admin/admin.php"><img src="../grafiki/logo.gif" alt="Vertical Bank" ></a></div>
<div id="powitanieadmin"><center>
<?php
echo "<p>Witaj ".$_SESSION['imie'];
echo " ".$_SESSION['nazwisko'].'!</p>';
?></center>
</div>



<ol id="menu">
      
      <li class="dol"><a href="">Użytkownicy</a>
        <ul>
          <li><a href="../admin/dodajuzytkownika.php">Dodaj użytkownika</a></li>

          <li><a href="../admin/listauzytkownikow.php">Lista klientów</a></li>
            
        </ul>
      </li>

      <li><a href=""></a></li>
	  <li><a href=""></a></li>
	   <li><a href=""></a></li>
	  <li><a href=""></a></li>
	  
	  <li><a href="../logout.php">Wyloguj się!</a></li>
    </ol>

<center>
<a href="admin.php"><img src="admin.gif" alt="Admin" ></a>
</center>

<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>







</div>











</body>
</html>