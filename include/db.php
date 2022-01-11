<?php
	define('ip', 'localhost');
	define('user', 'u1175838_default');
	define('password', '3_s0ZbFY');
	define('dataBase', 'u1175838_default');
	
	$mysql = new mysqli(ip, user, password, dataBase);
	if($mysql->connection_errno) exit('Ошибка подключения');
	$mysql-> set_charset('utf8');
	$mysql->close();
	?>