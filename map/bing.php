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
    <script src="libs/leaflet-bing-layer-gh-pages/leaflet-bing-layer.js"></script>
    <link href='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css' rel='stylesheet' />

    <style>

    </style>
</head>

<body>
    <div id='map'></div>

    <script>
        var BING_KEY = 'AseFZQLqGuJGgYKUqe2dPKSrmwvmQiUNJMrFyUj8LGDl0n0Z7JT5Cb_l5DO1Bvt8'

        var map = L.map('map').setView([-7.0149, 110.3942], 12)


        // Base map OSM
        var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

            {
                attribution: '<a href="https://www.openstreetmap.org/copyright"> Kevin Gilbert Toding |© OpenStreetMap contributors, CC-BY-SA</a>',
                subdomains: ['a', 'b', 'c']
            }
        );

        osm.addTo(map);
        // Base map Bing
        var bingAerial = L.tileLayer.bing({
            bingMapsKey: BING_KEY,
            attribution: '&copy; <a href="http://bing.com">Kevin Gilbert Toding</a>',
            imagerySet: 'AerialWithLabelsOnDemand'
        });
        bingAerial.addTo(map);


        var semarang = L.tileLayer.wms("/geoserver/wms", {
            layers: "semarang1:adm_kec_kota_semarang_250k",
            format: "image/png",
            transparent: true
        });
        semarang.addTo(map);

        //Menampilkan Sarana ibadah
        var semarang_buildings = L.tileLayer.wms("/geoserver/wms", {
            layers: "semarang1:Sarana Ibadah",
            format: "image/png",
            transparent: true
        });
        semarang_buildings.addTo(map);

        var basemap = {
            "OpenstreetMap": osm,
            "BingBaseMap": bingAerial
        };

        var overlaymap = {
            "Kecamatan": semarang,
            "Sarana Ibadah": semarang_buildings
        };

        L.control.layers(basemap, overlaymap).addTo(map);
    </script>
    <?php include('../footer2.php'); ?>