<div id="menu">
     <ul data-role="listview" data-count-theme="c" data-inset="true" data-theme="c">
	<?php
	$dst=new Welcome();
	for($i=0;$i<$jlh;$i++){
	?>
    <li><a href="javascript:location.replace('<?php echo base_url("index.php/welcome/lokasidet/$id_peserta[$i]")?>')">
        <?php echo $nama_peserta[$i] ?>
         <?php 
         if(!empty($_COOKIE['lat'])){
	       echo round($dst->distance($_COOKIE['lat'],$_COOKIE['lon'],$lat[$i],$lng[$i],"K"),3)."Km";
    	   }
       ?>
        </a>          
    </li>
    
    <?php
    }
    ?>
</ul>
	
        <a href="javascript:location.replace('<?php echo base_url("index.php")?>')" data-role="button" data-icon="arrow-l" data-iconpos="left" data-inline="true">Kembali</a>
    <p>&nbsp;</p>
 	</div>
