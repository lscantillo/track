<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
  <!-- <meta http-equiv="refresh" content="10"> -->
    <title> Web Tracking </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/syrus.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  </head>
  <body>
    <div class="row main-container middle-xs center-xs">
      <div class="col-md.8 col-sm-10 col-xs-11 col-lg-7">
        <div class="box">
          <div class="card">


            <header class="main-header">
              <nav class="main-nav">
                <a href="index.php" class="nav-link ubuntu">Inicio</a>
                <a href="menu.php" class="nav-link ubuntu"> Tracking</a>
                <a href="historico.php" class="nav-link ubuntu">Historico</a>
              </nav>
            </header>
            <article class="body">
              <header class="text-center">
                <img src="./images/logo.png" height="100" alt="Logo Devesoft">
                <h1 class="red-text ubuntu title tresD">Tracking</h1>
              </header>
            </article>
            <footer>
          <iframe src="mapas.php" width="100%" height="800px" frameborder="0">
          </iframe>


        </footer>
<!--
            <?php
                #$servername = "181.192.147.42:3306";
                $servername = "localhost";
                #$servername = "syrusloc";
		            $username = "root";
                #$username = "furdesign";
                $password = "";
                // Create connection
                $conn = new mysqli($servername, $username, $password);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                #echo "Connected successfully";
                mysqli_select_db($conn, "designlocations");
                #$query = 'select * from gatos WHERE Nombre LIKE '%" . $name .  "%' OR Patrón LIKE '%" . $name ."%'";';
                $query = "SELECT * FROM locations WHERE 1 ";

                $result = mysqli_query($conn, $query);
                $finfo = mysqli_fetch_field($result);
                mysqli_data_seek($result, 1);
                $row = mysqli_fetch_row($result);

                while ($row = mysqli_fetch_array($result)) {

                    $Id = $row['ID'];
                    $Lat = $row['Latitude'];
                    $Long = $row['Longitude'];
                    $Date=$row['Date'];
                    $Time=$row['Time'];


                    // print "ID: $Id";
                    // echo "<ul>\n";
                    //
                    // print "Latitud: $Lat";
                    // echo "<ul>\n";
                    //
                    // print "Longitud: $Long";
                    // echo "<ul>\n";
                    //
                    // print "Date: $Date";
                    // echo "<ul>\n";
                    //
                    // print "Time: $Time";
                    // echo "<ul>\n";




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
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 18,
                      center: myLatLng,
                    });
                    var marker = new google.maps.Marker({
                      position: myLatLng,
                      map: map,
                      title:'Su auto'
                    });
                  }

                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap">
                </script>

                  <h1 class="red-text ubuntu title">Las coordenadas del vehículo son: </h1>

                      <?php include 'database.php';?> -->
          </div>


  </div>
</div>
</div>

  </body>
</html>
