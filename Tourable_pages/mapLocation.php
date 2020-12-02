<?php
	require 'dbConfig.php';
?>
<!DOCTYPE html>
<html>
<?php
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$globalLocID = 0;

//Upload location name and description

if(isset($_POST["submit"]))
{
    $name = $_POST["loc_name"];
    $desc = $_POST["desc"];
 
    if(!empty($name) && !empty($desc) && strlen($name) <= 100 && strlen($desc) <= 1000 && (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name)))
    {   
        // $num = mysqli_num_rows(mysqli_query($db, "SELECT * from locations where (Name = $name)"));
        // if($num > 0)
        // {
        //     echo "Name already taken";
        // }
        // else
        // { }
        // $insert1 = $db->query("INSERT into locations (Name) VALUES ($name)");
        // echo "<script type='text/javascript'>alert('Location name is valid');</script>";
        // echo "<script type='text/javascript'>alert('Location description is valid');</script>";
        $insert1 = $db->query("INSERT into locations (Name, Description) VALUES ('$name', '$desc')");
        $sql1 = $db->query("SELECT LocID from locations where `Name` = '$name'");
        $id1 = mysqli_fetch_array($sql1);
        $locID = $id1['LocID'];
        $globalLocID = $locID;
        // echo "<script>alert('First operation done!')</script>\n";
        if(mysqli_query($db,$insert1))
        {
            echo "Entered successfully!\n";                
        }
    }

    else
    {
      if(!empty($name) && strlen($name) <= 100){
        $message = "Location name is valid";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }

      if(!empty($desc) && strlen($desc) <= 1000){
        $message = "Location description is valid";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }

      if(strlen($name) > 100){
        $message = "Location name is invalid(exceeded max size)";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }

      if(strlen($desc) > 1000)
      {
        $message = "Location description is invalid(exceeded max size)";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }

      if(empty($name)){
        $message = "Location name is mandatory";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }

      if(empty($desc)){
        $message = "Location description is mandatory";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }

      if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name))
      {
        $message = "Location name should not have special characters";
        // echo "<script type='text/javascript'>alert('$message');</script>";
      }
  }


    // $desc = $_POST["desc"];
    //  if(!empty($desc))
    // {
    //     $insert2 = $db->query("INSERT into locations (Description) VALUES ($desc)");
    //     if($insert2)
    //     {
    //         echo "Description entered!\n";
    //     }
    // }


    if(!empty($_FILES["file"]["name"]))
    {
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes))
        {
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database  
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
        // echo "<script type='text/javascript'>alert('$statusMsg');</script>";

        // $file = 'uploads/munnar.jpg';
        // $fileSizeBytes = filesize($file);
        // $fileSizeMB = ($fileSizeBytes/1024/1024);
        // $fileSizeMB = number_format($fileSizeMB, 2);
        // if($fileSizeMB <= 5){
        //   // echo "<script type='text/javascript'>alert('Image size is valid');</script>";
        // }
        // else{
        //   // echo "<script type='text/javascript'>alert('Image is invalid, exceeded size limit');</script>";
        // }
    }
}
    else
    {
        echo "Enter valid username";
    }


// if(isset($_POST["submit"]))
// {
//     $desc = $_POST["desc"];
//     if(!empty($desc))
//     {
//         $insert1 = $db->query("INSERT into locations (Name) VALUES ($desc)");
//     }
//     else{
//         echo "Enter valid username";
//     }
// }




// if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
//     // Allow certain file formats
//     $allowTypes = array('jpg','png','jpeg','gif','pdf');
//     if(in_array($fileType, $allowTypes)){
//         // Upload file to server
//         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
//             // Insert image file name into database
//             $insert = $db->query("INSERT INTO locimages (Image_Name) VALUES ($fileName)");
//             if($insert){
//                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//             }else{
//                 $statusMsg = "File upload failed, please try again.";
//             } 
//         }else{
//             $statusMsg = "Sorry, there was an error uploading your file.";
//         }
//     }else{
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//     }
// }else{
//     $statusMsg = 'Please select a file to upload.';
// }
// echo $statusMsg;

// Display status message
// echo $statusMsg;
?>



  <head>
    <title>Location on the Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJazIa8wi_O1vvrPtGQ968Akncslka-NA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
		height: 50%;
		width: 56.9%;
		position: relative;
		top: 30%;
		left: 50%;
		transform: translate(-50%, -50%);
      }

      /* Optional: Makes the sample page fill the window. */
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
    
    <!-- This script is used to place markers when the user clicks on the map -->
    <script>
    	let map;
		// Markers are stored in array format
		let markers = [];
		
		function initMap() {
		const haightAshbury = { lat: 37.769, lng: -122.446 };
		map = new google.maps.Map(document.getElementById("map"), {
			zoom: 12,
			center: haightAshbury,
			mapTypeId: "terrain",
		});
		// This event listener will call addMarker() when the map is clicked.
		map.addListener("click", (event) => {
			addMarker(event.latLng);
		});
		// Adds a marker at the center of the map.
		addMarker(haightAshbury);
      }
      // Users can choose to hide, show or delete the markers

      // Adds a marker to the map and push to the array.
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

      // Sets the map on all markers in the array.
      function setMapOnAll(map) {
		for (let i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
      }

      // Removes the markers from the map, but keeps them in the array.
      function clearMarkers() {
        setMapOnAll(null);
      }

      // Shows any markers currently in the array.
      function showMarkers() {
        setMapOnAll(map);
      }

      // Deletes all markers in the array by removing references to them.
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
			<input type="text" name="locID" id = "locID" value="<?php echo $globalLocID ?>">
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