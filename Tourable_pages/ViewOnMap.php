<?php 
    session_start();
    include "dbConfig.php";
    if(isset($_POST['visit'])){
        $lat = $_POST['lat'];
        $long = $_POST['long'];
    }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJazIa8wi_O1vvrPtGQ968Akncslka-NA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 700px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const location = { lat: <?php echo $lat;?>, lng: <?php echo $long; ?> };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 4,
          center: location,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: location,
          map: map,
        });
      }
    </script>
  </head>
  <body>
    <!--The div element for the map -->
    <div id="map"></div>
    <a class="btn btn-success" href="../newhomepage.php">Back to homepage</a>
  </body>
</html>