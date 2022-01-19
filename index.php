<!DOCTYPE html>
<html>
<head>
    <script src="jquery.js"></script>
	<meta charset="utf-8">
	<title>Елочные базары Москвы</title>
	<link rel="shortcut icon" href="images/favicon.ico">
</head>
<body>
     <button class='b-1'>from input</button>
     <div class='out-block out-1'></div>
    <?php
	    $ip = "localhost";
	    $user = "u1175838_root";
	    $password = "nik010802_";
    	$table= "u1175838_default";
	    $mysql = mysqli_connect($ip, $user, $password, $table);
	    if($mysql->connect_error){
		    die("Ошибка в соединении: " .$mysql->connect_error);
	    }
        mysqli_set_charset($mysql, "utf8");
        $sql = mysqli_query($mysql, 'SELECT count(*) as CNT, global_id, District FROM `Data` GROUP BY District HAVING count(*)>=1');
        echo"<select size='1' class='s-1'>";
        while ($result = mysqli_fetch_array($sql)) {
            echo"<option value = {$result['global_id']}>{$result['District']}<option>";
    	}
    ?>
	    <script src =script1.js></script>
	   </body>
</html>
