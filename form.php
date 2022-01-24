<html>

<head>
    <script src="scripts/jquery.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=9963ebce-3a06-4aa4-870a-3396a36964cb&lang=ru_RU" type="text/javascript"></script>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@0;1&family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
    <title>Елочные базары Москвы</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style31.css">
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
    $id = $_POST['s-1'];
    $Address = array();
    $lat = array();
    $lon = array();
    $k = 0;
    $x = 0;
    $z = 0;
    $sql = mysqli_query($mysql, "SELECT * FROM `Data` WHERE District=(SELECT District FROM Data WHERE global_id=$id)");
    while ($result = mysqli_fetch_array($sql)) {
        $x = $x + 1;
        $Address[] = $result['Address'];
        $lat[] = $result['Latitude_WGS84'];
        $lon[] = $result['Longitude_WGS84'];
    }
    ?>
    <div class="text_map">
        <?php
        if ($x == 1) {
            echo "<h1>В вашем районе $x ёлочный базар. Его адрес:</h1>";
        } else if ($x >= 2 and $x < 5) {
            echo "<h1>В вашем районе $x ёлочных базара. Их адреса:</h1>";
        } else {
            echo "<h1>В вашем районе $x ёлочных базаров. Их адреса:</h1>";
        }
        while ($z < $x) {
            $k = $z + 1;
            echo "<p>$k) $Address[$z] </p>";
            $z = $z + 1;
        } ?>
    </div>

    <div id="map" class="map container" style="width: 650px; height: 600px">
        <script>
            ymaps.ready(init);
            var z = 0;
            var x = "<?php echo $x ?>"
            var lat = <?php echo json_encode($lat); ?>;
            var lon = <?php echo json_encode($lon); ?>;
            var Address = <?php echo json_encode($Address); ?>;

            function init() {
                var myMap = new ymaps.Map('map', {
                        center: [55.76, 37.64],
                        zoom: 10
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),
                    objectManager = new ymaps.ObjectManager({
                        // Чтобы метки начали кластеризоваться, выставляем опцию.
                        clusterize: true,
                        // ObjectManager принимает те же опции, что и кластеризатор.
                        gridSize: 32,
                        clusterDisableClickZoom: true
                    });
                // Чтобы задать опции одиночным объектам и кластерам,
                // обратимся к дочерним коллекциям ObjectManager.
                objectManager.objects.options.set('preset', 'islands#greenDotIcon');
                objectManager.clusters.options.set('preset', 'islands#greenClusterIcons');
                var y = 0;
                while (y < x) {
                    myMap.geoObjects
                        .add(objectManager)
                        .add(new ymaps.Placemark([lat[y], lon[y]], {
                            balloonContent: Address[y],
                            iconContent: y+1
                        }));
            y++;
            }
            }
        </script>
    </div>
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