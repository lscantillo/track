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
?>
