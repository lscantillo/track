<?php
 $servername = "designlocations.cl8waza61otc.us-east-2.rds.amazonaws.com";
 $username = "abcr";
 $password = "abcr1234";
// Create connection
$conn = new mysqli($servername, $username, $password);
    mysqli_select_db($conn, "designlocations");
    $query = "SELECT  * FROM locations ORDER BY ID DESC LIMIT 1  ";
    $rs = mysqli_query($conn,$query) or die("Unsuccessfull Query");

      if ($rs) {
      $data = mysqli_fetch_assoc($rs);
  }
  echo json_encode($data);

?>

