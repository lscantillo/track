<?php

  include 'database.php';

  $servername = "designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com";
  $username = "abcr";
  $password = "abcr1234";
        // Create connection
  $conn = new mysqli($servername, $username, $password);
        // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
         #echo "Connected successfully";
  mysqli_select_db($conn, "designlocations");
  
  $yb=$_POST['yrbeg'];
  echo " yb: ".$yb;
  $ye=$_POST['yrend'];
  $mb=$_POST['monbeg'];
  echo " mb: ".$mb;
  $me=$_POST['monend'];
  $db=$_POST['daybeg'];
  echo " db: ".$db;
  $de=$_POST['dayend'];
  $hb=$_POST['hourbeg'];
  echo " hb: ".$hb;
  $he=$_POST['hourend'];
  $limit=$_POST['numevents'];

  echo $limit;

  $query = querygenerator($yb,$ye,$mb,$me,$db,$de,$hb,$he,$limit);
  
  $result = mysqli_query($conn, $query);

  echo '<table style="width:100%">';
  echo "<tr>";
  echo "<th>ID</th>";
  echo "<th>Latitude</th>";
  echo "<th>Longitude</th>";
  echo "<th>Date</th>";
  echo "<th>Time</th>";
  echo "</tr>";
  
  while($row = mysqli_fetch_array($result))
  {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Latitude'] . "</td>";
    echo "<td>" . $row['Longitude'] . "</td>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "<td>" . $row['Time'] . "</td>";
    echo "</tr>";
  }
  echo "</table>";
  
?>