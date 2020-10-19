<?php
$conn = new mysqli("localhost","root","", "tourable");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if(isset($_POST['submit']))
  {
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $insert = $conn->query("UPDATE locations set MapLat = $lat, MapLong = $long where LocID = 8");
    if($insert)
    {
      echo "Inserted Successfully!";
    }
    else{
      echo "Error in inserting!";
    }
  }
?>