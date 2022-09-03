<!-- PER VISUALIZZARE GLI ERRORI -->
<?php
/*
  error_reporting(0);
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
  error_reporting(E_ALL & ~E_NOTICE);
  error_reporting(E_ALL);
  error_reporting(-1);
  ini_set('error_reporting', E_ALL); 
*/
?>
<!--  -->





<!-- INCLUDI GLI ASSET -->
<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<div class="home-page">
<?php include 'controllers/navigation/first-navigation.php' ?>
<!--  -->





<!-- PREDI DATI DAL DATABASE -->
<?php
session_start();
require '_database/database.php';
$user_username=$_SESSION['user_username'];
$sql="SELECT user_lat,user_lng,user_avatar,user_username FROM user";
$result=mysqli_query($database,$sql) or die(mysqli_error($database));
$num_row = mysqli_num_rows($result);
if ($result->num_rows > 0) {
	$i=0;
	while($row = $result -> fetch_assoc()) {
		$arrayJS[]=$row;
		$lat[]=$row["user_lat"];
		$lng[]=$row["user_lng"];
		$user_avatar[]=$row["user_avatar"];
		$user_username_other[]=$row["user_username"];
		$i++;
	}
	$issetlatandlng = "true";
}
if (isset($_GET["lat"]) && isset($_GET["lng"])) {

	$lat = $_GET["lat"];
	$lng = $_GET["lng"];

	$sql="UPDATE user SET user_lat = $lat, user_lng = $lng WHERE user_username = '$user_username'";
	mysqli_query($database,$sql) or die(mysqli_error($database));

	$issetlatandlng = "true";
	window.history.replaceState(null, null, "http://www.shareconnected.com/community/home.php");
}else {
	$issetlatandlng = "false";
}

?>
<!--  -->



<!-- My user lat &lng -->
<?php

$sql="SELECT user_lat,user_lng FROM user WHERE user_username = '$user_username'";
    $result=mysqli_query($database,$sql) or die(mysqli_error($database));
	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        $mylat = $row["user_lat"];
	        $mylng = $row["user_lng"];
	    }
	}

?>
<!--  -->




<!-- INIZIALIZZARE MAPPA -->
<body class="body-home">

  <div id="map" style="position: static;overflow: auto">
    
    <script>
      var map, infoWindow;
        function initMap() {
	    	var styleArray = [{"elementType": "geometry","stylers": [{"color": "#212121"}]},{"elementType": "labels.icon","stylers": [{"visibility": "off"}]},{"elementType": "labels.text.fill","stylers": [{"color": "#757575"}]},{"elementType": "labels.text.stroke","stylers": [{"color": "#212121"}]},{"featureType": "administrative","elementType": "geometry","stylers": [{"color": "#757575"}]},{"featureType": "administrative.country","elementType": "labels.text.fill","stylers": [{"color": "#9e9e9e"}]},{"featureType": "administrative.land_parcel","stylers": [{"visibility": "off"}]},{"featureType": "administrative.locality","elementType": "labels.text.fill","stylers": [{"color": "#bdbdbd"}]},{"featureType": "poi","elementType": "labels.text.fill","stylers": [{"color": "#757575"}]},{"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#181818"}]},{"featureType": "poi.park","elementType": "labels.text.fill","stylers": [{"color": "#616161"}]},{"featureType": "poi.park","elementType": "labels.text.stroke","stylers": [{"color": "#1b1b1b"}]},{"featureType": "road","elementType": "geometry.fill","stylers": [{"color": "#2c2c2c"}]},{"featureType": "road","elementType": "labels.text.fill","stylers": [{"color": "#8a8a8a"}]},{"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#373737"}]},{"featureType": "road.highway","elementType": "geometry","stylers": [{"color": "#3c3c3c"}]},{"featureType": "road.highway.controlled_access","elementType": "geometry","stylers": [{"color": "#4e4e4e"}]},{"featureType": "road.local","elementType": "labels.text.fill","stylers": [{"color": "#616161"}]},{"featureType": "transit","elementType": "labels.text.fill","stylers": [{"color": "#757575"}]},{"featureType": "water","elementType": "geometry","stylers": [{"color": "#000000"}]},{"featureType": "water","elementType": "labels.text.fill","stylers": [{"color": "#3d3d3d"}]}];
			map = new google.maps.Map(document.getElementById('map'), {
          		center: {lat: <?php echo $mylat?>,lng: <?php echo $mylng?>},
		  		zoom: 14,
		  		styles: styleArray,
		  		gestureHandling: 'greedy',
        	});   
		
		var array = <?php echo json_encode($arrayJS);?>;
          if (<?php echo $issetlatandlng ?> == "false" ) {
          }else {
	        var infoWindow = new google.maps.InfoWindow(), marker, i;		
  			for(i=0;i<array.length;i++){
	  			var latUser= Number(array[i]["user_lat"]);
	  			var lngUser= Number(array[i]["user_lng"]);
	  			console.log((array[i]["user_username"])+" LAT:"+latUser+", LNG:"+lngUser);
	  			let image = {url: 'http://www.shareconnected.com/community/userfiles/avatars/'+array[i]["user_avatar"],scaledSize: new google.maps.Size(50, 50),};
				
				if(latUser == 0){	
				}else{
					var marker = new google.maps.Marker({
						position: {lat: latUser , lng: lngUser},
						map: map,
						title: (array[i]["user_username"]),
						animation: google.maps.Animation.DROP,
						icon: image,
					});
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
						return function() {
							var infoWindowContent = 
							'<div class="info_content">'+
								'<div class="info_content_image">'+
									'<img src="http://www.shareconnected.com/community/userfiles/avatars/'+array[i]["user_avatar"]+'">'+
								'</div>'+
								'<div class="info_content_username">'+(array[i]["user_username"])+
								'</div>'+
								'<div class="info_content_button"><a href="https://www.shareconnected.com/community/profile.php?user_username='+(array[i]["user_username"])+'">SCOPRI</a>'+
								'</div>'+
							'</div>';
							infoWindow.setContent(infoWindowContent);
							infoWindow.open(map, marker);
						}
					})(marker, i));
				};
            }									
            window.history.replaceState(null, null, "http://www.shareconnected.com/community/home.php");
          };

          var onClick = google.maps.event.addListener(map, "click", function(createpin){
            lat = createpin.latLng.lat();
            lng = createpin.latLng.lng();
			console.log(lat);
	
            var confbot = confirm("Sei sicuro di voler cambiare il tuo PIN?");
            if (confbot == true) {
              var stringurl = "http://www.shareconnected.com/community/home.php" + "?lat=" + lat + "&lng=" + lng;
              window.history.replaceState(null, null, stringurl);
              var marker = new google.maps.Marker({
                position: {lat: lat , lng: lng},
                map: map,
                title: '<?php echo $user_username ?>',
                icon: image,
              });
              location.reload();
            }
          });
        };
   
//      QUI INIZIALIZZA LA MAPPA

        initMap();
        
//     
    </script>
  </div>
</body>
</div>
</div>