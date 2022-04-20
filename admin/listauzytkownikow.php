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
<div id="powitanieadmin"><br /><center>
<?php

echo "Lista klientów Vertical Bank";

?></center><br />
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

<div id="lista">
<p>
<?php

require_once "connect.php";

$conn = new mysqli($host, $db_user, $db_password, $db_name);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT imie, nazwisko, srodki, nrkonta FROM uzytkownicy";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  
  echo '<table><tr><th>Imię:</th><th>Nazwisko:</th><th>Środki:</th><th>Numer konta:</th></tr>';
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>{$row['imie']}</td><td>{$row['nazwisko']}</td><td>{$row['srodki']}</td><td>{$row['nrkonta']}</td></tr>";
  }
  echo '</table>';
  
} 

else {
  echo "0 results";
}
$conn->close();
?>
</p>





</div>

<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>







</div>











</body>
</html>