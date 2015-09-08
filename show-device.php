<?php 
include 'class/common.php';
$obj    = new common();
$obj->isUserLoggedIn();
$res    = $obj->getMyDevices($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>View Device Location</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>


<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 2,
    center: {lat: 53.5931973629393, lng: -3.06873521746154}
  });

  setMarkers(map);
}

var devices = [
   <?php foreach($res as $row){?>            
  ['<?php echo $row['device_id']?>', <?php echo $row['lat']?>, <?php echo $row['long']?>, 6],
	<?php }?>
];

function setMarkers(map) {
  var image = {
    url: 'images/cell_phone.png',
    // This marker is 20 pixels wide by 32 pixels high.
    size: new google.maps.Size(20, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0),
    // The anchor for this image is the base of the flagpole at (0, 32).
    anchor: new google.maps.Point(0, 32)
  };

  var shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: 'poly'
  };

  for (var i = 0; i < devices.length; i++) {
	  var device = devices[i];
	  var contentString = '<div id="content"><div id="siteNotice"></div><h1 id="firstHeading" class="firstHeading">'+ device[0] +'</h1></div>';

	  var infowindow = new google.maps.InfoWindow({
	  		content: contentString
	  });




	
    var marker = new google.maps.Marker({
      position: {lat: device[1], lng: device[2]},
      map: map,
      icon: image,
      shape: shape,
      title: device[0],
      zIndex: device[3]
    });

    marker.addListener('click', function() {
        infowindow.open(map, marker);
      });
  }
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
  </body>
</html>