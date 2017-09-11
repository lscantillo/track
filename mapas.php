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
  </body>
	<script>
    function ajaxCall() {
        $.ajax({
            url: "database.php",
            success: (function (result) {
                $("#load").html(result);
            })
        })
    };
    ajaxCall(); // To output when the page loads
    setInterval(ajaxCall, (5 * 1000)); // x * 1000 to get it in seconds
  </script>
	
   <h1 class="red-text ubuntu title">Las coordenadas del vehículo son: </h1>
    <div class="red-text ubuntu title2" id="load">
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
 </div>
  <br /> 
  <style>
    #map {
      height: 500px;
      width: 100%;
    }
  </style>

  <div id="map"></div>
  <script> 
  var id = "<?php echo $Id; ?>";
  var lat = "<?php echo $Lat; ?>";
  var lon = "<?php echo $Long; ?>";
  var date= "<?php echo $Date; ?>";
  var time = "<?php echo $Time; ?>";
	  
     var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lon)};
     var image = 'https://cdn0.iconfinder.com/data/icons/isometric-city-basic-transport/48/truck-front-01-48.png';
       function initMap() {
       var map = new google.maps.Map(document.getElementById('map'), {
         center: myLatLng,
         zoom: 16
       });
       var infoWindow = new google.maps.InfoWindow;


         // Change this depending on the name of your PHP or XML file
         downloadUrl('markers.php', function(data) {

           var xml = data.responseXML;
           var markers = xml.documentElement.getElementsByTagName('marker');
           var path = [];
           Array.prototype.forEach.call(markers, function(markerElem) {
             var id = markerElem.getAttribute('ID');
             for (var i = 0; i < markers.length; i++) {
               var Latitude = markerElem.getAttribute('Latitude');
               var Longitude = markerElem.getAttribute('Longitude');
            var point = new google.maps.LatLng(Latitude,Longitude);
              path.push(point);
    }
    var polyline = new google.maps.Polyline({
     path: path,
     strokeColor: "#FF0000",
     strokeOpacity: 1.0,
     strokeWeight: 2
   });
   polyline.setMap(map);

             var date = markerElem.getAttribute('Date');
             var time = markerElem.getAttribute('Time');
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
  
  

</html>
