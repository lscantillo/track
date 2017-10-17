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

  $hist=[];
  $hist2=[];


  if ($_POST['orng']){
    $query=suscintquery("locations",$_POST['datetimepicker'],$_POST['datetimepicker2'],$_POST["plc"]);
    $hist=asking($conn, $query, $hist);    
    ;
  }

  else($_POST['blck']){
    $query=suscintquery("locations2",$_POST['datetimepicker'],$_POST['datetimepicker2'],$_POST["plc"]);
    $hist2=asking($conn, $query, $hist2);   
    
  }

  // $markers= json_encode($hist);
  echo json_encode($hist);
  $historico=json_encode($hist);

  function asking ($conn, $query, $hist){

    $result = mysqli_query($conn, $query);
                  //$hist= array();
    while($row = mysqli_fetch_array($result))
    {
      $Id = $row['ID'];
      $Lat = $row['Latitude'];
      $Long = $row['Longitude'];
      $hist[]=$row;
    }
    
    return $hist;
  }

?>
