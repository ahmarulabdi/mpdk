
<div id="menu">
     <ul data-role="listview" data-count-theme="c" data-inset="true" data-theme="c">
	<?php
	$dst = new Welcome();
	for($i=0;$i<$jlh;$i++){
	?>
    <li><a href="javascript:location.replace('<?php echo base_url("index.php/welcome/det/$id_wilayah[$i]")?>')">
       <?php echo $nama_wilayah[$i] ?> <span class="ui-li-count"> <?php echo $jumlah[$i] ?></span>		   
       </a>       
    </li>
    <?php
    }
    ?>
</ul>
	    <p>&nbsp;</p>
 	</div>
