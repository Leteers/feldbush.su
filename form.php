<html>

<head>
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
<?php
$global_ip = $_POST;
$ip = "localhost";
$user = "u1175838_root";
$password = "nik010802_";
$table = "u1175838_default";
$mysql = mysqli_connect($ip, $user, $password, $table);
mysqli_set_charset($mysql, "utf8");
if ($mysql->connect_error) {
    die("Ошибка в соединении: " . $mysql->connect_error);
};
$id=$_POST['s-1'];
$sql = mysqli_query($mysql, "SELECT * FROM `Data` WHERE District=(SELECT District FROM Data WHERE global_id=$id)"); 
while ($result = mysqli_fetch_array($sql)) {
    echo $result['District'];
    echo "<br>";
}
?>


</html>