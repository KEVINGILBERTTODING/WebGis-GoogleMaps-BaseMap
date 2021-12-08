<?php
include('../header2.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map | Native</title>
</head>

<body>
    <div class="container">
        <div class="container-fluid mt-4">
            <h2>Peta Semarang</h2>
        </div>
        <div class="container">
            <div class="map mt-4">
                <object data="http://localhost/geoserver/semarang1/wms?service=WMS&version=1.1.0&request=GetMap&layers=semarang1%3Asemarang%20ibadah&bbox=110.26911926269531%2C-7.114580154418945%2C110.50536346435547%2C-6.931527614593506&width=768&height=595&srs=EPSG%3A4326&styles=&format=application/openlayers" width="1920px" height="800px"></object>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>