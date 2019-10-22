 <?php
if($this->session->userdata('level')!='admin'){
?>
	<script>
		window.location='<?php echo site_url('admin');?>';
	</script>
<?php
}
?>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">          
          <div class="nav-collapse collapse">
            <ul class="nav">
            	<li><a href="<?php echo base_url('index.php/admin/kategori'); ?>"> Wilayah</a></li>
            	<li><a href="<?php echo base_url('index.php/admin/lokasi'); ?>"> Peserta</a></li>
				<li><a href="<?php echo base_url('index.php/admin/desa_kel_binaan'); ?>"> Desa/Kelurahan Binaan</a></li>
				<li><a href="<?php echo base_url('index.php/admin/mustahik'); ?>"> Mustahik</a></li>
            	<li><a href="<?php echo base_url('index.php/login/logout'); ?>"> Log Out</a></li>
            </ul>
            
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!-- batas menu pegawai -->