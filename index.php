<?php
	$ip = "https://server100.hosting.reg.ru/phpmyadmin/index.php";
	$user = "u1175838_root";
	$password = "nik010802_";
	$table= "u1175838_default";

	
	$mysql = new mysqli(ip, user, password, table);
	
	if($mysql->connect_error){
		die("Connection failed " .$mysql->connect_error);
	}
	echo "Connection succsessfull";
?>