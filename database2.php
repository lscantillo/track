<?php
      include 'database.php';
      $query = "SELECT * FROM locations WHERE 1 ";
      $row=connection2rds($query);
      $Id = $row[0];
      $Lat = $row[1];
      $Long = $row[2];
      $Date=$row[3];
     if ($Lat == 0 and $Long == 0) {

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
      
    ?>
