<?php
    function connection2rds($query)
    {
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
        
        $result = mysqli_query($conn, $query);
        $finfo = mysqli_fetch_field($result);
        mysqli_data_seek($result, 1);
        $row = mysqli_fetch_row($result);
        while ($row = mysqli_fetch_array($result)) {
            $Id = $row['ID'];
            $Lat = $row['Latitude'];
            $Long = $row['Longitude'];
            $DateTime=$row['DateTime'];
            //$Time=$row['Time'];
    	}
        $answer = [$Id,$Lat,$Long,$DateTime];
        return $answer;
    }
    function suscintquery ($fstdt,$scnddt,$place){
        $query="SELECT * FROM locations2";
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
    function whereand($query,$string){
        if(strlen($string)>0){
            if(strlen($query)<26){
                $query=$query." WHERE "; 
            }else{
                $query=$query." AND ";
            }
            return $query=$query.$string;
        }else{
            return $query;
        }
    }
    function lookup($string){
 
        $string = str_replace (" ", "+", urlencode($string));
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$string."&sensor=false";
 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = json_decode(curl_exec($ch), true);
 
        // If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
        if ($response['status'] != 'OK') {
            return null;
        }
 
        //print_r($response);
        $geometry = $response['results'][0]['geometry'];
 
        $latitude = $geometry['location']['lat'];
        $longitude = $geometry['location']['lng'];
 
        $array = array(
            'longitude' => $geometry['location']['lng'],
            'latitude' => $geometry['location']['lat'],
            'location_type' => $geometry['location_type'],
        );
 
        return $array;
 
    }
?>
