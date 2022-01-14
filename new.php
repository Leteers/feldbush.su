<?php
   // header ("Content-type: image/png");
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


	$sql = mysqli_query($mysql, 'SELECT `r`, `g`, `b` FROM `colors_1`');
	$im = imagecreatetruecolor(1920,1080);
    $white = imagecolorallocate($im, 255, 255, 255);
    imageFilledRectangle($im, 0, 0, 1920, 1080, $white);
    $array = array(
    );

    while ($result = mysqli_fetch_array($sql)) {
     
        array_push($array,"{$result['r']}", "{$result['g']}", "{$result['b']}");
       
        if($k<5){
        imageFilledRectangle($im,$x1,$y1,$x2,$y2,(imagecolorallocate($im,"{$result['r']}", "{$result['g']}", "{$result['b']}")));//
        $x1=$x1+40;
        $x2=$x2+40;
        $k++;
        }
        else{
            $k=0;
            $y1=$y1+40;
            $y2=$y2+40;
            $x1=10;
            $x2=40;
        }
    }
    imagepng($im);
    imagedestroy($im);
    var_dump($array);
?>