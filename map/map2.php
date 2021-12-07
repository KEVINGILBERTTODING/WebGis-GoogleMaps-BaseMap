<?php
include('../header2.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map | Leaflet Dev</title>

    <link rel="stylesheet" href="libs/leaflet.css">
    <link rel="stylesheet" href="css/mymap.css">

    <script src="libs/leaflet.js"></script>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<div id="mapdiv"></div>
<script>
    var mymap = L.map("mapdiv").setView([-7.0149, 110.3942], 12);

    var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

        {
            attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
            subdomains: ['a', 'b', 'c']
        }
    );

    osm.addTo(mymap);
</script>


<body>

</body>

</html>