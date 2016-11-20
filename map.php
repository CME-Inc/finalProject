<?php
require 'dbconn.php'; 
     $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
     $id = 6;
     $query_select = "SELECT * FROM `articles` WHERE id = '$id' LIMIT 1";
     $rs2 = (mysqli_query($conn, $query_select)) or die(mysqli_error($conn));
     	if(!$rs2){
     		echo mysqli_error();
		} else{
			while($rws = mysqli_fetch_assoc($rs2)){
	$lat =  $rws['lat'];
	$lng =  $rws['lng'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
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
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
          origin: new google.maps.LatLng(42.0128951, 23.0951460), // document.getElementById('start').value,
          destination: new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>),// document.getElementById('end').value,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
      function initMap(lat, lng) {
      
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: {lat: 41.8316256, lng: 23.4889642}
        });
        directionsDisplay.setMap(map);
        
        calculateAndDisplayRoute(directionsService, directionsDisplay);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmfxAABTTiJCMmrPaOxEn07K0D55d23x8&callback=initMap">
    </script>
  </body>
</html>
<?php } } ?>