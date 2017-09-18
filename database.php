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

    function suscintquery ($fstdt,$scnddt,$hb,$he,$place,$limit){
        $query="SELECT * FROM locations";
        $ybg="";
        $yen="";
        $hbg="";
        $hen="";
        $plc="";
        $lmt="";
        
        if(strlen($fstdt)>0){
            $ybg="DateTime >= '".$fstdt;
            if(strlen($hb)>0){
                $ybg=$ybg." ".$hb.":00'";
            }else{
                $ybg=$ybg." 00:00:00'";
            }
        }

        if(strlen($scnddt)>0){
            $yen="DateTime <= '".$scnddt;
            if(strlen($he)>0){
                $yen=$yen." ".$he.":59'";
            }else{
                $yen=$yen." 23:59:59'";
            }
        }
        
        if($limit>0){
            $lmt=" LIMIT ".$limit;
        }
        
        if (strlen($place)>0){
            $array = lookup($place);
            #$plc="Latitude >= ".($array['latitude']-0.025)." AND Latitude <= ".($array['latitude']+0.025);
            #$plc=$plc." AND Longitude >= ".($array['longitude']-0.025)." AND Longitude <= ".($array['longitude']+0.025);
            $plc=" Longitude >= ".($array['longitude']-0.025)." AND Longitude <= ".($array['longitude']+0.025);
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

        if(strlen($lmt)>0){
            $query=$query.$lmt;
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
 
        $longitude = $geometry['location']['lat'];
        $latitude = $geometry['location']['lng'];
 
        $array = array(
            'latitude' => $geometry['location']['lng'],
            'longitude' => $geometry['location']['lat'],
            'location_type' => $geometry['location_type'],
        );
 
        return $array;
 
    }

    function querygenerator($yb,$ye,$mb,$me,$db,$de,$hb,$he,$limit)
    {
        $query="SELECT * FROM locations ";
        $ybg="";
        $yen="";
        $hbg="";
        $hen="";
        $lmt="";

        if($yb>0){
            if($mb>0){
                if($db>0){
                    $ybg="Date >= ".dategenerator($yb,$mb,$db)." ";
                }else{
                    $ybg="Date >= ".dategenerator($yb,$mb,"01")." ";
                }
            }else{
                $ybg="Date >= ".dategenerator($yb,"01","01")." ";
            }
        }

        if($ye>0){
            if($me>0){
                if($de>0){
                    $yen="Date <= ".dategenerator($ye,$me,$de)." ";
                }else{
                    $yen="Date <= ".dategenerator($ye,$me,"31")." ";
                }
            }else{
                $yen="Date <= ".dategenerator($ye,"12","31")." ";
            }
        }

        if($hb>=0 AND ($he!=0 AND $hb!=0)){
            $hbg=" Time >= ".$hb.":00:00 ";
        }

        if($he>=0 AND ($he!=0 AND $hb!=0)){
            $hen=" Time <= ".$he.":00:00 ";
        }

        if($limit>0){
            $lmt="LIMIT ".$limit;
        }

        $query=whereand($query,$ybg);
        $query=whereand($query,$yen);
        $query=whereand($query,$hbg);
        $query=whereand($query,$hen);
        
        if(strlen($lmt)>0){
            if(strlen($query)>26){
                $query=$query." AND ";
            }
            $query=$query.$lmt;
        }

        return $query;
    }

    function dategenerator($y,$m,$d)
    {
        $date="'20".$y."-".$m."-".$d."'";
        return $date;
    }

    function painintheass($query)
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

        return mysqli_query($conn, $query);
    }


?>

