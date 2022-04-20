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


<div id="logo"><a href="../twojekonto.php"><img src="../grafiki/logo.gif" alt="Vertical Bank" ></a></div>

<ol id="menu">
      
      <li class="dol"><a href="">Przelewy</a>
        <ul>
          <li><a href="#">Nowy przelew</a></li>

          <li><a href="../podstronykonta/historiaprzelewow.php">Historia przelewów</a></li>
            
          <li class="prawo"><a href="#">Podatki</a>
            <ol>
              <li><a href="../podstronykonta/zus.php">ZUS</a></li>
              <li><a href="../podstronykonta/pit.php">PIT</a></li>
            </ol>
          </li>

        
        </ul>
      </li>

      <li class="dol"><a href="">Produkty</a>
        <ul>
          <li><a href="../podstronykonta/stankonta.php">Stan konta</a></li>

          <li class="prawo"><a href="#">Dane konta</a>
            <ol>
              <li><a href="../podstronykonta/ustawienia.php">Ustawienia</a></li>
              <li><a href="../podstronykonta/pomoc.php">Pomoc</a></li>
            </ol>
          </li>
        </ul>
      </li>

      <li class="dol"><a href="">Oferta banku</a>
	  <ul>
          <li><a href="../podstronykonta/kredytmieszkaniowy.php">Kredyt mieszkaniowy</a></li>
          <li><a href="../podstronykonta/kredytgotowkowy.php">Kredyt gotówkowy</a></li>
          <li><a href="../podstronykonta/kontooszczednosciowe.php">Konto oszczędnościowe</a></li>
         
        </ul>
		</li>

      <li><a href=""></a></li>
	  <li><a href=""></a></li>
	  
	  <li><a href="../logout.php">Wyloguj się!</a></li>
    </ol>
	
	
	<div id="przelewamy">
	
	
	<br /><br /><b>
	<center>Zleć przelew:</center></b>
<br /><br />
<form method="post"><b>
Podaj kwotę przelewu:</b>
<input type="number" step="0.01" name="wyslijsrodki" /> <b>PLN</b>

<br /><br />
<b>
Podaj numer konta Twojego urzędu Skarbowego:</b>
<input type="text" name="podajnrkonta" />

<br /><br />

<input type="submit" value="Wyślij przelew" />
</form>
	
	<?php
	
	
if (isset($_POST['wyslijsrodki']) && isset($_POST['podajnrkonta']))

{

$wyslijsrodki = $_POST['wyslijsrodki'];
$podajnrkonta = $_POST['podajnrkonta'];
$nrkonta = $_SESSION['nrkonta'];
$srodki = $_SESSION['srodki'];

require_once "connect.php";

try 
{
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{
    if($polaczenie->query("UPDATE `uzytkownicy` SET `srodki` = (`srodki`+'$wyslijsrodki') WHERE `uzytkownicy`.`nrkonta` = '$podajnrkonta';") )
			{
				echo "Przelew został wysłany!";
				
				
				
				
			}
			
			else
			{
				echo "Ech";
			}
			
			if($polaczenie->query("UPDATE `uzytkownicy` SET `srodki` = (`srodki`-'$wyslijsrodki') WHERE `uzytkownicy`.`nrkonta` = '$nrkonta';") )
			{
				echo "";
			}
			
			else
			{
				echo "Ech";
			}
				
			
}
	
}

catch(Exception $e)
{
	echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności</span>';
	 echo '<br />Informacja developerska: '.$e;
}
}
	
	
	
	?>
	
	
	</div>







<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>




</div>











</body>
</html>