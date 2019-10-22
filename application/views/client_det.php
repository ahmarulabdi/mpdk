<div data-role="content">
<ul data-role="listview" data-inset="true"  data-theme="c">
	<?php
	for($i=0;$i<$jlh;$i++){
	?>
    <li><a href="<?php echo base_url("index.php/welcome/lokasidet/$id_peserta[$i]")?>">
        <img  width='35px' src="<?php echo base_url("assets/uploads/files/$photo[$i]"); ?>" style="padding-top:20px; padding-left:30px;">
        <h2><?php echo $nama_peserta[$i] ?></h2>
        <p><?php echo $alamat[$i] ?></p></a>
    </li>
    <?php
    }
    ?>
</ul>
<a href="<?php echo base_url("index.php")?>" data-role="button" data-icon="arrow-l" data-iconpos="left" data-inline="true">Kembali</a>
</div>