<?php
	require 'dbConfig.php';
?>
<!DOCTYPE html>
<html>
<?php
$statusMsg = '';

$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$globalLocID = 0;

if(isset($_POST["submit"]))
{
    $name = $_POST["loc_name"];
    $desc = $_POST["desc"];
 
    if(!empty($name) && !empty($desc) && strlen($name) <= 100 && strlen($desc) <= 1000 && (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)))
    {   
        $insert1 = $db->query("INSERT into locations (Name, Description) VALUES ('$name', '$desc')");
        $sql1 = $db->query("SELECT LocID from locations where `Name` = '$name'");
        $id1 = mysqli_fetch_array($sql1);
        $locID = $id1['LocID'];
        $globalLocID = $locID;
        if(mysqli_query($db,$insert1))
        {
            echo "Entered successfully!\n";                
        }
    }

    else
    {
      if(!empty($name) && strlen($name) <= 100){
        $message = "Location name is valid";
      }

      if(!empty($desc) && strlen($desc) <= 1000){
        $message = "Location description is valid";
      }

      if(strlen($name) > 100){
        $message = "Location name is invalid(exceeded max size)";
      }

      if(strlen($desc) > 1000)
      {
        $message = "Location description is invalid(exceeded max size)";
      }

      if(empty($name)){
        $message = "Location name is mandatory";
      }

      if(empty($desc)){
        $message = "Location description is mandatory";
      }

      if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name))
      {
        $message = "Location name should not have special characters";
      }
  }

    if(!empty($_FILES["file"]["name"]))
    {
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes))
        {
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                $insert = $db->query("INSERT INTO location_images (LocID, loc_image) VALUES ('$locID','$fileName')");
                if($insert){
                    $statusMsg1 = "The file ".$fileName. " has been uploaded successfully.";
                    $statusMsg = "Picture is valid";
                }else{
                    $statusMsg = "File upload failed, please try again.";
                } 
            }else{
                $statusMsg = "Sorry, there was an error uploading your file.";  
            }
        }
        else{
            $statusMsg = 'Invalid file type';
        }
    }
}
    else
    {
        echo "Enter valid username";
    }

?>

  <head>
    <title>Location on the Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJazIa8wi_O1vvrPtGQ968Akncslka-NA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* We need to set the map height explicitly to define the size of the div
      element that contains the map. */
      #map {
		height: 50%;
		width: 56.9%;
		position: relative;
		top: 30%;
		left: 50%;
		transform: translate(-50%, -50%);
      }

      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
	  }
	  
	  body {
		background-image: url('images/bg1.jpeg');
		background-repeat: no-repeat;
		background-size: cover;
		justify-content: center;
		font-family: 'Roboto', sans-serif;
	  }

	  .map-box {
		width: 53%;
		margin-top: 150px;
		margin-bottom: 90px;
		position: relative;
		top: 5%;
		left: 50%;
		padding: 30px;
		transform: translate(-50%, -50%);
		background-color: rgba(40, 40, 40, 0.8);
		text-align: center;
		color: white;
	  }

	  .map-box h2 {
		/* font-size: 50px; */
		border-bottom: 6px solid #8D8741;
		/* margin-bottom: 50px; */
		padding: 13px;
    position: relative;
		left: 50%;
		transform: translateX(-50%);
		color: white;
	  }

	  .map-box h4 {
		  display: inline;
	  }

      #floating-panel {
        position: absolute;
        padding-left: 1px;
        margin-left: 200px;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        visibility: hidden;
        /* padding: 5px; */
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
      }
    </style>
    
    <!-- To place markers when the user clicks on the map -->
    <script>
    	let map;
		let markers = [];
		
		function initMap() {
		const haightAshbury = { lat: 37.769, lng: -122.446 };
		map = new google.maps.Map(document.getElementById("map"), {
			zoom: 12,
			center: haightAshbury,
			mapTypeId: "terrain",
		});
		map.addListener("click", (event) => {
			addMarker(event.latLng);
		});
		// Adds a marker at the center of the map.
		addMarker(haightAshbury);
      }

      function addMarker(location) {
        deleteMarkers();
        document.getElementById('long').value = location.lng();
        document.getElementById('lat').value = location.lat();
        const marker = new google.maps.Marker({
          position: location,
          map: map,
        });
        markers.push(marker);
      }

      function setMapOnAll(map) {
		for (let i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
      }

      function clearMarkers() {
        setMapOnAll(null);
      }

      function showMarkers() {
        setMapOnAll(map);
      }

      function deleteMarkers() {
        clearMarkers();
        markers = [];
      }

    </script>
  </head>
  <body>
    <div id="floating-panel">
      <input onclick="clearMarkers();" type="button" value="Hide Markers" />
      <input onclick="showMarkers();" type="button" value="Show All Markers" />
      <input onclick="deleteMarkers();" type="button" value="Delete Markers" />
    </div>
	<div id="map"></div>
	<div class="map-box">
    	<h2>Click on the map to add markers.</h2>
		<h3>OR</h3>
		<h2>Manually enter the coordinates</h2>
		<form action="successPage.php" method="POST">
			<input type="text" name="locID" id = "locID" value="<?php echo $globalLocID ?>" hidden>
			<h4>Lat & Long:</h4>
			<input type="text" name="lat" id="lat">
			<input type="text" name="long" id="long">
			<input type="submit" name="submit_btn" id="submit_btn">
		</form>
	</div>
  </body>
</html>

<?php 
    if(isset($_POST['submit_btn']))
    {
    $LOCID = $_POST['locID']; 
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $insert = $db->query("UPDATE locations set MapLat = $lat, MapLong = $long where LocID = '$LOCID'");
    // if($insert)
    // {
    //   echo "Inserted Successfully!";
    // }
	// else
	// {
    //   echo "Error in inserting!";
    // }
  }
?> 