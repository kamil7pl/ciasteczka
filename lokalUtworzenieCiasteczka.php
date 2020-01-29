<?php
	//Jak jest "/" to ciasteczko jest na http://localhost/dashboard/
	$_COOKIE['Kamil']="ciastko";
	setcookie("Kamil", "ciastko",time()+300, "/");	
	echo "Utworzenie ciasteczka o wartości ".$_COOKIE['Kamil'];
?>
