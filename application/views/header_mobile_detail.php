<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi MPDK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="EXPIRES" CONTENT=0>
    <link href="<?php echo base_url('css/style_maps.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url('jquery.mobile/demos/css/themes/default/jquery.mobile-1.3.0.css')?>" />
	<!-- Maps Google -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABPRrBCdya2s1OkK-cE-pfE4nkMQ8xkuM&callback=initMap"></script>
	<script src="<?php echo base_url('jquery.mobile/demos/js/jquery.js')?>"></script>
	<script src="<?php echo base_url('jquery.mobile/demos/js/jquery.mobile-1.3.0.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/modernizr-2.0.6/modernizr.min.js')?>"></script>



 <script>

	var rendererOptions = {
    	draggable: false
  	};
	var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);
	var directionsService = new google.maps.DirectionsService();
	var map;
	var gmarkers = [];
	var markersLayer =  new Array();
	var lat = 0.516626;
	var lng = 101.446492;
	var j = 0;
	var dir_start;
	var dir_end;
    function initialize() {
      	var mapOptions = {
		    zoom: 14,
		    mapTypeId: google.maps.MapTypeId.ROADMAP,
		    mapTypeId: "roadmap",
        	featureType: "all",
        	elementType: "labels"
		  };

		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

       var infoWindow = new google.maps.InfoWindow;

  		directionsDisplay.setMap(map);
  		directionsDisplay.setPanel(document.getElementById("directionsPanel"));
		google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
     		computeTotalDistance(directionsDisplay.directions);
		});

	// Try HTML5 geolocation

  		if(navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      var pos = new google.maps.LatLng(position.coords.latitude,
        		                               position.coords.longitude);

		      var infowindow = new google.maps.InfoWindow({
			        map: map,
			        position: pos,
			        content: 'Lokasi Anda ' + position.coords.latitude + "," + position.coords.longitude
	      			});
		      dir_start = pos;
		      map.setCenter(pos);
	    	}, function() {
    		  	handleNoGeolocation(true);
		    	});
		} else {
		    // Browser doesn't support Geolocation
		    handleNoGeolocation(false);
  		}

	//init end route
     <?php
		$pageName = $_SERVER['PHP_SELF'];
		$loc = explode("/",$pageName);
		if($loc[5]!=''){
			$to = "id_peserta=$loc[5]";
		}else{
			$to = "";
		}
	?>
      downloadUrl("<?php echo base_url("phpsqlajax_genxmldetail.php?$to"); ?>", function(data) {
      	var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          	var id = markers[i].getAttribute("id");
 	        var nama = markers[i].getAttribute("nama");
          	var address = markers[i].getAttribute("address");
		  	var email = markers[i].getAttribute("email");
		  	var nope = markers[i].getAttribute("nope");
		  	var ket = markers[i].getAttribute("ket");
          	var type = markers[i].getAttribute("type");
          	var image = markers[i].getAttribute("image");
          	var lat = markers[i].getAttribute("lat");
          	var lng = markers[i].getAttribute("lng");
          	var point = new google.maps.LatLng(
        		parseFloat(markers[i].getAttribute("lat")),
        		parseFloat(markers[i].getAttribute("lng")));
            dir_end = point;
          	if(image != ""){
          		var img = "<a href='images/" + image + "' target='_blank'><img onmouseover='script:window.location=images/" + image + "' style='border:3px solid #DDD;' width='100px' height='100px' src='images/" + image + "'></a>";
          	}else {
          		var img = "";
         	}

          	var html = " Nama  : <b> " + nama + " </b> <br> Alamat : " + address + "<br> Keterangan : " + ket + " <br> <br/> <center>";
          	var marker = new google.maps.Marker({
            	map: map,
            	position: point
            });

           	gmarkers.push(marker);
          	bindInfoWindow(marker, map, infoWindow, html);
        }

      });

	}

	//balloon
    function bindInfoWindow(marker, map, infoWindow, html) {
    	function placeMarker(location) {
	 		 var marker = new google.maps.Marker({
    			position: location,
	    		map: map
			  });
			//map.setCenter(location);
		}

      	google.maps.event.addListener(marker, 'click', function() {
        	infoWindow.setContent(html);
        	infoWindow.open(map, marker);

		});

    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }


    function doNothing() {}

	function handleNoGeolocation(errorFlag) {
  		if (errorFlag) {
		    var content = 'Error: The Geolocation service failed.';
		} else {
		    var content = 'Error: Your browser doesn\'t support geolocation.';
		}

  		var options = {
	    	map: map,
    		position: new google.maps.LatLng(0.516626, 101.446492),
    		content: content
  		};

  		var infowindow = new google.maps.InfoWindow(options);
  		map.setCenter(options.position);
	}


	function calcRoute() {
  		var start = dir_start;
		var end = dir_end;
  		var request = {
      		origin:start,
     	 	destination:end,
      		travelMode: google.maps.DirectionsTravelMode.DRIVING
  		};
  		directionsService.route(request, function(response, status) {
    		if (status == google.maps.DirectionsStatus.OK) {
      		directionsDisplay.setDirections(response);
    		}
  		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
	</script>  <!-- End Maps Google -->

</head>
<body>
