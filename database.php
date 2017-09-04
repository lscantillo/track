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
            $Date=$row['Date'];
            $Time=$row['Time'];
    	}

        $answer = [$Id,$Lat,$Long,$Date,$Time];

        return $answer;
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
                    $ybg="Date> ".dategenerator($yb,$mb,$db)." ";
                }else{
                    $ybg="Date> ".dategenerator($yb,$mb,"00")." ";
                }
            }else{
                $ybg="Date> ".dategenerator($yb,"00","00")." ";
            }
        }

        if($ye>0){
            if($me>0){
                if($de>0){
                    $yen="Date< ".dategenerator($yb,$mb,$db)." ";
                }else{
                    $yen="Date< ".dategenerator($yb,$mb,"00")." ";
                }
            }else{
                $yen="Date< ".dategenerator($yb,"00","00")." ";
            }
        }

        if($hb>=0){
            $hbg=" Time> ".$hb.":00:00 ";
        }

        if($he>=0){
            $hen=" Time< ".$he.":00:00 ";
        }

        if($limit>0){
            $lmt="LIMIT ".$limit;
        }


        if(strlen($ybg)>0){
            if(strlen($query)<26){
                $query=$query."WHERE "; 
            }else{
                $query=$query."AND ";
            }
            $query=$query.$ybg;
        } 

        if(strlen($yen)>0){
            if(strlen($query)<26){
                $query=$query."WHERE "; 
            }else{
                $query=$query."AND ";
            }
            $query=$query.$yen;
        }

        if(strlen($hbg)>0){
            if(strlen($query)<26){
                $query=$query."WHERE "; 
            }else{
                $query=$query."AND ";
            }
            $query=$query.$hbg;
        }

        if(strlen($hen)>0){
            if(strlen($query)<26){
                $query=$query."WHERE "; 
            }else{
                $query=$query."AND ";
            }
            $query=$query.$hen;
        }

        if(strlen($lmt)>0){
            if(strlen($query)>26){
                $query=$query."AND ";
            }
            $query=$query.$lmt;
        }

        return $query;
    }

    function yrmnthd($yb,$ye,$mb,$me,$db,$de)
    {
        $begining=dategenerator($yb,$mb,$db);
        $ending=dategenerator($ye,$me,$de);
        $answer=interval($begining,$ending);
        return $answer;
    }

    function yrmnth($yb,$ye,$mb,$me)
    {
        $begining=dategenerator($yb,$mb,"00");
        $ending=dategenerator($ye,$me,"00");
        $answer=interval($begining,$ending);
        return $answer;
    }

    function dategenerator($y,$m,$d)
    {
        $date="20".$y."-".$m."-".$d;
        return $date;
    }

    function dateinterval($begin,$end)
    {
        $answer=" Date<".$begin." AND Date>".$end;
        return $answer;
    }

    function timeinterval($begin,$end)
    {
        $answer=" Time<".$begin." AND Time>".$end;
        return $answer;
    }
?>
