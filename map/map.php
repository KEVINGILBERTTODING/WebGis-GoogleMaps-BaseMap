<?php
include('../header2.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map | Leaflet</title>

    <link rel="stylesheet" href="libs/leaflet.css">
    <link rel="stylesheet" href="css/mymap.css">
    <script src="libs/leaflet.js"></script>
    <script src='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js'></script>
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=Promise"></script>
    <script src="libs/leaflet-bing-layer-gh-pages/leaflet-bing-layer.js"></script>
    <link href='http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css' rel='stylesheet' />

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>

<div id="mapdiv"></div>
<script>
    //Menampilkan OSM sebagai base map
    var mymap = L.map("mapdiv").setView([-7.0149, 110.3942], 12);

    var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

        {
            attribution: '<a href="https://www.openstreetmap.org/copyright"> Kevin Gilbert Toding |© OpenStreetMap contributors, CC-BY-SA</a>',
            subdomains: ['a', 'b', 'c']
        }
    );

    osm.addTo(mymap);

    //Menampilkan Map

    var semarang = L.tileLayer.wms("/geoserver/wms", {
        layers: "semarang1:adm_kec_kota_semarang_250k",
        format: "image/png",
        transparent: true
    });
    semarang.addTo(mymap);

    //Menampilkan Sarana ibadah
    var semarang_buildings = L.tileLayer.wms("/geoserver/wms", {
        layers: "semarang1:Sarana Ibadah",
        format: "image/png",
        transparent: true
    });
    semarang_buildings.addTo(mymap);

    var basemap = {
        "OpenstreetMaap": osm
    };

    var overlaymap = {
        "Kecamatan": semarang,
        "Sarana Ibadah": semarang_buildings
    };

    L.control.layers(basemap, overlaymap).addTo(mymap);
</script>

<body>
</body>

<?php include('../footer2.php'); ?>