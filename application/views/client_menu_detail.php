<div id="menu">
     <ul data-role="listview" data-count-theme="c" data-inset="true" data-theme="c">
	<?php
	for($i=0;$i<$jlh;$i++){
	?>
    <li><a href="javascript:location.replace('<?php echo base_url("index.php/welcome/lokasidet/$id_peserta[$i]")?>')">
        <?php echo $nama_peserta[$i] ?></a>
    </li>
</ul>
<br />
<div class="content_desk_detail rounded light shadow">	
		<p style="margin-top:-10px; text-decoration:underline; font-weight:bold;">DETAIL INFORMASI : </p>
        <table border="0" cellpadding="2" width="100%"> <!-- table keterangan -->
        <tr>
        	<td width="35%" valign="top">Nama Lokasi</td>
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
	
        <a href="javascript:location.replace('<?php echo base_url("index.php")?>')" data-role="button" data-icon="arrow-l" data-iconpos="left" data-inline="true">Kembali</a>
    <p>&nbsp;</p>
 	</div>
