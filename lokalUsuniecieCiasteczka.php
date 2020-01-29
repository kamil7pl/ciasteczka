<?php
	if(isset($_COOKIE['Kamil'])){
	echo "Usunięcie ciasteczka o wartości: ".$_COOKIE['Kamil'];
	$_COOKIE['Kamil']=NULL;
	setcookie("Kamil", NULL,-1,"/");
	}
	else echo "Nie ma ciasteczka do usunięcia.";
	
?>
