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


  <label for="timefilter"> Filtrar por tiempo : </label>
  <br /> 
  <select id="year" name="Año inicio" >
    <option value="0">Año inicio</option>
    <option value="21">2021</option>
    <option value="20">2020</option>
    <option value="19">2019</option>
    <option value="18">2018</option>
    <option value="17">2017</option>
    <option value="16">2016</option>
    <option value="15">2015</option>
    <option value="14">2014</option>
  </select>
  <select id="yeartil" name="Año fin" >
    <option value="0">Año fin</option>
    <option value="21">2021</option>
    <option value="20">2020</option>
    <option value="19">2019</option>
    <option value="18">2018</option>
    <option value="17">2017</option>
    <option value="16">2016</option>
    <option value="15">2015</option>
    <option value="14">2014</option>
  </select>
  <br /> 
  <select id="month" name="Mes inicio" >
    <option value="-1">Mes inicio</option>
    <option value="1">Enero</option>
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>
  <select id="monthtil" name="Mes fin" >
    <option value="-1">Mes fin</option>
    <option value="1">Enero</option>
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>
  <br /> 
  <select id="day" name="Día inicio" >
      <option value="-1">Día inicio</option>
      <option value="0">00</option>
      <option value="1">01</option>
      <option value="2">02</option>
      <option value="3">03</option>
      <option value="4">04</option>
      <option value="5">05</option>
      <option value="6">06</option>
      <option value="7">07</option>
      <option value="8">08</option>
      <option value="9">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
  </select>
  </select>
    <select id="daytil" name="Día fin" >
    <option value="-1">Día fin</option>
    <option value="0">00</option>
    <option value="1">01</option>
    <option value="2">02</option>
    <option value="3">03</option>
    <option value="4">04</option>
    <option value="5">05</option>
    <option value="6">06</option>
    <option value="7">07</option>
    <option value="8">08</option>
    <option value="9">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
  </select>
  <br /> 
  <select id="hour" name="Hora inicio" >
    <option value="-1">Hora inicio</option>
    <option value="0">00:00</option>
    <option value="1">01:00</option>
    <option value="2">02:00</option>
    <option value="3">03:00</option>
    <option value="4">04:00</option>
    <option value="5">05:00</option>
    <option value="6">06:00</option>
    <option value="7">07:00</option>
    <option value="8">08:00</option>
    <option value="9">09:00</option>
    <option value="10">10:00</option>
    <option value="11">11:00</option>
    <option value="12">12:00</option>
    <option value="13">13:00</option>
    <option value="14">14:00</option>
    <option value="15">15:00</option>
    <option value="16">16:00</option>
    <option value="17">17:00</option>
    <option value="18">18:00</option>
    <option value="19">19:00</option>
    <option value="20">20:00</option>
    <option value="21">21:00</option>
    <option value="22">22:00</option>
    <option value="23">23:00</option>
  </select>
  <select id="hourtil" name="Hora fin" >
    <option value="-1">Hora fin</option>
    <option value="0">00:00</option>
    <option value="1">01:00</option>
    <option value="2">02:00</option>
    <option value="3">03:00</option>
    <option value="4">04:00</option>
    <option value="5">05:00</option>
    <option value="6">06:00</option>
    <option value="7">07:00</option>
    <option value="8">08:00</option>
    <option value="9">09:00</option>
    <option value="10">10:00</option>
    <option value="11">11:00</option>
    <option value="12">12:00</option>
    <option value="13">13:00</option>
    <option value="14">14:00</option>
    <option value="15">15:00</option>
    <option value="16">16:00</option>
    <option value="17">17:00</option>
    <option value="18">18:00</option>
    <option value="19">19:00</option>
    <option value="20">20:00</option>
    <option value="21">21:00</option>
    <option value="22">22:00</option>
    <option value="23">23:00</option>
  </select>
  <br /> 
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

  <form action="historicotest.php">
  <input type="submit" value="Historico" class="dropbtn">
  </form>

</html>
