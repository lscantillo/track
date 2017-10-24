<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap"
    async defer></script> -->
    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
      <link rel="stylesheet" href="css/skel-noscript.css" />
      <link rel="stylesheet" href="css/style.css" />
      <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>

    <title>ABCR Design: Filtrado histórico</title>
  </head>

  <body>
   <div id="header">
      <div class="container">

        <!-- Logo -->
          <div id="logo">
            <h1><a href="index.php">a b c r design</a></h1>
          </div>

        <!-- Nav -->
          <nav id="nav">
            <ul>
              <li><a href="index.php">Rastreo</a></li>
              <li class="active"><a href="historico.php">Histórico</a></li>
            </ul>
          </nav>

      </div>
    </div>
  <!-- Header -->

  <!-- Banner -->
  <div id="error"></div>
  <div id="map"></div>
  <div id="filtercontrols">

              <form action=historico.php>
              <input type="submit" class= "apply" name="submit" value="Retornar">
              </form>

    </div>

    <script>
      //$(document).ready(function() {
    var lat = "48.85809";
    var lon = "2.294694";
    var myPath = [];
    var myPath2 = [];
    infoWindows = Array();
    infoWindows2 = Array();
    markers = Array();
    markers2 = Array();
    var image = 'https://cdn0.iconfinder.com/data/icons/isometric-city-basic-transport/48/truck-front-01-48.png';
    var image2 = 'https://i.imgur.com/FGEuaWh.png';
    function initMap() {
             //var myLatLng = {lat: INIT_LAT, lng: INIT_LON};

             var myLatLng = {lat: 11.009993, lng:  -74.826355};
             var myOptions = {
                 zoom: 14,
                 center: myLatLng,
                 panControl: true,
                 zoomControl: true,
                 scaleControl: true
                //  mapTypeId: google.maps.MapTypeId.ROADMAP
             }
          map = new google.maps.Map(document.getElementById("map"), myOptions);
        }
        function addMarker(latLng,time,id, map) {
                   var marker = new google.maps.Marker({
                       position: latLng,
                       map: map,
                       icon: image,
                       infoWindowIndex: id
                   });
       var content = '<div id="mkst1">' +
      '<h6>' + 'INFO' + '</h6>' +
      '<p>' + time + '</p>' + '</div>';
          var infoWindow = new google.maps.InfoWindow({
          content: content
                  });
          infoWindow.setContent(content);
          google.maps.event.addListener(marker, 'mouseover',
          function(event) {
                  infoWindow.open(map, marker);
                  // infoWindows[this.infoWindowIndex].open(this.map2, this.marker);
                }
          );
                    google.maps.event.addListener(marker, 'mouseout',
          function(event) {
                  infoWindow.close(map, marker);
                  // infoWindows[this.infoWindowIndex].open(this.map2, this.marker);
                }
          );
              infoWindows.push(infoWindow);
              markers.push(marker);
              return marker;
                 }
          function addMarker2(latLng,time,id,rpm, map) {
                   var marker2 = new google.maps.Marker({
                       position: latLng,
                       map: map,
                       icon: image2,
                       infoWindowIndex: id
                   });
      var content2 = '<div id="mkst22">' +
      '<h6>' + 'INFO' + '</h6>' +
      '<p>' + time + '</p>' +'<p>' + 'RPM: '+ rpm +'</p>' + '</div>' ;
    var infoWindow2 = new google.maps.InfoWindow({
      content: content2
    });
             infoWindow2.setContent(content2);
    google.maps.event.addListener(marker2, 'mouseover',
     function(event) {
                  infoWindow2.open(map, marker2);
                  // infoWindows[this.infoWindowIndex].open(this.map2, this.marker);
                }
    );
          google.maps.event.addListener(marker2, 'mouseout',
     function(event) {
                  infoWindow2.close(map, marker2);
                  // infoWindows[this.infoWindowIndex].open(this.map2, this.marker);
                }
    );
        infoWindows2.push(infoWindow2)
    markers2.push(marker2);
                   return marker2;
                 }
     // });
            <?php
            ob_start();
               include_once 'finalquery2.php';
            $output = ob_end_clean(); ?>
            var myPath = [];
            var myPath2 = [];
            var hist = <?php echo json_encode($hist); ?>;
            var hist2 = <?php echo json_encode($hist2); ?>;
            var lineSymbol = {
             path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
            };
            var json_hist = jQuery.parseJSON(JSON.stringify(hist));
            initMap();
            if (json_hist[json_hist.length - 1] == undefined && json_hist2[json_hist2.length - 1] == undefined ) {
              $('#error').html("<h4>Error: No se obtuvieron datos en la búsqueda.</h4>").show();
            }
            if (json_hist[json_hist.length - 1] != undefined) {
              INIT_LAT = parseFloat(json_hist[json_hist.length - 1].Latitude);
              INIT_LON = parseFloat(json_hist[json_hist.length - 1].Longitude);
              //initMap();
              $(json_hist).each(function() {
                var ID = this.ID;
                var LATITUDE = this.Latitude;
                var LONGITUDE = this.Longitude;
                var TIME=this.DateTime;
                var myCoord2 = {lat:  parseFloat(LATITUDE), lng: parseFloat(LONGITUDE)};
                //myCoord2 = new google.maps.LatLng(parseFloat(LATITUDE), parseFloat(LONGITUDE));
                myPath.push(myCoord2);
                var myPathTotal2 = new google.maps.Polyline({
                  path: myPath,
                  icons: [{
                  icon: lineSymbol,
                  offset: '50%'
                  }],
                  strokeColor: '#e95d3c',
                  strokeOpacity: 1.0,
                  strokeWeight: 5
                });
                myPathTotal2.setPath(myPath)
                myPathTotal2.setMap(map);
                addMarker(new google.maps.LatLng(LATITUDE, LONGITUDE),TIME,ID, map);
                  });
            }
            //inicio
            var json_hist2 = jQuery.parseJSON(JSON.stringify(hist2));
            if (json_hist2[json_hist2.length - 1] != undefined) {
            INIT_LAT2 = parseFloat(json_hist2[json_hist2.length - 1].Latitude);
            INIT_LON2 = parseFloat(json_hist2[json_hist2.length - 1].Longitude);
            //initMap();
           $(json_hist2).each(function() {
             var ID2 = this.ID;
             var LATITUDE2 = this.Latitude;
             var LONGITUDE2 = this.Longitude;
             var TIME2 =this.DateTime;
             var rpm = this.RPM;
             var myCoord2b = {lat:  parseFloat(LATITUDE2), lng: parseFloat(LONGITUDE2)};
             //myCoord2b = new google.maps.LatLng(parseFloat(LATITUDE2), parseFloat(LONGITUDE2));
             myPath2.push(myCoord2b);
             var myPathTotal2b = new google.maps.Polyline({
               path: myPath2,
               icons: [{
               icon: lineSymbol,
               offset: '50%'
               }],
               strokeColor: '#000',
               strokeOpacity: 1.0,
               strokeWeight: 5
             });
             myPathTotal2b.setPath(myPath2)
             myPathTotal2b.setMap(map);
             addMarker2(new google.maps.LatLng(LATITUDE2, LONGITUDE2),TIME2,ID2,rpm, map);
           });
         }
            //fin
          </script>

  </body>
</html>
