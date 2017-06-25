<?php
 switch ($_GET["accion"]) {
 	case '1':
 		for ($i=0; $i < 20; $i++) { 
		      ?>
		      <div class="grid-item" style="padding-top: 50px">
		      	<img src="img/tablero/<?php echo (($i+1)%15)?>.jpg" width="250px" height="125px" class="img-rounded">
		      	<br>
		      	<img src="img/tablero/<?php echo (($i+3)%15)?>.jpg" width="125px" height="125px" class="img-rounded">
		      	<div style="position: absolute; top:185px; left:13px;">
		      		<img src="img/tablero/<?php echo (($i+4)%15)?>.jpg" width="100px" height="100px" class="img-circle">
		      	</div>
		      	<img src="img/tablero/<?php echo (($i+6)%15)?>.jpg" width="125px" height="125px" class="img-rounded">
		      	<br>
		      	<strong>Pinterest Logo</strong>
		      	<br>Leví Canales<button class="btn btn-danger btn-block">Seguir</button>
		      </div>
		      <?php
		    }
		break;
 	
 	default:
 		# code...
 		break;
 }
?>