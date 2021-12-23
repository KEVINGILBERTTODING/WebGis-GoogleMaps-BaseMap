<?php
include('../header2.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map | Bing</title>

    <link rel="stylesheet" href="libs/leaflet.css">
    <link rel="stylesheet" href="css/mymap.css">
    <link rel="stylesheet" href="css/bing.css">
    <script src="libs/leaflet.js"></script>
    <script src='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js'></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBi9LJ7EvsFbUgATfHqethhpCxuZZgwif0&callback=myMap"></script>
    <link href='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css' rel='stylesheet' />

    <style>

    </style>
</head>

<body>
    <div id='map'></div>

    <script>
        var map = L.map('map').setView([-7.0149, 110.3942], 12)


        // Base map OSM
        var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

            {
                attribution: '<a href="https://www.openstreetmap.org/copyright"> Kevin Gilbert Toding |© OpenStreetMap contributors, CC-BY-SA</a>',
                subdomains: ['a', 'b', 'c']
            }
        );

        //basemap google map
        osm.addTo(map);
        // Base map Bing
        var googlemap = new google.maps.Map(
            document.getElementById('map'), {
                center: new google.maps.LatLng(-6.968711, 110.430228),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        googlemap.addTo(map);

        //Menampilkan Sarana ibadah
        var semarang_buildings = L.tileLayer.wms("/geoserver/wms", {
            layers: "semarang1:Sarana Ibadah",
            format: "image/png",
            transparent: true
        });
        semarang_buildings.addTo(map);

        var basemap = {
            "GoogleMap": googlemap
        };

        var overlaymap = {
            "Kecamatan": semarang,
            "Sarana Ibadah": semarang_buildings
        };

        L.control.layers(basemap, overlaymap).addTo(map);
    </script>
    <?php include('../footer2.php'); ?>