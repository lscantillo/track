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
  $query=suscintquery($_POST['date1'],$_POST['date2'],$_POST['time1'],$_POST['time2'], $_POST["plc"], $_POST["lmt"]);
  
  $result = mysqli_query($conn, $query);
  
 $hist=[];
  while($row = mysqli_fetch_array($result))
  {
      $Id = $row['ID'];
      $Lat = $row['Latitude'];
      $Long = $row['Longitude'];
      $hist[]=$row;
   
  }
  
  echo json_encode($hist);
  
?>
