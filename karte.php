<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <title> Web Tracking </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/syrus.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="/time/jquery-timepicker-master/jquery.timepicker.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="/time/jquery-timepicker-master/jquery.timepicker.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp2b5o90_5K1NbK5qZj86P6Hn61xhUFII&libraries=places&callback=Hi"
        async defer></script>
    
    <script>
    $( function() {
      $( "#dtstart" ).datepicker({
        dateFormat: "yy-mm-dd",  
        onSelect: function (){
          var dtend = $('#dtend');
          var minDate = $(this).datepicker('getDate');
          dtend.datepicker('setDate', minDate);
          dtend.datepicker('option', 'minDate', minDate);
        }
      });
    } );
    </script>

    <script>
    $( function() {
      $( "#dtend" ).datepicker({
      dateFormat: "yy-mm-dd",  
      });
    } );
    </script>
    
    <script>
      $( function() {
        $( '#tmstart' ).timepicker({
          step: 15,
          timeFormat: 'H:i',
          show2400: true,
        });
      });  
    </script>

    <script>
      $( function() {
        $( '#tmend' ).timepicker({
          step: 15,
          timeFormat: 'H:i',
          show2400: true,
        });
      });  
    </script>
    
    <script type="text/javascript">
    function Hi(){
     var id1 = document.getElementById('textt');
     var autocomplete = new google.maps.places.Autocomplete(id1); 
    };
    </script>
    
</head>

  <body>
    <form action="finalhistoric.php" name="StartDate" method="POST">
      <p>Fecha incial: <input name="date1" type="text" id="dtstart"></p>
      <p>Hora inicial: <input name="time1" type="text" id="tmstart"></p>
      <p>Fecha final: <input name="date2" type="text" id="dtend"></p>
      <p>Hora final: <input name="time2" type="text" id="tmend"></p>
      <p>Ubicación: <input type="text" name="plc" id='textt' placeholder="Filtrar por lugar" class="controls" size="40"></p>
      <p>Límite de resultados: <select id="howmany" name="lmt" >
        <option value="0">Eventos a desplegar</option>
        <option value="1">1</option>
        <option value="10">10</option>
        <option value="100">100</option>
        <option value="1000">1000</option>
      </select></p>
      <input type="submit" name="submit" value="Buscar">
    </form>
  </body>
</html>
