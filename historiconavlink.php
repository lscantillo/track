<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="./css/style.css">

   <?php
    $servername = "designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com";
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
    
    $query = "SELECT * FROM locations WHERE 1 ";

    $result = mysqli_query($conn, $query);
    $finfo = mysqli_fetch_field($result);
    mysqli_data_seek($result, 1);
    $row = mysqli_fetch_row($result);

    while ($row = mysqli_fetch_array($result)) {

        $Id = $row['ID'];
        $Lat = $row['Latitude'];
        $Long = $row['Longitude'];

      }
?>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 90%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 90%;
        margin: 20;
        padding: 20;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>

    <script>
      var id = "<?php echo $Id; ?>";
      var lat = "<?php echo $Lat; ?>";
      var lon = "<?php echo $Long; ?>";
            
      var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lon)};
      var image = 'https://cdn0.iconfinder.com/data/icons/isometric-city-basic-transport/48/truck-front-01-48.png';
        function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 16
        });

        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('coordenadas.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('ID');
              var Latitude = markerElem.getAttribute('Latitude');
              var Longitude = markerElem.getAttribute('Longitude');
              var date = markerElem.getAttribute('Date');
              var time = markerElem.getAttribute('Time');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('Latitude')),
                  parseFloat(markerElem.getAttribute('Longitude')));
              var point2=[{lat: parseFloat(markerElem.getAttribute('Latitude')),
                  lng: parseFloat(markerElem.getAttribute('Longitude'))}];

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = "ID: "+id;
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
             text.textContent ="Latitude: "+ Latitude;
             infowincontent.appendChild(text);
             infowincontent.appendChild(document.createElement('br'));

             var text = document.createElement('text');
            text.textContent ="Longitude: "+ Longitude;
            infowincontent.appendChild(text);
            infowincontent.appendChild(document.createElement('br'));
              
              var text = document.createElement('text');
             text.textContent ="Date: "+ date;
             infowincontent.appendChild(text);
             infowincontent.appendChild(document.createElement('br'));

             var text = document.createElement('text');
            text.textContent ="Time: "+ time;
            infowincontent.appendChild(text);
            infowincontent.appendChild(document.createElement('br'));

              var flightPath = new google.maps.Polyline({
                path: point2,
                geodesic: true,
                strokeColor: '#000000',
                strokeOpacity: 1.0,
                strokeWeight: 2
              });

              flightPath.setMap(map);


              var marker = new google.maps.Marker({
                map: map,
                icon: image,
                position: point

              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap">
    </script>
  </body>

                      <div class="dropdown">
                      <button class="dropbtn">Rutas</button>
                      <div class="dropdown-content">
                        <a href="#">10 Marcadores</a>
                        <a href="#">25 Marcadores</a>
                        <a href="#">50 Marcadores</a>
                      </div>
                      </div>
                     

                      </html>
