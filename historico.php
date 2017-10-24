<!DOCTYPE HTML>
<!--
    Ex Machina by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
    <head>
        <title>ABCR Design: Filtrado histórico</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen"
        href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
        <!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&libraries=places&callback=initMap"


        async defer></script>
        <script>
        function initMap(){
        var latlng = new google.maps.LatLng(11.0183135,-74.8416722);    
        map = new google.maps.Map(document.getElementById("map"),{
            zoom: 16,
            center: latlng
        });
        var id1 = document.getElementById('plc');
        var autocomplete = new google.maps.places.Autocomplete(id1);
        };  
        </script>
        
        <script src="js/skel.min.js"></script>
        
        <script src="js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel-noscript.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-desktop.css" />
        </noscript>
        <!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
    </head>
    <body class="left-sidebar">

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
                            <li><a href="index.php">Rastreo</a></li>
                            <li class="active"><a href="historico.php">Histórico</a></li>                           
                        </ul>
                    </nav>

            </div>
        </div>
    <!-- Header -->
        
    <!-- Banner -->
    <div id="map"></div>
    <div id="filtercontrols" style="width: 530px">
        <form action="finalhistoric.php" name="Places" method="POST">
            <div id="datesfilter">
                <div id="datetimepicker" class="input-append date">
                    <input type="text" name="dtpb" placeholder="Fecha Inicial de Filtrado"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
                <div id="datetimepicker2" class="input-append date">
                    <input type="text" name="dtpe" placeholder="Fecha Final de Filtrado"></input>
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                </div>
            </div>
            <div id="locationfilter">
                <input type="text" name="plc" id='plc' placeholder="Filtrar por ubicación (opcional)" class="controls"><br>
                Camión Naranja <input type="checkbox" name="orng" value="true" checked>
                Camión Negro <input type="checkbox" name="blck" value="true" checked>
                <input type="submit" class= "apply" name="submit" value="Aplicar">
            </div>
        </form>
    </div>

    <script type="text/javascript"
     src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
    </script> 
    <script type="text/javascript"
     src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
    </script>
    <script type="text/javascript"
     src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
    </script>

    <script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'yyyy-MM-dd hh:mm:00',
            pickSeconds: false
        });
        $('#datetimepicker2').datetimepicker({
            format: 'yyyy-MM-dd hh:mm:00',
            useCurrent: false, //Important! See issue #1075
            pickSeconds: false
        });
        $('#datetimepicker').on('changeDate', function(ev){
            var startpicker = $( '#datetimepicker').data('datetimepicker');
            var endpicker = $( '#datetimepicker2').data('datetimepicker');
            var minDate = startpicker.getDate();
            var Date2 = endpicker.getDate();
            if (minDate > Date2) {
                endpicker.setDate(minDate)
            }
            endpicker.startDate = minDate;
        });
        $('#datetimepicker2').on('changeDate', function(ev){
            var startpicker = $( '#datetimepicker').data('datetimepicker');
            var endpicker = $( '#datetimepicker2').data('datetimepicker');
            var minDate = startpicker.getDate();
            var Date2 = endpicker.getDate();
            if (minDate > Date2) {
                endpicker.setDate(minDate)
            }
            endpicker.startDate = minDate;
        });
    });
    </script>
        </body>
</html>
