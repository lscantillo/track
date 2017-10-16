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
  function suscintquery ($fstdt,$scnddt,$place){
        $query="SELECT * FROM locations";
        $ybg="";
        $yen="";
        $plc="";
        
        if(strlen($fstdt)>0){
            $ybg="DateTime >= '".$fstdt;
        }

        if(strlen($scnddt)>0){
            $yen="DateTime <= '".$scnddt;
        }
        
        if (strlen($place)>0){
            $array = lookup($place);
            $plc="Latitude BETWEEN ".($array['latitude']-0.004)." AND ".($array['latitude']+0.004);
            $plc=$plc." AND Longitude BETWEEN ".($array['longitude']-0.004)." AND ".($array['longitude']+0.004);
        }
        
        if(strlen($plc)>0){
            $query=whereand($query,$plc);
        }
        
        if(strlen($ybg)>0){
            $query=whereand($query,$ybg);
        }

        if(strlen($yen)>0){
            $query=whereand($query,$yen);
        }

        return $query;

    }
  $query=suscintquery($_POST['datetimepicker'],$_POST['datetimepicker2'],$_POST["plc"]);

  $result = mysqli_query($conn, $query);

 $hist=[];
//$hist= array();
  while($row = mysqli_fetch_array($result))
  {
      $Id = $row['ID'];
      $Lat = $row['Latitude'];
      $Long = $row['Longitude'];
      $hist[]=$row;

  }

 // $markers= json_encode($hist);
 echo json_encode($hist);

?>
