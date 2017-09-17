<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
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
            url: "database2.php",
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
    <?php include 'database2.php';?>
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

     var lat = "<?php echo $Lat; ?>";
     var lon = "<?php echo $Long; ?>";
     var image = 'https://cdn0.iconfinder.com/data/icons/isometric-city-basic-transport/48/truck-front-01-48.png';
       function initMap() {
         var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lon)};
          var myOptions = {
              zoom: 16,
              center: myLatLng,
              panControl: true,
              zoomControl: true,
              scaleControl: true,
              mapTypeId: google.maps.MapTypeId.ROADMAP
          }
         // Create map object with options
         map = new google.maps.Map(document.getElementById("map"), myOptions);

         var ID_ST = 0;
          var infoWindow = new google.maps.InfoWindow;
         setInterval(function mapload(){
               $.ajax({
                     url: "dbcoordenadas.php",
                      // data: form_data,
                     success: function(data)
                     {
                       var json_obj = jQuery.parseJSON(JSON.stringify(data));
                       // Data Treatment in order to obtain the new latlng coordinates.
                       $(jQuery.parseJSON(JSON.stringify(data))).each(function() {
                         var ID = this.ID;
                         var LATITUD = this.Latitude;
                         var LONGITUD = this.Longitude;
                         if (ID_ST != this.ID) {
                           point = new google.maps.LatLng(parseFloat(LATITUD),parseFloat(LONGITUD));
                           myPath.push(point);
                           var myPathTotal = new google.maps.Polyline({
                              path: myPath,
                              strokeColor: '#FF0000',
                              strokeOpacity: 1.0,
                              strokeWeight: 5
                           });
                           myPathTotal.setPath(myPath)
                           myPathTotal.setMap(map);
                           addMarker(new google.maps.LatLng(LATITUD, LONGITUD), map);
                           var center = new google.maps.LatLng(LATITUD, LONGITUD);
                           map.panTo(center);
                           ID_ST = this.ID;
                         }
                      });
                     },
                     dataType: "json"//Tipo de datos JSON
                   })
         }, 5 * 1000);

       }
       function addMarker(latLng, map) {
                  var marker = new google.maps.Marker({
                      position: latLng,
                      map: map,
                      icon: image
                  });
                  return marker;
             }

   </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap">
  </script>
