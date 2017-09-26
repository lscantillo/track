<!DOCTYPE HTML>
<!--
	Ex Machina by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>ABCR Design: Tu solución web de rastreo</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&libraries=places&callback=initMap"
        async defer></script>

				<script >

								function ajaxCall() {
										$.ajax({
												url: "database2.php",
												success: (function (result) {
														$("#magicbox").html(result);
												})
										})
								};
								ajaxCall(); // To output when the page loads
								setInterval(ajaxCall, (5 * 1000));  // x * 1000 to get it in seconds

				</script>

				<!-- <script >

								function ajaxCall() {
										$.ajax({
												url: "database2.php",
												success: (function (result) {
														$("#load").html(result);
												})
										})
								};
								ajaxCall(); // To output when the page loads
								setInterval(ajaxCall, (5 * 1000));  // x * 1000 to get it in seconds

				</script>

<div id="load">
<?php include_once 'database2.php' ?>
</div> -->

				<script>
    <?php include_once 'database2.php' ?>
     var lat = "<?php echo $Lat; ?>";
     var lon = "<?php echo $Long; ?>";

     var myPath = [];
     var image = 'https://cdn0.iconfinder.com/data/icons/isometric-city-basic-transport/48/truck-front-01-48.png';
       $function initMap() {
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
                              strokeColor: '#e95d3c',
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>

	</head>
	<body class="homepage">

	<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Logo -->
					<div id="logo">
						<h1><a href="index.php">a b c r design</a></h1>
					</div>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="active"><a href="index.php">Rastreo</a></li>
							<li><a href="historico.php">Histórico</a></li>
						</ul>
					</nav>

			</div>
		</div>
	<!-- Header -->

	<!-- Banner -->
<?php include_once 'database2.php' ?>
      <div id="map"></div>
			<div id="magicbox">
											<!-- <?php include_once 'database2.php' ?> -->

											<!-- <?php if ($Lat == 0 and $Long == 0) {

												echo "<p> GPS NO CONECTADO </p>";

											} else {

												print "Último ID: $Id";
												echo "<br>";
												echo "<p></p>";

												print "Latitud: $Lat";
												echo "<br>";
												echo "<p></p>";

												print "Longitud: $Long";
												echo "<br>";
												echo "<p></p>";

												print "Tiempo: $Date";

											}
											?> -->
			</div>

	<!-- /Banner -->

	<!-- Main -->

	</body>
</html>
