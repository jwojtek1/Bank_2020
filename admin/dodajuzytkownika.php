<?php
session_start();

if(isset($_POST['mail']))
{
	//jeżeli udana walidacja to true
	$poprawnie=true;
	
	//Sprawdź poprawność imienia
	
$imie = $_POST['imie'];

//sprawdzenie poprawności długości imienia
if((strlen($imie)<3) || (strlen($imie)>20))
{
	$poprawnie=false;
	$_SESSION['e_imie']="Imię musi posiadać od 3 do 20 znaków!";
}

$nazwisko = $_POST['nazwisko'];

//sprawdzenie poprawności długości nazwiska
if((strlen($nazwisko)<2) || (strlen($imie)>20))
{
	$poprawnie=false;
	$_SESSION['e_nazwisko']="Nazwisko musi posiadać od 2 do 20 znaków!";
}

$ulica = $_POST['ulica'];

//sprawdzenie poprawności długości ulicy
if((strlen($ulica)<3) || (strlen($ulica)>30))
{
	$poprawnie=false;
	$_SESSION['e_ulica']="Nazwa ulicy musi posiadać od 3 do 20 znaków!";
}

$miasto = $_POST['miasto'];

//sprawdzenie poprawności długości nazwy miasta
if((strlen($miasto)<2) || (strlen($miasto)>30))
{
	$poprawnie=false;
	$_SESSION['e_miasto']="Nazwa miasta musi posiadać od 2 do 20 znaków!";
}







//randomizer do numeru konta
        function generateRandomNumber($length = 15, $formatted = false) {
          $nums = '0123456789';
       
          $out = $nums[mt_rand( 1, strlen($nums)-1 )];
        
          for ($p = 0; $p < $length-1; $p++)
              $out .= $nums[mt_rand( 0, strlen($nums)-1 )];
        
          if ($formatted)
              return number_format($out);
          return $out;
      }
        
        $nrkonta = generateRandomNumber(26);
   
        






//Sprawdzenie maila czy jest poprawnie wpisany z małpą

$mail=$_POST['mail'];
$mailB=filter_var($mail, FILTER_SANITIZE_EMAIL);

if((filter_var($mailB, FILTER_VALIDATE_EMAIL)==false) || ($mailB!=$mail))
{
$poprawnie=false;
$_SESSION['e_mail']="Podaj poprawny E-Mail!";	
	
}

//Sprawdzenie czy oba hasła są takie same i czy długość jest dłuższa jak 8 i krótsza jak 20
$haslo1 = $_POST['haslo1'];
$haslo2 = $_POST['haslo2'];

if((strlen($haslo1)<8)||(strlen($haslo1)>20))
{
	$poprawnie=false;
	$_SESSION['e_haslo']="Hasło musi mieć od 8 do 20 znaków!";
}

if($haslo1!=$haslo2)
{
	$poprawnie=false;
	$_SESSION['e_haslo']="Podane hasła są różne!";
}

$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);

//Czy zaakceptowano regulamin?

if(!isset($_POST['regulamin']))
	{
	$poprawnie=false;
	$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu";
}

// tutaj odbywają się czary z bazą danych
require_once "connect.php";
mysqli_report(MYSQLI_REPORT_STRICT);

