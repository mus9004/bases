<?php
 switch ($_GET["accion"]) {
 	case '1':
 		?><div style="padding-left: 50px; padding-right: 40px;">
 			<div class="grid">
 		<?php
 		for ($i=0; $i < 20; $i++) { 
		      ?>
		      <div class="grid-item">
	              <img src="img/img<?php echo rand(1,27)?>.jpg" class="img-responsive" width="250" style="border-radius: 12px;">
	          </div>
		      <?php
		    }
		?></div>
		</div>
		<?php
		break;
 	
 	default:
 		# code...
 		break;
 }
?>