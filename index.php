<!DOCTYPE html>
<html>

<head>
    
	<script>
		var name = 0;
	</script>
	<script src="scripts/jquery.js"></script>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@0;1&family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
	<title>Елочные базары Москвы</title>
	<link rel="stylesheet" href="styles/normalize.css">
	<link rel="stylesheet" href="styles/style6.css">
	<link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>

	<?php echo "<div class='out-block out-1'></div>" ?>
	<!-- <header class="header">
		<div class="header_top">
			<div class="container">
				<a class="header_mail" href="mailto:help@feldbush.su">help@feldbush.su</a>
				<a class="header_address" href="https//feldbush.su">feldbush.su</a>
			</div>
		</div>
		<div class="header_content">
			<div class="container">
				<div class="header_logo">
					<a href="#">
						<img src="images/logo.png">
					</a>
				</div>
				<nav class="menu">
					<ul>
						<li><a href="#">Главная</a></li>
						<li><a href="#">О сайте</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header> -->
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
        echo "<form method='post' action='form.php' name='d-1'> <select size='1' name='s-1' class='s-1'>";
		while ($result = mysqli_fetch_array($sql)) {
			echo "<option name = 'box' value = {$result['global_id']}>{$result['District']}<option>";
		}
		echo "<input type=submit name='b-1' class='b-1 CenterSmallBox'></button>";
		echo "</select></form>";
	
	?>


	<script src=scripts/script12.js>

	</script>
	<?php

	// if (isset($_POST['u_name'])) {
	// 	echo $_POST['u_name'] . '</p>';
	// } else {
	// 	echo "<script type='text/javascript'>";
	// 	echo "document.write('<form method=\'post\'>');";
	// 	echo "document.write('<p>Ваше имя:<br />');";
	// 	echo "document.write('<input type=\'text\' name=\'u_name\' value = \'' + data + '\'</p>');";
	// 	echo "document.write('<input type=\'submit\' />');";
	// 	echo "document.write('</form>');";
	// 	echo "</script>";

	// 	exit();
	// }
	?>

</body>

</html>