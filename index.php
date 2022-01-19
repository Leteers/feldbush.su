<!DOCTYPE html>
<html>
        
<head>
    <?php echo"<link rel='stylesheet' href='style/style7.css'>"; ?>
	<meta charset="utf-8">
	<title>Елочные базары Москвы</title>
	<link rel="shortcut icon" href="images/favicon.ico">
  
</head>
<body>
    <div id=content>
    	<p class=list> <?php
	    $ip = "localhost";
	    $user = "u1175838_root";
	    $password = "nik010802_";
    	$table= "u1175838_default";

	    $mysql = mysqli_connect($ip, $user, $password, $table);
	    if($mysql->connect_error){
		    die("Ошибка в соединении: " .$mysql->connect_error);
	    }
        mysqli_set_charset($mysql, "utf8");
        $sql = mysqli_query($mysql, 'SELECT DISTINCT `District` FROM `Data` ORDER BY `District`');
        echo"<select size='1'>";
        while ($result = mysqli_fetch_array($sql)) {
            echo"<option value = {$result['District']}>{$result['District']}<option>";
    }
        ?>
 </p>
	</div>
</body>
</html>
