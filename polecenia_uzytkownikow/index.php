<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>moje logowanie</title>
</head>
<body>

    <?php
	session_start();
	
	if(isset($_GET['od_uzytkownika'])){
		$od_uzytkownika=filter_var($_GET['od_uzytkownika'], FILTER_SANITIZE_STRING);
		$_COOKIE['polecajacy']=$od_uzytkownika;
		setcookie("polecajacy", $od_uzytkownika, time()+300, "/");
	}
	if(isset($_GET['wyloguj']) && isset($_SESSION['zalogowany'])){
		//unset($_SESSION['zalogowany']);
		session_unset();
	}
	if(isset($_POST['login']) && isset($_POST['haslo'])){
		$login=filter_var($_POST['login'],FILTER_SANITIZE_STRING);
		$haslo=filter_var($_POST['haslo'],FILTER_SANITIZE_STRING);
		if($login=="Kamil" && $haslo=="admin"){
			$_SESSION['zalogowany']=1;
			$_SESSION['login']=$login;
		}
		else echo "<p style='color:red'>Nie podano prawidłowego loginu lub hasła.</p>";
		
	}
	if(isset($_SESSION['zalogowany'])){
		echo "Witaj ".$_SESSION['login']." .<br/>";
		echo "<a href='index.php?wyloguj=1'><br />Wyloguj się<br /><br /></a>";
		if(isset($_COOKIE['polecajacy'])){
			echo "Jesteś tutaj z polecenia użytkownika ".$_COOKIE['polecajacy'].".<br />";
			echo "Jakieś czynności związane z nagrodzeniem ".$_COOKIE['polecajacy'].".<br />";
			echo "Usunięcie ciasteczka.";
			$_COOKIE['polecajacy']=NULL;//może bez tego
			setcookie("polecajacy",NULL,-1, "/");
		}
	}
	
	else{
	?>
	<form action="index.php" method="post">
		<input type="text" value="" name="login" />
		<input type="password" value="" name="haslo" />
		<input type="submit" value="Zaloguj się" />
	</form>
	<?php
	}
	?>
</body>
</html>