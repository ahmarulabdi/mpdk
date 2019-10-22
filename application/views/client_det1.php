<div data-role="content">
<ul data-role="listview" data-inset="true"  data-theme="c">
	<?php
	$dst = new Welcome();
	for($i=0;$i<$jlh;$i++){
	?>
    <li><a href="<?php echo base_url("index.php/welcome/lokasidet/$id_peserta[$i]")?>">
        <img  width='35px' src="<?php echo base_url("assets/uploads/files/$photo[$i]"); ?>" style="padding-top:20px; padding-left:30px;">
        <h2><?php echo $nama_lokasi[$i] ?></h2>
        <p><?php echo $alamat[$i] ?></p>
        <?php 
      // echo round($dst->distance($_COOKIE['lat'],$_COOKIE['lon'],$lat[$i],$lng[$i],"K"),3)." Km";    
       ?>
       <?php
	// Our parameters
	//if($_COOKIE['lat']=="" and $_COOKIE['lon'] == ""){
		//echo "<script>alert('Maaf,Lokasi anda tidak terdeteksi')</script>";	
	//}
	//'origin'		=> $_COOKIE['lat'].",".$_COOKIE['lon'],
	//'origin'		=> "0.4356068,101.4434505", "0.463524,101.36486",
//	if(!empty($_COOKIE['lat']) {
		$params = array(
		'origin'		=> $_COOKIE['lat'].",".$_COOKIE['lon'],
		'destination'	=> $lat[$i].",".$lng[$i],
		'sensor'		=> 'true',
		'units'			=> 'metric'
		);
/*	}else{
		$params = array(
		'origin'		=> "0.4356068,101.4434505",
		'destination'	=> $lat[$i].",".$lng[$i],
		'sensor'		=> 'true',
		'units'			=> 'metric'
		);
	}
*/
	// Join parameters into URL string
	$params_string="";
	foreach($params as $var => $val){
   		$params_string .= '&' . $var . '=' . str_replace("%2C",",",urlencode($val));  
	}
	
	// Request URL
	$url = "http://maps.googleapis.com/maps/api/directions/json?".ltrim($params_string, '&');
	
	// Make our API request
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$return = curl_exec($curl);
	curl_close($curl);
	
	// Parse the JSON response
	$directions = json_decode($return);
	
	// Show the total distance
	print('<p><strong>Jarak:</strong> ' . $directions->routes[0]->legs[0]->distance->text . " <strong>Durasi:</strong> " . $directions->routes[0]->legs[0]->duration->text . '</p>');
		
	?>
       </a>
        
      
    </li>
    <?php
    }
    ?>
</ul>
<a href="<?php echo base_url("index.php")?>" data-role="button" data-icon="arrow-l" data-iconpos="left" data-inline="true">Kembali</a>
</div>
<div id="map-canvas"></div>
<?php
//echo $url;
?>