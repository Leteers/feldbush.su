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
    <link rel="stylesheet" href="styles/style6.css">
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
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
    $Address= array();
    $lat = array();
    $lon = array();
    $x = 0;
    $z = 0;
    $sql = mysqli_query($mysql, "SELECT * FROM `Data`");
    while ($result = mysqli_fetch_array($sql)) {
        $x = $x + 1;
        $Address[] = $result['Address'];
        $lat[] = $result['Latitude_WGS84'];
        $lon[] = $result['Longitude_WGS84'];
    }
    ?>

    <div id="map" style="width: 600px; height: 400px">
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
                            balloonContent: Address[y]
                        }));
                    y++;
                }
            }
        </script>
    </div>

</body>

</html>