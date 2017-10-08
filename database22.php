<?php
      include 'database11.php';
      $query = "SELECT * FROM locations2 WHERE 1 ";
      $row=connection2rds($query);
      $Id2 = $row[0];
      $Lat2 = $row[1];
      $Long2 = $row[2];
      $Date2=$row[3];
      $RPM=$row[4];
     if ($Lat2 == 0 and $Long2 == 0) {
        echo "<p> GPS NO CONECTADO </p>";
      } else {
        print "Último ID: $Id2";
        echo "<br>";
        echo "<p></p>";
        print "Latitud: $Lat2";
        echo "<br>";
        echo "<p></p>";
        print "Longitud: $Long2";
        echo "<br>";
        echo "<p></p>";
        print "Tiempo: $Date2";
        echo "<br>";
        echo "<p></p>";
        print "RPM: $RPM";
      }

    ?>
