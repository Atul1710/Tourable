<!DOCTYPE html>
<html>
  <head>
    <title>Removing Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJazIa8wi_O1vvrPtGQ968Akncslka-NA&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: "Roboto", "sans-serif";
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
    <script>
      // In the following example, markers appear when the user clicks on the map.
      // The markers are stored in an array.
      // The user can then click an option to hide, show or delete the markers.
      let map;
      let markers = [];
      <?php 
      $conn = new mysqli("localhost","root","", "tourable");
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $result = mysqli_query($conn,"SELECT MapLat,MapLong from locations where LocID = 8");
        $row = mysqli_fetch_assoc($result);
      ?>

      function addLocationMarker(location)
      {
        const marker1 = new google.maps.Marker({
          position: location,
          map: map,
        });
        markers.push(marker1);
      }

      function initMap() {
        const haightAshbury = { lat: <?php echo $row['MapLat']?>, lng: <?php echo $row['MapLong']?> };
        map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: haightAshbury,
          mapTypeId: "terrain",
        });
        addLocationMarker(haightAshbury);
        // This event listener will call addMarker() when the map is clicked.
        map.addListener("click", (event) => {
          addMarker(event.latLng);
        });
        // Adds a marker at the center of the map.
        addMarker(haightAshbury);
      }

      // Adds a marker to the map and push to the array.
      function addMarker(location) {
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
    <form action="SaveLocation.php" method="post">
      <input type="text" name="lat" id="lat">
      <input type="text" name="long" id="long">
      <input type="submit" name="submit" id="submit">
    </form>
    <p>Click on the map to add markers.</p>
  </body>
</html>