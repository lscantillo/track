<?php;
                $servername = "designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com:3306";
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
    #$query = 'select * from gatos WHERE Nombre LIKE '%" . $name .  "%' OR Patrón LIKE '%" . $name ."%'";';
    $query = "SELECT * FROM locations WHERE 1 ";

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
	if ($Lat == 0) {
            
echo "<p> GPS NO CONECTADO </p>";
            
echo "<li>";
            
print "ID: $Id";

            
echo "<li>";
            
print "Latitud: $Lat";

            
echo "<li>";
            
print "Longitud: $Long";

         
 } elseif ($Long ==0 ) {
           
 echo "<p> GPS NO CONECTADO </p>";
            
echo "<li>";
            
print "ID: $Id";

            
echo "<li>";
            
print "Latitud: $Lat";

            
echo "<li>";
            
print "Longitud: $Long";
          
} else {

       
 echo "<li>";
        
print "ID: $Id";
        
echo "<br>";

        
echo "<li>";
        
print "Latitud: $Lat";
       
 echo "<br>";

        
echo "<li>";
        
print "Longitud: $Long";
       
 echo "<br>";

        
echo "<li>";
       
 print "Date: $Date";

      
  echo "<li>";
       
 print "Time: $Time";

  
echo "<br>";

 
    }
        




       
?>
