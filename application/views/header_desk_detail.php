<!DOCTYPE html>
<html lang="en">
<head>
<title> Aplikasi MPDK Mobile</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Maps Mobile, Pekanbaru Maps Guide, Maps Pekanbaru">
<meta name="author" content="">
	<link href="<?php echo base_url('css/style_desk.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('css/style_maps.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('jquery.mobile/demos/css/themes/default/jquery.mobile-1.3.0.css')?>" />
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABPRrBCdya2s1OkK-cE-pfE4nkMQ8xkuM&callback=initMap"></script>
	<script src="<?php echo base_url('jquery.mobile/demos/js/jquery.js')?>"></script>
	<script src="<?php echo base_url('jquery.mobile/demos/js/jquery.mobile-1.3.0.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/modernizr-2.0.6/modernizr.min.js')?>"></script>



    <script>
var rendererOptions = {
    	draggable: false
  	};
	var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);;
	var directionsService = new google.maps.DirectionsService();
	var map;

	var gmarkers = [];
	var markersLayer =  new Array();

	// memanmpilkan gambar pada kategori
    var customIcons = {
      '5132e9ebb4b60': {
        icon: 'http://localhost/mpdk/assets/uploads/files/3001f-cityhall-admin.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      '51257dbb7d4d8': {
 		icon: 'http://localhost/mpdk/assets/uploads/files/41dce-riparian.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      '5132d4ee16c0e': {
        icon: 'http://localhost/mpdk/assets/uploads/files/e8501-soccer2.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
      '51257de67caec': {
        icon: 'http://localhost/mpdk/assets/uploads/files/b1fb6-university.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
	   '51257df7263ed': {
        icon: 'http://localhost/mpdk/assets/uploads/files/3dd2e-riparian.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
	    '512dde013437d': {
        icon: 'http://localhost/mpdk/assets/uploads/files/33770-cityhall-admin.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
	    '5132e9af28f30': {
        icon: 'http://localhost/mpdk/assets/uploads/files/220c5-soccer2.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
	   '5133753e60466': {
        icon: 'http://localhost/mpdk/assets/uploads/files/98902-logo1.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
	    '5134bb73dbc20': {
        icon: 'http://localhost/mpdk/assets/uploads/files/556c4-cityhall-admin.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      },
	    '5134bb8d3b390': {
        icon: 'http://localhost/mpdk/assets/uploads/files/411d7-soccer2.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
	   },
	    '51663378046be': {
        icon: 'http://localhost/mpdk/assets/uploads/files/0c305-riparian.png',
        shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
      }
    };

		var lat = 0.516626;
		var lng = 101.446492;

	var j = 0;

    function initialize() {

       var map = new google.maps.Map(document.getElementById("map-canvas"), {
        	center: new google.maps.LatLng(lat,lng),
        	zoom: 14,
        	mapTypeId: "roadmap",
        	featureType: "all",
        	elementType: "labels"
      		});

       var infoWindow = new google.maps.InfoWindow;

  		directionsDisplay.setMap(map);
  		directionsDisplay.setPanel(document.getElementById("directionsPanel"));
		google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
     		computeTotalDistance(directionsDisplay.directions);
		});

	//init end route
      <!-- downloadUrl("<?php //echo base_url('phpsqlajax_genxml.php'); ?>", function(data) {
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
		/*
		  markersLayer = [
        [52.26326, 21.673675], // marker #0
        [52.67328, 21.865789], // marker #1
        [52.34366, 21.348797]  // marker #2 etc.
    ];
	*/
		//menampilkan Keterangan di marker
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

          if(image != ""){
          		var img = "<a href='images/" + image + "' target='_blank'><img onmouseover='script:window.location=images/" + image + "' style='border:3px solid #DDD;' width='100px' height='100px' src='images/" + image + "'></a>";
          }else {
          		var img = "";
          }

          var html = " Nama Peserta: <b> " + nama + " </b> <br> Alamat : " + address + "<br> Keterangan : " + ket + " <br> <br/> <center>";
          var icon = customIcons[type] || {};

          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon,
            shadow: icon.shadow
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
			map.setCenter(location);
		}

      	google.maps.event.addListener(marker, 'click', function() {
        	infoWindow.setContent(html);
        	infoWindow.open(map, marker);

		});

     // mendapatkan ltd n lng
		/*
		google.maps.event.addListener(map, 'click', function(event) {
			<?php
			//if($_SESSION['admin_session']!=""){
			?>
			placeMarker(event.latLng);
			<?php
			//}
			?>
			document.getElementById("lat").value = event.latLng.lat();
	  		document.getElementById("lng").value = event.latLng.lng();
      	});
		*/

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


	google.maps.event.addDomListener(window, 'load', initialize);
	</script>


</head>
<body>
<div id="Title">Aplikasi Manajemen Pendistribusian Daging Kurban (MPDK) LAZ Swadaya Ummah</div>
</body>
