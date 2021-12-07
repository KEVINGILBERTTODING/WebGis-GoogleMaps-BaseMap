<?php
include('../header2.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map | Leafleat</title>

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

  var semarang = L.tileLayer.wms("/geoserver/wms", {
    layers: "semarang1:adm_kec_kota_semarang_250k",
    format: "image/png",
    transparent: true
  });
  semarang.addTo(mymap);

  var semarang_road = L.tileLayer.wms("/geoserver/wms", {
    layers: "semarang:ibadah1",
    format: "image/png",
    transparent: true
  });
  semarang_road.addTo(mymap);
</script>


<body>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</html>