<!DOCTYPE html>
<html>

<head>
	<script src="scripts/jquery.js"></script>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@0;1&family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
	<title>Елочные базары Москвы</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/style21.css">
	<link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
	<header class="header">
		<div class="header_top">
			<div class="container" style="height: 40px;">
				<a href="http://feldbush.su">
					<img class='header_logo' src="images/logo.png">
				</a>
				<a class="header_address" href="http://feldbush.su">feldbush.su</a>
			</div>
		</div>
		<div class="header_content">
			<div class="container">
				<nav class="menu">
					<ul>
						<li><a href="index.php">Главная</a></li>
						<li><a href="map.php">Карта</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<div class="container">
		<h1 class="district_choise">Выберите ваш район:</h1>
	</div>
	<?php
	$ip = "localhost";
	$user = "u1175838_root";
	$password = "nik010802_";
	$table = "u1175838_default";
	$mysql = mysqli_connect($ip, $user, $password, $table);

	if ($mysql->connect_error) {
		die("Ошибка в соединении: " . $mysql->connect_error);
	}
	mysqli_set_charset($mysql, "utf8");
	$sql = mysqli_query($mysql, 'SELECT count(*) as CNT, global_id, District FROM `Data` GROUP BY District HAVING count(*)>=1');
	echo "<div class ='container'><form method='post' action='form.php' name='d-1' > <select size='1' name='s-1' class='s-1'> <optgroup>";
	while ($result = mysqli_fetch_array($sql)) {
		echo "<option name = 'box' value = {$result['global_id']}>{$result['District']}</option>";
	}
	echo "</optgroup></select><button type=submit name='b-1' class='b-1 input_button'>Выбрать</button></form></div>";

	?>
	<div class="footer_bot">
		<div class="container">
			<footer class="bot_container">
			    Есть вопросы или предложения? Обращайтесь: 
				<a class="header_mail" href="mailto:help@feldbush.su"> help@feldbush.su</a>
			</footer>
		</div>
	</div>
</body>

</html>