<div data-role="content">
<ul data-role="listview" data-inset="true"  data-theme="c">
	<?php
	for($i=0;$i<$jlh;$i++){
	?>
    <li>
        <img  width='35px' src="<?php echo base_url("assets/uploads/files/$photo[$i]"); ?>" style="padding-top:20px; padding-left:30px;">
        <h2><?php echo $nama_peserta[$i] ?></h2>
        <p><?php echo $alamat[$i] ?></p>
    </li>
   
</ul>
<br />

<a href="javascript:location.replace('<?php echo base_url("index.php/welcome/lokasidetmob/".$id_peserta[$i]."")?>')" data-role="button" type="submit">Lihat Peta</a>
<table border="0" width="100%" cellpadding="2">
    <tr>
	
	<!--
		<div id="map-canvas" class="content_mobile rounded light shadow">
        </div>
    -->
	<td valign="top">
    	<div class="content_mobile rounded light shadow">
		<p style="margin-top:-10px; text-decoration:underline; font-weight:bold;">DETAIL INFORMASI : </p>
        <table border="0" cellpadding="2" width="100%"> <!-- table keterangan -->
        <tr>
        	<td width="35%" valign="top">Nama Peserta</td>
            <td width="2%" valign="top">:</td>
            <td><?php echo $nama_peserta[$i] ?></td>
        </tr>
         <tr>
        	<td>Alamat</td>
            <td>:</td>
            <td><?php echo $alamat[$i] ?></td>
        </tr>
         <tr>
        	<td>Contact</td>
            <td>:</td>
            <td><?php echo $nope[$i] ?></td>
        </tr>
         <tr>
        	<td>Email</td>
            <td>:</td>
            <td><?php echo $email[$i] ?></td>
        </tr>
         <tr>
        	<td>Keterangan</td>
            <td>:</td>
            <td><?php echo $ket[$i] ?></td>
        </tr>
        </table> <!-- end table keterangan -->
		</div>
	</td>
</tr>
</table>
 <?php
    }
?>
<a href="<?php echo base_url("index.php")?>" data-role="button" data-icon="arrow-l" data-iconpos="left" data-inline="true">Kembali</a>
</div>