<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Карта</title>

</head>
<body>
    
</body>
</html>
<?php
	$ip = "localhost";
	$user = "u1175838_root";
	$password = "nik010802_";
	$table= "u1175838_default";

    $x1=10;
    $x2=40;
    $y1=10;
    $y2=40;
    $k=0;

	$mysql = mysqli_connect($ip, $user, $password, $table);
	if($mysql->connect_error){
		die("Ошибка в соединении: " .$mysql->connect_error);
	}

    mysqli_set_charset($mysql, "utf8");
    $sql = mysqli_query($mysql, 'SELECT DISTINCT `global_id`, `District` FROM `Data`');
    echo"<select size='1'>";
    while ($result = mysqli_fetch_array($sql)) {
        echo"<option value={$result['global_id']}>{$result['District']}<option>";
    }
?>
