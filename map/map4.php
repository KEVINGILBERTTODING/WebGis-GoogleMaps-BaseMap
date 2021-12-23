<!DOCTYPE html>
<html>

<head>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBi9LJ7EvsFbUgATfHqethhpCxuZZgwif0&callback=myMap"></script>
    <style>

    </style>
    <script>
        function initialize() {
            var map = new google.maps.Map(
                document.getElementById('map'), {
                    center: new google.maps.LatLng(-6.968711, 110.430228),
                    zoom: 13,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });

            //Menampilkan Sarana ibadah
            var semarang_buildings = L.tileLayer.wms("/geoserver/wms", {
                layers: "semarang1:Sarana Ibadah",
                format: "image/png",
                transparent: true
            });
            semarang_buildings.addTo(map);

        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<body>
    <h1>Menggunakan Marker</h1>
    <div id="map" style="width: 500px; height: 500px">

    </div>
</body>

</html>