<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <title> Web Tracking </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/syrus.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  </head>
  <body>
      <meta http-equiv="refresh" content="15">
  </body>
    <?php

      include 'database.php';

      $query = "SELECT * FROM locations WHERE 1 ";

      $row=connection2rds($query);

      $Id = $row[0];
      $Lat = $row[1];
      $Long = $row[2];
      $Date=$row[3];
      $Time=$row[4];

    ?>

  <style>
    #map {
      height: 500px;
      width: 100%;
    }
  </style>

  <div id="map"></div>
  <script>

  var lat = "<?php echo $Lat; ?>";
  var lon = "<?php echo $Long; ?>";
  var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lon)};

  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {zoom: 16, center: myLatLng,});
    var marker = new google.maps.Marker({ position: myLatLng,map: map, title:'Su auto'});
  }

  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap">
  </script>

  <h1 class="red-text ubuntu title">Las coordenadas del vehículo son: </h1>
  <?php
        if ($Lat == 0 and $Long == 0) {
            
        echo "<p> GPS NO CONECTADO </p>";
        
      } else {
       
        echo "<li>";
        print "ID: $Id";
        echo "<br>";
        echo "<li>";
        print "Latitud: $Lat";
        echo "<br>";
        echo "<li>";
        print "Longitud: $Long";
        echo "<br>";
        echo "<li>";
        print "Date: $Date";
        echo "<li>";
        print "Time: $Time";
        echo "<br>";
      
      }
      ?>
  <form action="historicotest.php">
  <input type="submit" value="Historico" class="dropbtn">
  </form>

</html>
