<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

    <title></title>
  </head>
  <?php include 'finalquery.php' ?>
<div >
 
</div>
  <body>

        <style>
      #map {
        height: 80%;
      }
      html, body {
        height: 80%;
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
    var myPath = [];
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
          map = new google.maps.Map(document.getElementById("map"), myOptions);
  //  setInterval(function mapload(){
       $(document).ready(function() {
          $.ajax({
                 url: "finalquery.php",
                 // data: form_data,
                success: function(hist)
                {
                    var json_hist = jQuery.parseJSON(JSON.stringify(hist));
                    INIT_LAT = parseFloat(json_hist[json_hist.length - 1].Latitude);
                    INIT_LON = parseFloat(json_hist[json_hist.length - 1].Longitude);
                    $(json_hist).each(function() {
                      var ID = this.ID;
                      var LATITUDE = this.Latitude;
                      var LONGITUDE = this.Longitude;
                      myCoord2 = new google.maps.LatLng(parseFloat(LATITUDE), parseFloat(LONGITUDE));
                      myPath.push(myCoord2);
                      var myPathTotal2 = new google.maps.Polyline({
                        path: myPath,
                        strokeColor: '#0000FF',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                      });
                      myPathTotal2.setPath(myPath)
                      myPathTotal2.setMap(map);
                      addMarker(new google.maps.LatLng(LATITUDE, LONGITUDE), map);
                    });
                },
                dataType: "json"//set to JSON
              })
    });
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

  </body>
</html>
