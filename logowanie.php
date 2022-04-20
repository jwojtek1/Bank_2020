<?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
	header('Location: index.php');
	exit();
}

//łączenie z bazą danych
require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
	
	{
		echo "Error: ".$polaczenie->connect_errno;
	}
	else 
	{
		$login = $_POST['login'];
        $haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		
		if($rezultat = @$polaczenie->query(
		sprintf("SELECT * FROM uzytkownicy WHERE mail='%s'",
		mysqli_real_escape_string($polaczenie,$login))))
		{
			$ilu_userow = $rezultat->num_rows;
			if($ilu_userow>0)
			{
				// wyciągamy z bazy danych potrzebne pola
				$wiersz=$rezultat->fetch_assoc();
				
				if(password_verify($haslo, $wiersz['haslo']))
				{
				
					$_SESSION['zalogowany'] = true;
				    $_SESSION['id'] = $wiersz['id'];
					$_SESSION['nrkonta'] = $wiersz['nrkonta'];
					$_SESSION['imie'] = $wiersz['imie'];
					$_SESSION['nazwisko'] = $wiersz['nazwisko'];
					$_SESSION['ulica'] = $wiersz['ulica'];
					$_SESSION['miasto'] = $wiersz['miasto'];
					$_SESSION['mail'] = $wiersz['mail'];
					$_SESSION['srodki'] = $wiersz['srodki'];
					$_SESSION['uprawnienia'] = $wiersz['uprawnienia'];
					// i przechodzimy do strony twojekonto, jeśli nie wystąpił żaden błąd
					unset($_SESSION['blad']);
					$rezultat->close();
					
					if($wiersz['uprawnienia'] == 1)
					{header('Location: admin/admin.php');}
				
				else {
					header('Location: twojekonto.php');
				     }
				}
				//w przypadku błędu przy podanym loginie lub haśle, odpowiedni komunikat nas o tym poinformuje
				else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
				
			}
				
			}
		    else
			{
				$_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
				header('Location: index.php');
				
			}
			
		}
		
		$polaczenie->close();
	
		
		
	}
	



?>

