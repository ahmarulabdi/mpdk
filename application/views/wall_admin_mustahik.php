<!-- Isi Content Website -->
    <div class="container">
	<div class="well">
  
          <div class="control-group">
		  	<legend>MUSTAHIK</legend>
            <?php 
		foreach($css_files as $file): ?>
			<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
		<?php endforeach; ?>
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>

				<div> <?php echo $output; ?> </div>	
						
		  </div>
       </div> <!-- Akhir Well --> 
        
       