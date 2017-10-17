<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
    <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
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
    <?php include 'finalquery2.php' ?>
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
  <div id="map"></div>
  <div id="filtercontrols">

              <form action=historico.php>
              <input type="submit" class= "apply" name="submit" value="Retornar">
              </form>

    </div>
   
    <script>
      $(document).ready(function() {     
     
    <!--var id = "<?php echo $Id; ?>";-->
    <!--var lat = "<?php echo $Lat; ?>";-->
    <!--var lon = "<?php echo $Long; ?>";-->
    var lat = "48.85809";
    var lon = "2.294694";
    var myPath = [];
    infoWindows = Array();
    markers = Array();
    var image = 'https://cdn0.iconfinder.com/data/icons/isometric-city-basic-transport/48/truck-front-01-48.png';
    function initMap() {
             
             var myOptions = {
                 zoom: 16,
                 center: new google.maps.LatLng(parseFloat(lat),parseFloat(lon)),
                 panControl: true,
                 zoomControl: true,
                 scaleControl: true,
                 mapTypeId: google.maps.MapTypeId.ROADMAP
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
                  // markers.push(marker);

                  var content = '<div id="Marker_Time">' +
      '<h6>' + 'Información' + '</h6>' +
      '<p>' + time + '</p>' + '</div>';

    var infoWindow = new google.maps.InfoWindow({
      content: content
    });
                  google.maps.event.addListener(marker, 'click',
                function(event) {
                  infoWindow.open(map, marker);
                  // infoWindows[this.infoWindowIndex].open(this.map2, this.marker);
                }
    );

    infoWindows.push(infoWindow);
    markers.push(marker);
                   return marker;
              }
        dtpicker='<?=$_POST['datetimepicker']?>';
        dtpicker2='<?=$_POST['datetimepicker2']?>';
        plc='<?=$_POST['plc']?>';
  //  setInterval(function mapload(){
      //  $(document).ready(function() {
          $.ajax({
                 type: 'POST',
                 url: "finalquery2.php",
                 data: {
                   datetimepicker: dtpicker,
                   datetimepicker2: dtpicker2,
                   plc: plc
                 },
                success: function(hist)
                {

                    var json_hist = jQuery.parseJSON(JSON.stringify(hist));
                    initMap();
                    INIT_LAT = parseFloat(json_hist[json_hist.length - 1].Latitude);
                    INIT_LON = parseFloat(json_hist[json_hist.length - 1].Longitude);
                    $(json_hist).each(function() {
                      var ID = this.ID;
                      var LATITUDE = this.Latitude;
                      var LONGITUDE = this.Longitude;
                      var TIME=this.DateTime
                      myCoord2 = new google.maps.LatLng(parseFloat(LATITUDE), parseFloat(LONGITUDE));
                      myPath.push(myCoord2);
                      var myPathTotal2 = new google.maps.Polyline({
                        path: myPath,
                        strokeColor: '#e95d3c',
                        strokeOpacity: 1.0,
                        strokeWeight: 5
                      });
                      myPathTotal2.setPath(myPath)
                      myPathTotal2.setMap(map);
                      addMarker(new google.maps.LatLng(LATITUDE, LONGITUDE),TIME,ID, map);
                    });
                },
                dataType: "json"//set to JSON
              })
    });
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&callback=initMap">
    </script>

  </body>
</html>
