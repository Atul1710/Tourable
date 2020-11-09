<?php
$conn = new mysqli("localhost","root","", "tourable");
require "upload1.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if(isset($_POST['submit_btn']))
  {
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $insert = $conn->query("UPDATE locations set MapLat = $lat, MapLong = $long where LocID = $locID");
    if($insert)
    {
      echo "Inserted Successfully!";
    }
    else{
      echo "Error in inserting!";
    }
  }
?>  