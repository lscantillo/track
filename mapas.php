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
      <meta http-equiv="refresh" content="5">
  </body>

            <?php


                $servername = "designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com:3306";
                $username = "abcr";
                $password = "abcr1234";
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
                      zoom: 16,
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

                      <?php include 'database.php';?>

                      <form action="historico.php">
                      <input type="submit" value="Historico" class="dropbtn">
                      </form>

                      </html>
