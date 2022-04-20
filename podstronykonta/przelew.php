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

<div id="Potwierdzenie przelewu">

<?php


if(isset($_POST['wyslijsrodki']))
$poprawnie=true;
$wyslijsrodki = $_POST['wyslijsrodki'];
$podajnrkonta = $_POST['podajnrkonta'];
				
				
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
		
	
	   {
	
		
		if($polaczenie->query("UPDATE uzytkownicy set srodki=(srodki+wyslijsrodki) where nrkonta=podajnrkonta && update uzytkownicy set srodki=(srodki-wyslijsrodki) where nrkonta=nrkonta"))
			
			{
				
			}
			else
			{
				throw new Exception($polaczenie->error);
			}
		
		
	   }
		
	
	}
}

catch(Exception $e)
{
	echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności</span>';
	 echo '<br />Informacja developerska: '.$e;
}
			
			
			
			
			
		
	        
		
		
	
	?>


</div>











</div>











</body>
</html>