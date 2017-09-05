<?php
$servername = "designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com";
$username = "abcr";
$password = "abcr1234";

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

// Opens a connection to a MySQL server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Set the active MySQL database
$db_selected = mysqli_select_db($conn, "designlocations");
if (!$db_selected) {
  die ('Can\'t use db : ' .$db_selected->connect_error );
}

// Select all the rows in the markers table
$query = "SELECT * FROM locations WHERE 1 ";
$result = mysqli_query($conn, $query);
if (!$result) {
  die('Invalid query: ' .$result->connect_error );
}
$finfo = mysqli_fetch_field($result);
mysqli_data_seek($result, 1);
$row = mysqli_fetch_row($result);


header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<marker ';
  // echo 'name="' . parseToXML($row['name']) . '" ';
  // echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'ID="' . $row['ID'] . '" ';
  echo 'Latitude="' . $row['Latitude'] . '" ';
  echo 'Longitude="' . $row['Longitude'] . '" ';
  echo '/>';
}
// while ($row = mysqli_fetch_array($result)) {
//     $Id = $row['ID'];
//     $Lat = $row['Latitude'];
//     $Long = $row['Longitude'];
//       }

// End XML file
echo '</markers>';


?>
