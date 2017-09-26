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
      <?php
            echo "var markers=$markers";
        ?>

    function initMap() {
      var myLatLng = {lat: parseFloat(lat), lng: parseFloat(lon)};
      var myOptions = {
          zoom: 10,
          center: myLatLng,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          mapTypeControl: false
      };

      var map = new google.maps.Map(document.getElementById('map'),myOptions);
      var infowindow = new google.maps.InfoWindow(), marker, lat, lng;
      var json=JSON.parse( markers );

      for( var o in json ){

          lat = json[ o ].Latitude;
          lng=json[ o ].Longitude;
          name=json[ o ].ID;

          marker = new google.maps.Marker({
              position: new google.maps.LatLng(lat,lng),
              name:name,
              map: map
          });
          google.maps.event.addListener( marker, 'click', function(e){
              infowindow.setContent( this.name );
              infowindow.open( map, this );
          }.bind( marker ) );
      }
  }
        // function addMarker(latLng, map) {
        //            var marker = new google.maps.Marker({
        //                position: latLng,
        //                map: map,
        //                icon: image
        //            });
        //            return marker;
        //       }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap">
    </script>

  </body>
</html>

