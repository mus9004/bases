<?php
 switch ($_GET["accion"]) {
 	case '1':
 		for ($i=0; $i < 20; $i++) { 
		      ?>
		      <div class="grid-item"><img src="img/tablero/<?php echo (($i+1)%15)?>.jpg" width="250px" height="125px"><br><img src="img/tablero/<?php echo (($i+2)%15)?>.jpg" width="125px" height="125px"><img src="img/tablero/<?php echo (($i+3)%15)?>.jpg" width="125px" height="125px"><br><strong>Pinterest Logo</strong><br>Leví Canales<button class="btn btn-danger btn-block">Seguir</button></div>
		      <?php
		    }
		break;
 	
 	default:
 		# code...
 		break;
 }
?>