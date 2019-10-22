<div data-role="content">
<ul data-role="listview" data-inset="true"  data-theme="c">
	<?php
	for($i=0;$i<$jlh;$i++){
	?>
    <li><a href="<?php echo base_url("index.php/welcome/det/$id_wilayah[$i]")?>">
        <img width='35px'src="<?php echo base_url("assets/uploads/files/$flag[$i]"); ?>" style="padding-top:20px; padding-left:30px;">
        <h2><?php echo $nama_wilayah[$i] ?></h2>
        <p><?php echo $note[$i] ?></p></a>
    </li>
    <?php
    }
    ?>
</ul>
</div>