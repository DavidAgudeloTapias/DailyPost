<?php

$find              = null;
$latitude          = null;
$longitude         = null;
$formatted_address = null;

if (isset($_GET['find'])) {

    // Parametros de Configuracion
    $api_key = "AIzaSyD_BWobrWBnTHXrS3lF_KgypkMYSmI-Bv4"; // API Key Google Maps

    $find = urlencode(trim($_GET['find']));
	
	if ($find != null){
		// Webservices
		$google_maps_url   = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $find . "&key=" . $api_key;
		$google_maps_json  = file_get_contents($google_maps_url);
		$google_maps_array = json_decode($google_maps_json, true);

		// Get Location
		if ($google_maps_array["results"] != null){
			$latitude          = ($google_maps_array["results"][0]["geometry"]['location']['lat']);
			$longitude         = ($google_maps_array["results"][0]["geometry"]['location']['lng']);
			$formatted_address = ($google_maps_array["results"][0]["formatted_address"]);
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="flatly.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?=$api_key?>" ></script>
    <style>
        #map{
            width: 100%;
            height: 400px;
            border: #2c3e50 solid;
            border-width: 4px 4px 4px 4px;
        }
    </style>
    <script type="text/javascript">
        let map;
        let marker;
		let pos = { lat: <?=$latitude?>, lng: <?=$longitude?> };
        $(document).ready(function(){
            map = new google.maps.Map(document.getElementById("map"), {
				zoom: 16,
				center: pos,
				mapTypeControl: false,
				fullscreenControl: true,
				zoomControl: true,
				streetViewControl: false
            });

			marker = new google.maps.Marker({
				position: pos, 
				map: map, 
				draggable: false,
                title: '<?=$formatted_address?>'
			});
			const autocompleteInput = document.getElementById("find");
			const autocomplete = new google.maps.places.Autocomplete(autocompleteInput, {
				fields: ["address_components", "geometry", "icon", "name"],
				componentRestrictions: { country: "co" },
				strictBounds: false,
				types: ["address"]
			});
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center;">Google Maps Geocoding API - PHP</h1>
                <form class="form-inline" method="get" style="text-align: center;">
                    <div class="form-group">
                        <input class="form-input" placeholder="Nombre o dirección" type="text" name="find" id="find" value="<?=urldecode($find)?>">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Find">
                </form>
                <br>
                <div style="text-align: center;">
                    <kbd><kbd>Latitude:</kbd><?=$latitude?>, <kbd>Longitude:</kbd><?=$longitude?></kbd><br/>
					<kbd><?=$formatted_address?></kbd>	
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div id="map"></div>
        </div>
    </div>
	<a href="index.php" >Home<a/>
	<script async
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_BWobrWBnTHXrS3lF_KgypkMYSmI-Bv4&libraries=places&callback=initMap">
	</script>
</body>
</html>
