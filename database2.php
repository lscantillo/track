<?php
      include 'database.php';
      $query = "SELECT * FROM locations WHERE 1 ";
      $row=connection2rds($query);
      $Id = $row[0];
      $Lat = $row[1];
      $Long = $row[2];
      $Date=$row[3];
     // $Time=$row[4];
      if ($Lat == 0 and $Long == 0) {
            
        echo "<p> GPS NO CONECTADO </p>";
        
      } else {
       
        echo "<p>";
        print "Último ID: $Id";
        echo "</p>";
        echo "<p>";
        print "Latitud: $Lat";
        echo "</p>";
        echo "<p>";
        print "Longitud: $Long";
        echo "</p>";
        echo "<p>";
        print "Tiempo: $Date";
        echo "</p>";
    
      }
    ?>
