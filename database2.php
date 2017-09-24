<?php
      include 'database.php';
      $query = "SELECT * FROM locations WHERE 1 ";
      $row=connection2rds($query);
      $Id = $row[0];
      $Lat = $row[1];
      $Long = $row[2];
      $Date=$row[3];
     // $Time=$row[4];
      
    ?>