try 
{
	$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
	if ($polaczenie->connect_errno!=0)
	
	{
		throw new Exception(mysqli_connect_errno());
	}
	else
	{
		//Czy email już istnieje?
		$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE mail='$mail'");
		
		if(!$rezultat) throw new Exception($polaczenie->error);
		
		$ile_takich_maili = $rezultat->num_rows;
		if($ile_takich_maili>0)
		{
			$poprawnie=false;
			$_SESSION['e_mail']="Istnieje już konto przypisane do tego adresu e-mail!";
		}
		// Czy wybrany numer konta już istnieje?
		$nrkontarezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE nrkonta='$nrkonta'");

        if(!$nrkontarezultat) throw new Exception($polaczenie->error);

        $ile_takich_nrkonta = $nrkontarezultat->num_rows;
        if($ile_takich_nrkonta>0)
		{
			$poprawnie=false;
			$_SESSION['e_nrkonta']="Istnieje już taki numer konta, wybierz inny!";
		}
		
		
		
		
		
		if($poprawnie==true)
	
	{
		//Jeśli dane są poprawne wrzucamy je do bazy danych
		
		if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nrkonta', '$imie', '$nazwisko', now(), '$ulica', '$miasto', '$mail', '$haslo_hash', 1000, 0)"))
			
			{
				$_SESSION['udanarejestracja']=true;
				echo "Użytkownik został dodany!";
			}
			else
			{
				throw new Exception($polaczenie->error);
			}
		
		
	}
		
		$polaczenie->close();
	}
}

catch(Exception $e)
{
	echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności</span>';
	 //echo '<br />Informacja developerska: '.$e;
}





}



?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" href="../style.css" type="text/css">
<title>Vertical Bank - utwórz nowego użytkownika</title>

 <style>
 .error
 {
	 color:red;
     margin-top: 10px;
     margin-bottom: 10px;
 
 }
 </style>
 
</head>

<body>

<div id="kontener">

<div id="logoadmin"><a href="../admin/admin.php"><img src="../grafiki/logo.gif" alt="Vertical Bank" ></a></div>
<div id="powitanieadmin"><br /><center>
<?php
echo "UWAGA - tworzysz nowe konto bankowe!";
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
	
<center>
<form method="post">

<br />

Imię: <br /> <input type="text" name="imie" /><br />
<?php
if(isset($_SESSION['e_imie']))
{
	echo'<div class="error">'.$_SESSION['e_imie'].'</div>';
	unset($_SESSION['e_imie']);
}
?>


Nazwisko: <br /> <input type="text" name="nazwisko" /><br />
<?php
if(isset($_SESSION['e_nazwisko']))
{
	echo'<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
	unset($_SESSION['e_nazwisko']);
}
?>

Ulica zamieszkania: <br /> <input type="text" name="ulica" /><br />
<?php
if(isset($_SESSION['e_ulica']))
{
	echo'<div class="error">'.$_SESSION['e_ulica'].'</div>';
	unset($_SESSION['e_ulica']);
}
?>

Miasto zamieszkania: <br /> <input type="text" name="miasto" /><br />
<?php
if(isset($_SESSION['e_miasto']))
{
	echo'<div class="error">'.$_SESSION['e_miasto'].'</div>';
	unset($_SESSION['e_miasto']);
}
?>

E-Mail: <br /> <input type="text" name="mail" /><br />
<?php
if(isset($_SESSION['e_mail']))
{
	echo'<div class="error">'.$_SESSION['e_mail'].'</div>';
	unset($_SESSION['e_mail']);
}
?>



Hasło: <br /> <input type="password" name="haslo1" /><br />
<?php
if(isset($_SESSION['e_haslo']))
{
	echo'<div class="error">'.$_SESSION['e_haslo'].'</div>';
	unset($_SESSION['e_haslo']);
}
?>

Powtórz hasło: <br /> <input type="password" name="haslo2" /><br />
<br />
<label>
<input type="checkbox" name="regulamin" /> Klient akceptuje umowę z bankiem?
<br />
</label>

<?php
if(isset($_SESSION['e_regulamin']))
{
	echo'<div class="error">'.$_SESSION['e_regulamin'].'</div>';
	unset($_SESSION['e_regulamin']);
}
?>


<br />
		
		<input type="submit" value="Utwórz nowe konto!" />
		

</form>
</center>

<div id="stopka">
Vertical Bank Polska - wszystkie prawa zastrzeżone <br />
Strona autorstwa: Wojciech Jasiński grupa k30
</div>

</div>


</body>
</html>