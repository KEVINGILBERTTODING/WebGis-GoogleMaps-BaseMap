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
    var mymap = L.map("mapdiv").setView([-7.7768, 112.1313], 11);


    var osm = L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",

        {
            attribution: false,

        }
    );

    osm.addTo(mymap);


    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(mymap);
    //Menampilkan Map keacamatan kediri

    var kediri = L.tileLayer.wms("/geoserver/wms", {
        layers: "kediri:kecamatan dan jalan",
        format: "image/png",
        transparent: true
    });
    kediri.addTo(mymap);

    //Menampilkan peternakan kediri
    var kediri_buildings = L.tileLayer.wms("/geoserver/wms", {
        layers: "kediri:peternakanxxxxxx",
        format: "image/png",
        transparent: true
    });
    kediri_buildings.addTo(mymap);

    var basemap = {
        "OpenstreetMaap": osm,
        "GoogleMaps": googleStreets

    };

    var overlaymap = {
        "Kecamatan dan jalan": kediri,
        "Peternakan": kediri_buildings,

    };

    L.control.layers(basemap, overlaymap).addTo(mymap);
</script>

<body>
</body>