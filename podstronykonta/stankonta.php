<?php
session_start();

if (!isset($_SESSION['zalogowany']))
{
	header('Location: ../index.php');
	exit();
}
$numer = $_SESSION['nrkonta'];


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
          <li><a href="../podstronykonta/nowyprzelew.php">Nowy przelew</a></li>

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
          <li><a href="#">Stan konta</a></li>

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

<center>
<div id="srodki">
<table>
<br /><br />

	<?php
	
	require_once "connect.php";

$conn = new mysqli($host, $db_user, $db_password, $db_name);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `srodki` FROM `uzytkownicy` where `nrkonta`='$numer';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    echo "<b>Twoje środki: {$row['srodki']} PLN</b>";
  }
  echo '</table>';
  
} 

else {
  echo "0 results";
}
$conn->close();
?>

<br /><br />
</table>
</div>
</center>


<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>









</div>











</body>
</html>